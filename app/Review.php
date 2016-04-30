<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title', 'description', 'additional_information', 'note', 'user_id', 'book_id'];
}
