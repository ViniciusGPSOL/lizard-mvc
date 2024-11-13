<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habitat extends Model
{
    protected $fillable = [
        "name",
        "biome",
        "temperature",
    ];

    public function lizard(): BelongsTo
    {
        return $this->belongsTo(Lizard::class);
    }
    public function prey(): BelongsTo
    {
        return $this->belongsTo(Prey::class);
    }
}
