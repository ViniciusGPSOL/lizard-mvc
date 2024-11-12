<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lizard extends Model
{
    protected $fillable = [
        "name",
        "species",
        "age",
        "weight",
        "description",
        "poisonous",
        "color"
    ];

    protected $casts = [
        "age" => "integer",
        "weight" => "float",
        "poisonous" => "boolean",
    ];
}
