<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\Repository\Book\BookRepositoryInterface;
use App\Repo\Repository\Category\CategoryRepositoryInterface;
use App\Repo\Repository\Language\LanguageRepositoryInterface;
use App\Repo\Repository\User\UserRepositoryInterface;
use App\Repo\Repository\Rating\RatingRepositoryInterface;
use Auth;
class PagesController extends Controller
{
    
    public function __construct(BookRepositoryInterface $book,
    CategoryRepositoryInterface $category,
    LanguageRepositoryInterface $language,
    UserRepositoryInterface $user,
    RatingRepositoryInterface $rating){
        $this->book = $book;
        $this->category = $category;
        $this->language = $language;
        $this->rating = $rating;
        $this->user = $user;
    }

    public function welcome(){
        
        $books = $this->book->getBooksWithLimit();
 
        $cat = $this->category->index();
        $lang = $this->language->index();
        return view('welcome',compact('books','cat', 'lang'));
    }

    public function viewBooks($id){
        $user_id = Auth::id();
     $books = $this->book->find($id);
     $ratings = $books->rating->avg('ratings');
     $checkrate = $this->rating->getRating($user_id, $id);

     return view('books-view', compact('books', 'ratings', 'checkrate'));

    }

    public function viewCategoryBooks($category){
        $category_id = $this->category->getOne($category)->id;
        $books = $this->book->categoryBooks($category_id);
        
return view('category-accord',compact('books','category'));
    }


    public function favourites(){
        $id = Auth::id();
        $users = $this->user->getUsers($id);
       
        return view('favourite-books', compact('users'));

    }

    public function browseBooks(Request $request){
    

        $book_name = $request->book_name;
        $result = $this->book->browse($book_name);

        return view('search-books',compact('result'));
    }
}
