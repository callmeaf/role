<?php

namespace Callmeaf\Role\App\Enums;


use Callmeaf\Base\App\Enums\BaseStatus;

enum RoleStatus: string
{
    case ACTIVE = BaseStatus::ACTIVE->value;
    case INACTIVE = BaseStatus::INACTIVE->value;
    case PENDING = BaseStatus::PENDING->value;
}
