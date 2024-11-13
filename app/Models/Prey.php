<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prey extends Model
{
    protected $fillable = [
        "name",
        "height",
        "weight",
        "description",
        "species",
    ];

    protected $casts = [
        "height" => "float",
        "weight" => "float",
    ];
}
