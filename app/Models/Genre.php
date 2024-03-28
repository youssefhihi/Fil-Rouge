<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory,Prunable, SoftDeletes;
    
    protected $fillable = [
        'name',
    ];

    public function prunable()
    {
        return static::where('deleted_at', '<=', now()->subMonth());
    }
}
