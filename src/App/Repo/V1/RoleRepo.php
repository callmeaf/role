<?php

namespace Callmeaf\Role\App\Repo\V1;

use Callmeaf\Base\App\Repo\V1\BaseRepo;
use Callmeaf\Role\App\Http\Resources\Admin\V1\RoleResource;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;

class RoleRepo extends BaseRepo implements RoleRepoInterface
{
    public function syncPermissions(mixed $id, array $permissionsIds)
    {
        /**
         * @var RoleResource $role
         */
        $role = $this->findById($id);

        $role->resource->permissions()->sync($permissionsIds);

        $role->resource->loadMissing(['permissions']);

        return $role;
    }
}
