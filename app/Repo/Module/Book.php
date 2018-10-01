<?php

namespace App\Repo\Module;
use App\Repo\Module\Author;
use App\Repo\Module\Language;
use App\Repo\Module\Category;
use App\Repo\Module\Rating;
use App\Repo\Module\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author(){
        return $this->belongsTo(Author::class,'author_id','id');
    }
    public function language(){
        return $this->belongsTo(Language::class,'language_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function rating(){
        return $this->hasMany(Rating::class, 'book_id','id');
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
