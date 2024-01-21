<?php

namespace App\Policies;

use App\Models\Ring;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ring $ring): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ring $ring): bool
    {
        return  $user->is($ring->user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ring $ring): bool
    {
        return $user->is($ring->user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ring $ring): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ring $ring): bool
    {
        //
    }
}
