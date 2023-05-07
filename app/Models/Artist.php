<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'age',
        'is_alive',
        'history',
        'popularity'
    ];

    // public function songs()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
