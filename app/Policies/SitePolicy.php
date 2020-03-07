<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sites.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the site.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function view(User $user, Site $site)
    {
        return $user->id === $site->user_id;
    }

    /**
     * Determine whether the user can view the site script.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function viewScript(User $user, Site $site)
    {
        return $user->id === $site->user_id;
    }

    /**
     * Determine whether the user can create sites.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the site.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function update(User $user, Site $site)
    {
        return $user->id === $site->user_id;
    }

    /**
     * Determine whether the user can delete the site.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function delete(User $user, Site $site)
    {
        return $user->id === $site->user_id;
    }

    /**
     * Determine whether the user can restore the site.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
        return $user->id === $site->user_id;
    }

    /**
     * Determine whether the user can permanently delete the site.
     *
     * @param User $user
     * @param Site $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        return false;
    }
}
