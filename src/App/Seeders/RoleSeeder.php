<?php

namespace Callmeaf\Role\App\Seeders;

use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
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

        $defaultRoles = \Rol::defaultRoles();
        foreach ($defaultRoles as $defaultRole) {
            $roleRepo->freshQuery();

            $role = $roleRepo->create([
                'name' => $defaultRole['name'],
                'name_fa' => @$defaultRole['name_fa'],
            ]);
            $role->resource->syncPermissions($defaultRole['permissions'] ?? []);
        }

        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);

        $usersSeeder = $roleRepo->config['users_seeder'];
        foreach ($defaultRoles as $defaultRole) {
            $roleName = $defaultRole['name'];
            $usersData = $usersSeeder[$roleName] ?? [];
            if(empty($usersData)) {
                continue;
            }

            foreach ($usersData as $userData) {
                $userRepo->freshQuery();
                $user = $userRepo->create($userData);

                $user->resource->assignRole($roleName);
            }
        }
    }
}
