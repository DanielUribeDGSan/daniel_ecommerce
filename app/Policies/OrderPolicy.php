<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function author(User $user, Order $orden)
    {
        if ($orden->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }
    public function payment(User $user, Order $orden)
    {
        if ($orden->status == 1) {
            return true;
        } else {
            return false;
        }
    }
}
