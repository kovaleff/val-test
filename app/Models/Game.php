<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'is_finished',
    ];

    protected $casts = [
        'state' => 'json',
    ];

    public function gamers(): BelongsToMany
    {
        return $this->belongsToMany(Gamer::class);
    }
}
