<?php

namespace Callmeaf\Role;

use Callmeaf\Base\CallmeafServiceProvider;
use Callmeaf\Base\Contracts\ServiceProvider\HasConfig;
use Callmeaf\Base\Contracts\ServiceProvider\HasEvent;
use Callmeaf\Base\Contracts\ServiceProvider\HasFacade;
use Callmeaf\Base\Contracts\ServiceProvider\HasLang;
use Callmeaf\Base\Contracts\ServiceProvider\HasMigration;
use Callmeaf\Base\Contracts\ServiceProvider\HasRepo;
use Callmeaf\Base\Contracts\ServiceProvider\HasRoute;
use Callmeaf\Base\Contracts\ServiceProvider\HasSeeder;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Callmeaf\Role\App\Seeders\RoleSeeder;

class CallmeafRoleServiceProvider extends CallmeafServiceProvider implements HasRepo, HasEvent, HasRoute, HasMigration, HasConfig, HasLang,HasFacade,HasSeeder
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
}
