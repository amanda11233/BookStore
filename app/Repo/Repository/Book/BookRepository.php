<?php 
namespace App\Repo\Repository\Book;

use App\Repo\Module\Book;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userBook
 */
class BookRepository extends BaseRepository implements BookRepositoryInterface
{

    /**
     * The Guard instance
     *
     * @var Guard
     */
    protected $auth;

    protected $model;
    /**
     * @param Guard  $auth
     * @param userBook $userBook
     */
    public function __construct(Book $Book)
    {   
        $this->model = $Book;
      
    }


    public function getBooksWithLimit(){
        return $this->model->orderBy('id','DESC')->limit('6')->get();
    }
   public function categoryBooks($id){
return $this->model->where('category_id',$id)->get();
   }

   public function browse($book){
   return $this->model->where('book_name', 'LIKE', '%' . $book . '%')->get();
   }
}