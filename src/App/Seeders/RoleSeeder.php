<?php

namespace Callmeaf\Role\App\Seeders;

use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var RoleRepoInterface $roleRepo
         */
        $roleRepo = app(RoleRepoInterface::class);

        foreach (\Rol::defaultRoles() as $defaultRole) {
            $roleRepo->freshQuery();

            $permissions = $defaultRole['permissions'];
            unset($defaultRole['permissions']);

            $role = $roleRepo->create($defaultRole);
            $role->resource->syncPermissions($permissions);
        }
    }
}
