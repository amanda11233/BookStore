<?php

namespace App\Http\Controllers\Authors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Repository\Author\AuthorRepositoryInterface;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(AuthorRepositoryInterface $author){

        $this->author = $author;
        $this->middleware('auth:admin');
     }
    public function index()
    {
        $authors = $this->author->index();
        return view('admins.authors.authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    try{
        $data['author_name' ] = $request->name;
        $data['email' ] = $request->email;
        $data['nationality' ] = $request->nation;
        $data['dob' ] = $request->dob;
       
        $this->author->create($data);
                
          return redirect()->route('authors.index');
    }catch(Exception $e){
dd($e);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = $this->author->find($id);
        return view('admins.authors.edit-authors',compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
$data['author_name'] = $request->name;
$data['email'] = $request->email;
$data['nationality'] = $request->nation;
$data['dob'] = $request->dob;


$this->author->update($id,$data);

return redirect()->route('authors.index');
        }catch(Exception $e){
dd($e);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->author->delete($id);

        return redirect()->route('authors.index');
    }
}
