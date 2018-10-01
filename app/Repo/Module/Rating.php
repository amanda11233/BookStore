<?php

namespace App\Repo\Module;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'ratings', 'user_id', 'book_id',
    ];
}
