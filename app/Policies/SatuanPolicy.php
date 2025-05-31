<?php

namespace App\Policies;

use App\Models\Satuan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use Filament\Facades\Filament;

class SatuanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->list;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Satuan $satuan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->detail;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->tambah;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Satuan $satuan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->ubah;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Satuan $satuan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->hapus;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->hapus_semua;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Satuan $satuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Satuan $satuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function import(User $user, Satuan $satuan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->import;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function export(User $user, Satuan $satuan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Satuan')->first()->export;
        }
    }
}
