<?php
/*
 * This file is part of the Laravel-Modx package.
 *
 * (c) Giorgos Mylonas <mylgeorge@gmail.com>
 *
 */

namespace Modx\Providers;


use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class ModxUserProvider extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->getAuthPassword(), ['salt' => $user->salt]);
    }

}