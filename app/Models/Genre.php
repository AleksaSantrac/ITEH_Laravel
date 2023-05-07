<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'city',
        'description',
    ];

    // public function songs()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
