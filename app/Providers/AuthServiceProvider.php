<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\NilaiPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        Gate::define('isAdmin', fn(User $user) => $user->role === 'admin' );
        Gate::define('isGuru', fn(User $user) => $user->role === 'guru' );
        Gate::define('isSiswa', fn(User $user) => $user->role === 'siswa' );
        Gate::define('isSiswaAtauGuru', fn(User $user) => $user->role === 'siswa' || $user->role === 'guru' );
    }
}
