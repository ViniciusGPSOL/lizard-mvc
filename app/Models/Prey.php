<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function habitat(): HasOne
    {
        return $this->hasOne(Habitat::class);
    }
}
