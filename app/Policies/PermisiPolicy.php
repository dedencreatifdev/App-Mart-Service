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
        return Filament::getTenant()->permisis->where('name','Level')->first()->list ?? false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permisi $permisi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permisi $permisi): bool
    {
        // return Filament::getTenant()->permisis->where('name','Level')->first()->ubah ?? false;
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permisi $permisi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user): bool
    {
        // return Filament::getTenant()->permisis->where('name','Permisi')->first()->hapus_semua ?? false;
        return false;
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
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function export(User $user, Permisi $permisi): bool
    {
        return false;
    }
}
