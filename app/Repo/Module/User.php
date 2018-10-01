<?php

namespace App\Repo\Module;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Repo\Module\Rating;
use App\Repo\Module\Book;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function rating(){
        return $this->hasMany(Rating::class, 'user_id','id');
    }
    public function books(){
        return $this->belongsToMany(Book::class, 'favourites' , 'user_id' , 'book_id');
    }
}
