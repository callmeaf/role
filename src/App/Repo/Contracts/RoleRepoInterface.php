<?php

namespace Callmeaf\Role\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\Role\App\Models\Role;
use Callmeaf\Role\App\Http\Resources\Api\V1\RoleCollection;
use Callmeaf\Role\App\Http\Resources\Api\V1\RoleResource;

/**
 * @extends BaseRepoInterface<Role,RoleResource,RoleCollection>
 */
interface RoleRepoInterface extends BaseRepoInterface
{
    public function syncPermissions(mixed $id,array $permissionsIds);
}
