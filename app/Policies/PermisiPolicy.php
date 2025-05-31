<?php

namespace App\Policies;

use App\Models\Permisi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use Filament\Facades\Filament;

class PermisiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->list;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permisi $permisi): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->detail;
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
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->tambah;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permisi $permisi): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->ubah;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permisi $permisi): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->hapus;
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
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->hapus_semua;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permisi $permisi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permisi $permisi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function import(User $user, Permisi $permisi): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->import;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function export(User $user, Permisi $permisi): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Permisi')->first()->export;
        }
    }
}
