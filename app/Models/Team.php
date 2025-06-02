<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function produks(): BelongsToMany
    {
        return $this->belongsToMany(Produk::class);
    }

    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class);
    }

    public function Permisis(): BelongsToMany
    {
        return $this->belongsToMany(Permisi::class);
    }

    public function pelanggans(): BelongsToMany
    {
        return $this->belongsToMany(Pelanggan::class);
    }
    
    public function satuans(): BelongsToMany
    {
        return $this->belongsToMany(Satuan::class);
    }

    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class);
    }
}
