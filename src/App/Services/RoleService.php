<?php

namespace Callmeaf\Role\App\Services;

use Callmeaf\Permission\App\Enums\PermissionCycle;
use Callmeaf\Permission\App\Repo\Contracts\PermissionRepoInterface;
use Callmeaf\Role\App\Enums\RoleName;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function defaultRoles(): array
    {
        /**
         * @var RoleRepoInterface $roleRepo
         */
        $roleRepo = app(RoleRepoInterface::class);

        $roles = [];
        foreach ($this->rolesCases() as $roleCase) {
            $roles[] = [
                'name' => $roleCase->value,
                'name_fa' => \Base::enumCaseTranslator(
                    \Base::getPackageNameFromModel($roleRepo->getModel()::class),
                    $roleCase,
                ),
                'permissions' => $this->rolePermissions($roleCase->value),
            ];
        }

        return $roles;
    }

    public function rolesCases(): array
    {
        /**
         * @var RoleRepoInterface $roleRepo
         */
        $roleRepo = app(RoleRepoInterface::class);
        $config = $roleRepo->config;

        return $config['enums']['name']::cases();
    }

    public function rolePermissions($roleName): Collection
    {
        $permissionsSuffixName = match($roleName) {
            RoleName::ADMIN->value => [
                PermissionCycle::INDEX->value,
                PermissionCycle::STORE->value,
                PermissionCycle::SHOW->value,
                PermissionCycle::UPDATE->value,
                PermissionCycle::DESTROY->value,
                PermissionCycle::RESTORE->value,
                PermissionCycle::TRASHED->value,
            ],
            RoleName::USER->value => [
                PermissionCycle::INDEX->value,
                PermissionCycle::STORE->value,
                PermissionCycle::SHOW->value,
                PermissionCycle::UPDATE->value,
                PermissionCycle::DESTROY->value,
            ],
            default => [],
        };

        /**
         * @var PermissionRepoInterface $permissionRepo
         */
        $permissionRepo = app(PermissionRepoInterface::class);

        return $permissionRepo->getQuery()->where(function(Builder $query) use ($permissionsSuffixName) {
            foreach ($permissionsSuffixName as $index => $permissionSuffixName) {
                if($index === array_key_first($permissionsSuffixName)) {
                    $query->whereLike('name',"%{$permissionSuffixName}",true);
                } else {
                    $query->orWhereLike("name","%{$permissionSuffixName}",true);
                }
            }

        })->get();
    }
}
