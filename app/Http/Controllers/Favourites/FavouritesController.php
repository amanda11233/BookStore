<?php

namespace App\Http\Controllers\Favourites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repo\Repository\User\UserRepositoryInterface;
use App\Repo\Repository\Book\BookRepositoryInterface;
use Auth;
class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(BookRepositoryInterface $book,
     UserRepositoryInterface $user){
     $this->book = $book;
     $this->user = $user;
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $user = $this->user->find($user_id);
         $book_id = $request->book_id;
       
        $user->books()->attach($book_id);
      

        return redirect()->route('view.favourites');
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
        $user_id = Auth::id();
        $users = $this->user->find($user_id);
        $users->books()->detach($id);

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        
    }
}
