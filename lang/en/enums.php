<?php

use Callmeaf\Role\App\Enums\RoleName;
use Callmeaf\Role\App\Enums\RoleStatus;
use Callmeaf\Role\App\Enums\RoleType;

return [
    RoleStatus::class => [
        RoleStatus::ACTIVE->name => 'Active',
        RoleStatus::INACTIVE->name => 'InActive',
        RoleStatus::PENDING->name => 'Pending',
    ],
    RoleType::class => [
        //
    ],
    RoleName::class => [
        RoleName::SUPER_ADMIN->name => 'SuperAdmin',
        RoleName::ADMIN->name => 'Admin',
        RoleName::USER->name => 'User'
    ],
];
