<?php

namespace Callmeaf\Role\App\Facades;

use Callmeaf\Role\App\Services\RoleService;
use Illuminate\Support\Facades\Facade;

/**
 * @mixin RoleService
 */
class RoleFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RoleService::class;
    }
}
