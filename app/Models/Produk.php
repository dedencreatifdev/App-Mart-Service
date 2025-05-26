<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory, Notifiable, HasUuids, SoftDeletes;
    protected $guarded = [];
}
