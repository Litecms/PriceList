<?php

namespace Litecms\Pricelist\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Pricelist\Models\PriceList;

class PriceListPolicy
{

    /**
     * Determine if the given user can view the price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function view(UserPolicy $user, PriceList $price_list)
    {
        if ($user->canDo('pricelist.price_list.view') && $user->isAdmin()) {
            return true;
        }

        return $price_list->user_id == user_id() && $price_list->user_type == user_type();
    }

    /**
     * Determine if the given user can create a price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('pricelist.price_list.create');
    }

    /**
     * Determine if the given user can update the given price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function update(UserPolicy $user, PriceList $price_list)
    {
        if ($user->canDo('pricelist.price_list.edit') && $user->isAdmin()) {
            return true;
        }

        return $price_list->user_id == user_id() && $price_list->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, PriceList $price_list)
    {
        return $price_list->user_id == user_id() && $price_list->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function verify(UserPolicy $user, PriceList $price_list)
    {
        if ($user->canDo('pricelist.price_list.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given price_list.
     *
     * @param UserPolicy $user
     * @param PriceList $price_list
     *
     * @return bool
     */
    public function approve(UserPolicy $user, PriceList $price_list)
    {
        if ($user->canDo('pricelist.price_list.approve')) {
            return true;
        }

        return false;
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
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
