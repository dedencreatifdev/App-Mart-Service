<?php

namespace App\Policies;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use Filament\Facades\Filament;

class PelangganPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->list;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pelanggan $pelanggan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->detail;
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
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->tambah;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pelanggan $pelanggan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->ubah;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pelanggan $pelanggan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->hapus;
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
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->hapus_semua;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pelanggan $pelanggan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pelanggan $pelanggan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function import(User $user, Pelanggan $pelanggan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->import;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function export(User $user, Pelanggan $pelanggan): bool
    {
        if (Filament::auth()->user()->level_id == null) {
            return false;
        } else {
            return Filament::auth()->user()->level->permis->where('name', 'Pelanggan')->first()->export;
        }
    }
}
