<?php

namespace App\Providers;
use App\Policies\RequestPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Request;
use App\Models\RequestModel;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        RequestModel::class => RequestPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('request', RequestPolicy::class);
        Gate::define('request.draft', RequestPolicy::class . '@draft');
        Gate::define('request.accept', RequestPolicy::class . '@accept');
        Gate::define('request.manage', RequestPolicy::class . '@manage');
        //
    }
}
