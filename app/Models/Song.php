<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'length',
        'rating',
        'genre_id',
        'artist_id'
    ];


    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }



}
