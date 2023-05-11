<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomerProvider extends EloquentUserProvider
{
    public function validateCredentials(Authenticatable $customer, array $credentials)
    {
        $plain = $credentials['password'];

        return app('hash')->check($plain, $customer->getAuthPassword());
    }
}
