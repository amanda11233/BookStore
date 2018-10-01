<?php

namespace App\Repo\Module;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'author_name','email','nationality','dob'
    ];
}
