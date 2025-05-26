<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory, Notifiable, HasUuids, SoftDeletes;
    protected $guarded = [];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
