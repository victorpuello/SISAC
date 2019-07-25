<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 12/09/2018
 * Time: 11:28 PM
 */

namespace ATS\Transformers\Users;


use ATS\Model\User;
use League\Fractal\TransformerAbstract;


class UserTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name'       => $user->name,
            'lastname'       => $user->lastname,
            'username'       => $user->username,
            'email'      => $user->email,
            'type'       => $user->type,
        ];
    }
}