<?php

namespace App\Policies;

use App\Models\PizzaOrder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PizzaOrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->tokenCan('read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PizzaOrder $pizzaOrder): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->tokenCan('create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PizzaOrder $pizzaOrder): bool
    {
        return $pizzaOrder->user()->is($user) && $user->tokenCan('update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PizzaOrder $pizzaOrder): bool
    {
        return $this->update($user, $pizzaOrder);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PizzaOrder $pizzaOrder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PizzaOrder $pizzaOrder): bool
    {
        return false;
    }
}
