<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@welcome');
Route::get('/books/{id}', 'PagesController@viewBooks')->name('books.view');
Route::post('/browse', 'PagesController@browseBooks')->name('books.browse');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
Route::get('/user/logout','Auth\LoginController@users_logout')->name('user.logout');

Route::get('/','Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Admin\AdminLoginController@logout')->name('admin.logout');

    Route::resource('/users','Users\UsersController');
    Route::resource('/books','Books\BooksController');
    Route::resource('/authors','Authors\AuthorsController');
    Route::resource('/languages','Languages\LanguagesController');
    Route::resource('/categories','Categories\CategoriesController');
    Route::resource('/ratings','Ratings\RatingsController');
   
});

Route::resource('/favourites','Favourites\FavouritesController');
Route::get('/category/{cat}','PagesController@viewCategoryBooks')->name('view.category.books');
Route::get('/favourite','PagesController@favourites')->name('view.favourites');