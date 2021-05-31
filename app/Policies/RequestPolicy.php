<?php

namespace App\Policies;

use App\Models\RequestModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return mixed
     */
    public function view(User $user, RequestModel $request)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->inRole('user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return mixed
     */
    public function update(User $user, RequestModel $rq)
    {
        //
       // return $user->hasAccess(['request.update']) or $user->id == $rq->user_id;
       return $user->hasAccess(['request.update']) or $user->id == $rq->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->hasAccess(['request.delete']);
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return mixed
     */
    public function restore(User $user, RequestModel $request)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Request  $request
     * @return mixed
     */
    public function forceDelete(User $user, RequestModel $rq)
    {
        //
    }
    public function accept(User $user)
    {
        return $user->hasAccess(['request.accept']);
        //return $user->inRole('manager');
    }
    public function draft(User $user)
    {
        return $user->inRole('user');
    }
    public function manage(User $user){
        return $user->inRole('manager');
    }
}
