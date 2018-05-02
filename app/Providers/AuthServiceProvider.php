<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //define gate
        // Gate::before(function ($user, $ability) {
        //     if ($user->isSuperAdmin()) {
        //         return true;
        //     }
        // });  
        // Gate::define('update-user', function ($user, $userModel) {
        //     return $user->id === $userModel->id;
        // });
        // Gate::define('create-user', function ($user) {
        //     return false;
        // });
        // Gate::define('update-issue', function ($user, $issueModel) {
        //     return $issue->id === $issueModel->reporter or $user->id === $issueModel->assigned_to;
        // });

              
    }
}
