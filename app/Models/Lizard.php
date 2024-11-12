<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lizard extends Model
{

    // The default way that Models relates to the database is by looking at the Model name,
    // then getting its plural for example, Lizards will relate to the table lizards. If I have a different table name
    // I can define it like this:
    protected $table = "lizards";
    // Laravel also assumes the primary key is id,
    // If one wants to change the primary key it must do like this:

    protected $primaryKey = "id";

    //One can also disable timestamps for updated at and created at with this:
    public $timestamps = false;
    //One can also hide a field, so that it wont be returned in API response. It is a security measure.
    //this way, when returning a json from the elements, age, description, species and weight wont be displayed.
    protected $hidden = ["age", "description", "species", "weight"];
    //One can then show these elements concatenated with a methtod that will have the name in this format:
    //getXAttribute, where X is t he name in this var but on camelCase:
    protected $appends = ["full_description"];
    //implementation of the method getXAttribute where x is full_description that becomes FullDescriptionAttribute

    public function getFullDescriptionAttribute(): string
    {
        return "age: " . (string) $this->age .
            "species: " . (string) $this->species .
            "weight: " . (string) $this->weight .
            "\n" . (string) $this->description; //description in one line
    }

    protected $fillable = [ //can be mass assigned
        "name",
        "species",
        "age",
        "weight",
        "description",
        "poisonous",
        "color"
    ];

    protected $casts = [ //casts fields to given type
        "age" => "integer",
        "weight" => "float",
        "poisonous" => "boolean",
    ];
}
