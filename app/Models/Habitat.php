<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitat extends Model
{
    use HasFactory;
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
