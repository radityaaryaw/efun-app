<?php

namespace App\Policies;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KategoriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'Admin';
    }

    public function view(User $user, Kategori $kategori): bool
    {
        return $user->role === 'Admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'Admin';
    }

    public function update(User $user, Kategori $kategori): bool
    {
        return $user->role === 'Admin';
    }

    public function delete(User $user, Kategori $kategori): bool
    {
        return $user->role === 'Admin';
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kategori $kategori): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kategori $kategori): bool
    {
        //
    }
}
