<?php

namespace Litecms\PriceList\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\PriceList\Models\PriceList;

class PriceListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the pricelist.
     *
     * @param User $user
     * @param PriceList $pricelist
     *
     * @return bool
     */
    public function view(User $user, PriceList $pricelist)
    {
        if ($user->canDo('pricelist.pricelist.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $pricelist->user_id;
    }

    /**
     * Determine if the given user can create a pricelist.
     *
     * @param User $user
     * @param PriceList $pricelist
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('pricelist.pricelist.create');
    }

    /**
     * Determine if the given user can update the given pricelist.
     *
     * @param User $user
     * @param PriceList $pricelist
     *
     * @return bool
     */
    public function update(User $user, PriceList $pricelist)
    {
        if ($user->canDo('pricelist.pricelist.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $pricelist->user_id;
    }

    /**
     * Determine if the given user can delete the given pricelist.
     *
     * @param User $user
     * @param PriceList $pricelist
     *
     * @return bool
     */
    public function destroy(User $user, PriceList $pricelist)
    {
        if ($user->canDo('pricelist.pricelist.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $pricelist->user_id;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
