<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PublicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Publication $publication): bool
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
    public function update(Customer $customer, Publication $publication): bool
    {
        return true;
        // return $customer->id === $publication->customer_id;
    }
    // public function edit(Customer $customer, Publication $publication): bool
    // {
    //     return $customer->id === $publication->customer_id;
    // }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publication $publication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Publication $publication): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Publication $publication): bool
    {
        return false;
    }
}
