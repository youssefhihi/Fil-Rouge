<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

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

    public function getRouteKeyName(){
        return 'ISBN';
    }

    /**
     * Get the author's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function genre(){
       return $this->belongsTo(Genre::class,'genre_id');
    }
    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'book_id');
    }
}
