<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;
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
        if (app()->runningInConsole()) {
            return; 
        }
        
        $roles = Role::with('permissions')->get();
        
        $permissionArray = [];
        
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionArray[$permission->name][] = $role->id;
            }
        }
        
        foreach ($permissionArray as $name => $roles) {
            Gate::define($name, function (User $user) use ($roles) {
                return $user->roles->pluck('id')->intersect($roles)->isNotEmpty();
            });
        }
    }
}
