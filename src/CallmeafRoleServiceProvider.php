<?php

namespace Callmeaf\Role;

use Callmeaf\Base\CallmeafServiceProvider;
use Callmeaf\Base\Contracts\ServiceProvider\HasConfig;
use Callmeaf\Base\Contracts\ServiceProvider\HasEvent;
use Callmeaf\Base\Contracts\ServiceProvider\HasFacade;
use Callmeaf\Base\Contracts\ServiceProvider\HasHelpers;
use Callmeaf\Base\Contracts\ServiceProvider\HasLang;
use Callmeaf\Base\Contracts\ServiceProvider\HasMigration;
use Callmeaf\Base\Contracts\ServiceProvider\HasRepo;
use Callmeaf\Base\Contracts\ServiceProvider\HasRoute;
use Callmeaf\Base\Contracts\ServiceProvider\HasSeeder;
use Callmeaf\Role\App\Enums\RoleName;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Callmeaf\Role\App\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Gate;

class CallmeafRoleServiceProvider extends CallmeafServiceProvider implements HasRepo, HasEvent, HasRoute, HasMigration, HasConfig, HasLang,HasFacade,HasSeeder,HasHelpers
{
    protected function serviceKey(): string
    {
        return 'role';
    }

    public function repo(): string
    {
        return RoleRepoInterface::class;
    }

    public function seeders(): array
    {
        return [
            RoleSeeder::class,
        ];
    }

    public function helpers(): array
    {
        return [
            '/helpers.php'
        ];
    }

    public function boot(): void
    {
        parent::boot();

        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole(RoleName::SUPER_ADMIN->value) ? true : null;
        });
    }
}
