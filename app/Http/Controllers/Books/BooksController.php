<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Repository\Category\CategoryRepositoryInterface;
use App\Repo\Repository\Language\LanguageRepositoryInterface;
use App\Repo\Repository\Author\AuthorRepositoryInterface;
use App\Repo\Repository\Book\BookRepositoryInterface;
use App\Repo\Module\Book;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(CategoryRepositoryInterface $category, 
     LanguageRepositoryInterface $language , AuthorRepositoryInterface $author,
     BookRepositoryInterface $book){

        $this->category = $category;
        $this->language = $language;
        $this->author = $author;
        $this->book = $book;

         $this->middleware('auth:admin'); 
     }
    public function index()
    {
        $cat = $this->category->index();
        $lang = $this->language->index();
        $auth = $this->author->index();
        $books = $this->book->index();
        return view('admins.books.books', compact('cat','lang','auth','books'));
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
        try{
            if(Input::hasFile('image') ){
                $bookImage = $request->image;
                $extensionBookImage = $bookImage->getClientOriginalExtension();
                $nameBookImage = $bookImage->getClientOriginalName();
                $filenameBookImage = $nameBookImage;
                $pathBookImage = public_path().'/images/BooksImages/'. $request->book_name . '/';
                $bookImage->move($pathBookImage,$filenameBookImage);
              

                $bookPdf = $request->file('pdf');
                $extensionBookPdf = $bookPdf->getClientOriginalExtension();
                $nameBookPdf = $bookPdf->getClientOriginalName();
                $filenameBookPdf = $nameBookPdf;
                $pathBookPdf = public_path().'/PDFs/BooksPdf/'. $request->book_name . '/';
                $bookPdf->move($pathBookPdf,$filenameBookPdf);

                $data[] = [
                 'book_name' => $request->book_name,
                 'author_id' => $request->author,
                 'published_date' => $request->date,
                 'language_id' => $request->language,
                 'category_id' => $request->category,
                 'book_image' => $filenameBookImage,
                 'book_pdf' =>  $filenameBookPdf,
                 'price' => $request->price,
                
                  ]; 
            Book::insert($data);

       
            return redirect()->route('books.index');
            }
 
        }
      
        catch(Exception $e){
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
        //
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
        $delbook = $this->book->find($id);
        $pathBookImage = public_path().'/images/BooksImages/'. $delbook->book_name;
        $pathBookPdf = public_path().'/PDFs/BooksPdf/'. $delbook->book_name;
        File::deleteDirectory($pathBookImage);
        File::deleteDirectory($pathBookPdf);
        $this->book->delete($id);
       
        return redirect()->route('books.index');
    }
}
