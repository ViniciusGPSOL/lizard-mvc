<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habitat extends Model
{
    protected $fillable = [
        "name",
        "biome",
        "temperature",
    ];

    public function lizard(): HasMany
    {
        return $this->hasMany(Lizard::class);
    }
    public function prey(): HasMany
    {
        return $this->hasMany(Lizard::class);
    }
}
