<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory,Prunable, SoftDeletes;
    
    protected $fillable = [
        'description',
        'type',
        'client_id'
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
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }

}
