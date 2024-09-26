<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::loadKeysFrom(__DIR__.'/../../storage/');


        Passport::tokensCan([
            'user' => 'Perform only normal user actions',
            'admin' => 'Perform only normal admin actions',
        ]);

        // Passport::hashClientSecrets();

        // Passport::routes();
        Passport::tokensExpireIn(now()->addDay(1));
        Passport::refreshTokensExpireIn(now()->addHours(1));
        Passport::personalAccessTokensExpireIn(now()->addDays(1));

    }
}
