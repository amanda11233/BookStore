<?php namespace App\Repo\Repository;

use Illuminate\Auth\Guard;
use DB;
//use File;


/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\user
 */
class BaseRepository 
{

    /**
     * The Guard instance
     *
     * @var Guard
     */
    protected $auth;

    // protected $model;


    /**
     * @param Guard  $auth
     */
    public function __construct(Guard $auth)
    {
        // $this->user = $user;
        // $this->auth   = $auth;
        // $this->category = $category;
    }

    public function index()
    {
        return $this->model->orderBy('id','DESC')->get();
    }

    /**
     * Create a user
     * @param       $userDetails
     * @return mixed
     */
    public function create($details)
    {
        DB::beginTransaction();
        try {
            $this->model->fill($details)->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();           
        }        
    }

    /**
     * Find an entity with given id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {        
        return $this->model->find($id);
    }

    /**
     * Update an entity with given id
     * @param $id
     * @param $details
     * @return mixed
     */
    public function update($id, $details)
    {   
        //dd($details);
        // $data = $this->model->findOrFail($id);
        // if ($data != null)
        // {
        //     $data->update($details);
        //     $data->save();
        //     return $data;
        // }   
        // return null;    
        DB::beginTransaction();
        try {
            
            $data = $this->model->findOrFail($id);
            $data->update($details);
            $data->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            
            DB::rollback();
            return false;           
        } 
    }

    /**
     * Delete an entity
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        // $this->model->findOrFail($id)->update(['deleted_by'=>\Auth::user()->id]);
        return $this->model->destroy($id);
    }

    public function is_record_referenced($id, $details)
    {
        foreach($details as $tbl_model => $tbl_column){

            $result = $this->model->whereHas($tbl_model, function($q) use ($id, $tbl_column){
                $q->where($tbl_column, $id);
            })->first();

            if($result != null){
                $final[] = $result;
            }
        }

        if(isset($final)){
            return true;
        }
        else
        {
            return false;
        }
    }

    public function file_upload($file,$path,$name){
        $file->move(public_path().$path, $name);

    }

   public function file_delete($path,$fileName){
        \File::deleteDirectory(public_path().$path.$fileName);
    }

    public function getIdBySlug($slug)
    {
        return $this->model->select('id')->where('slug',$slug)->first()->id;
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug',$slug)->first();
    }
    /*
    
    */
   /* public function getDetailsWithRelationship($name)
    {
        return $this->model->with($name)->get();
    }

    public function getDetailsAsc($name)
    {
        return $this->model->orderBy($name, 'asc')->get();
    }

    public function getDetailsDesc()
    {
        
    }

    public function findWithRelationship($id, $name)
    {
        return $this->model->where('id','=',$id)->with($name)->get();
    }

    public function findOneWithRelationship($id, $name)
    {
        return $this->model->where('id','=',$id)->with($name)->first();
    }
    public function file_upload($file,$path,$name){
        $file->move(public_path().$path, $name);
    }

   public function file_delete($path,$fileName){
        File::delete(public_path().$path.$fileName);
    }*/
}