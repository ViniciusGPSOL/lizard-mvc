<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prey extends Model
{
    use HasFactory;
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

    public function habitat(): HasMany
    {
        return $this->hasMany(Habitat::class);
    }
}
