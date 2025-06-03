<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;
    use Notifiable, HasUuids;

    protected $guarded = [];

    // public function team(): BelongsToMany
    // {
    //     return $this->belongsToMany(Team::class);
    // }

    
}
