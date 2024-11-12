<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lizard extends Model
{

    protected $table = 'lizards'; //the default way that models to database relationship works, is that the database will have
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
