<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    protected $policies = [
        'App\Models\Task' => 'App\Policies\TaskPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}