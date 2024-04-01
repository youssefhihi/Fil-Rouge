<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Author extends Model
{
    use HasFactory,Prunable, SoftDeletes;

    protected $fillable = [
        'name',
        'gender',
        
    ];

    public function prunable()
    {
        return static::where('deleted_at', '<=', now()->subMonth());
    }
    
    /**
     * Get the author's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function books(){
        return $this->hasMany(Book::class,'author_id');
     }

}
