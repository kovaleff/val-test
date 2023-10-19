<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gamer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nick',
    ];

    public function wins(): HasMany
    {
        return $this->hasMany(Winner::class, 'winner_id', 'id');
    }
}
