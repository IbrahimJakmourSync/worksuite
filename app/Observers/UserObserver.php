<?php

namespace App\Observers;

use App\User;

class UserObserver
{

    public function saving(User $user)
    {
        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if (company()) {
            $user->company_id = company()->id;
        }
    }

}
