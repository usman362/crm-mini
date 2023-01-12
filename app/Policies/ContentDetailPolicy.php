<?php

namespace App\Policies;

use App\Models\ContentDetail;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Silber\Bouncer\BouncerFacade as Bouncer;

class ContentDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Bouncer::can('view-any-content-detail');
    }

    public function editAny(User $user)
    {
        return Bouncer::can('edit-any-content-detail');
    }

    public function deleteAny(User $user)
    {
        return Bouncer::can('delete-any-content-detail');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContentDetail  $contentDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ContentDetail $contentDetail)
    {
        return Bouncer::can('view-any-content-detail');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Bouncer::can('create-content-detail');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContentDetail  $contentDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ContentDetail $contentDetail)
    {
        return Bouncer::can('edit-any-content-detail');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContentDetail  $contentDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ContentDetail $contentDetail)
    {
        return Bouncer::can('delete-any-content-detail');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContentDetail  $contentDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ContentDetail $contentDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContentDetail  $contentDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ContentDetail $contentDetail)
    {
        //
    }
}
