<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'genre_id',
        'author_id',
        'description',  
        'ISBN',
        'edition',
        'publicationDate' ,
        'pagesNumber' ,
        'quantity',
        'language',
    ];
}
