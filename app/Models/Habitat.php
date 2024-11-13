<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Habitat extends Model
{
    protected $fillable = [
        "name",
        "biome",
        "temperature",
    ];

    public function lizard(): HasOne
    {
        return $this->hasOne(Lizard::class);
    }
}
