<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

use Filament\Facades\Filament;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->list;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->detail;
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
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->tambah;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->ubah;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->hapus;
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
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->hapus_semua;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function import(User $user, User $model): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->import;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function export(User $user, User $model): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'User')->first()->export;
        }
    }
}
