<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\Role\App\Models\Role::class,
    'route_key_name' => 'id',
    'repo' => \Callmeaf\Role\App\Repo\V1\RoleRepo::class,
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\Role\App\Http\Resources\Api\V1\RoleResource::class,
            'resource_collection' => \Callmeaf\Role\App\Http\Resources\Api\V1\RoleCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\Role\App\Http\Resources\Web\V1\RoleResource::class,
            'resource_collection' => \Callmeaf\Role\App\Http\Resources\Web\V1\RoleCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\Role\App\Http\Resources\Admin\V1\RoleResource::class,
            'resource_collection' => \Callmeaf\Role\App\Http\Resources\Admin\V1\RoleCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\Role\App\Events\Api\V1\RoleIndexed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleCreated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleShowed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleDeleted::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Api\V1\RoleTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\Role\App\Events\Web\V1\RoleIndexed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleCreated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleShowed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleDeleted::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Web\V1\RoleTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\Role\App\Events\Admin\V1\RoleIndexed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleCreated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleShowed::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleDeleted::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Role\App\Events\Admin\V1\RoleTypeUpdated::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleIndexRequest::class,
            'store' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleStoreRequest::class,
            'show' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleShowRequest::class,
            'update' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleUpdateRequest::class,
            'destroy' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Role\App\Http\Requests\Api\V1\RoleTypeUpdateRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleIndexRequest::class,
            'create' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleCreateRequest::class,
            'store' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleStoreRequest::class,
            'show' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleShowRequest::class,
            'edit' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleEditRequest::class,
            'update' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleUpdateRequest::class,
            'destroy' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Role\App\Http\Requests\Web\V1\RoleTypeUpdateRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleIndexRequest::class,
            'store' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleStoreRequest::class,
            'show' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleShowRequest::class,
            'update' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleUpdateRequest::class,
            'destroy' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Role\App\Http\Requests\Admin\V1\RoleTypeUpdateRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'role' => \Callmeaf\Role\App\Http\Controllers\Api\V1\RoleController::class,
        ],
        RequestType::WEB->value => [
            'role' => \Callmeaf\Role\App\Http\Controllers\Web\V1\RoleController::class,
        ],
        RequestType::ADMIN->value => [
            'role' => \Callmeaf\Role\App\Http\Controllers\Admin\V1\RoleController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'roles',
            'as' => 'roles.',
            'middleware' => [
                "route_status:" . \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
            ],
        ],
        RequestType::WEB->value => [
            'prefix' => 'roles',
            'as' => 'roles.',
            'middleware' => [
                "route_status:" . \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
            ],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'roles',
            'as' => 'roles.',
            'middleware' => [
                'auth:sanctum',
                'role:' . \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value,
            ],
        ],
    ],
    'enums' => [
         'status' => \Callmeaf\Role\App\Enums\RoleStatus::class,
         'type' => \Callmeaf\Role\App\Enums\RoleType::class,
    ],
     'exports' => [
        RequestType::API->value => [
            'excel' => \Callmeaf\Role\App\Exports\Api\V1\RolesExport::class,
        ],
        RequestType::WEB->value => [
            'excel' => \Callmeaf\Role\App\Exports\Web\V1\RolesExport::class,
        ],
        RequestType::ADMIN->value => [
            'excel' => \Callmeaf\Role\App\Exports\Admin\V1\RolesExport::class,
        ],
     ],
     'imports' => [
         RequestType::API->value => [
             'excel' => \Callmeaf\Role\App\Imports\Api\V1\RolesImport::class,
         ],
         RequestType::WEB->value => [
             'excel' => \Callmeaf\Role\App\Imports\Web\V1\RolesImport::class,
         ],
         RequestType::ADMIN->value => [
             'excel' => \Callmeaf\Role\App\Imports\Admin\V1\RolesImport::class,
         ],
     ],
    'facades' => [
        [
            'alias' => 'Rol',
            'service' => \Callmeaf\Role\App\Services\RoleService::class,
            'facade' => \Callmeaf\Role\App\Facades\RoleFacade::class,
        ],
    ],
    'users_seeder' => [
        \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value => [
            [
                'email' => env('SUPER_ADMIN_EMAIL','superadmin@gmail.com'),
                'password' =>  env('SUPER_ADMIN_PASSWORD','superadmin@1234')
            ]
        ],
        \Callmeaf\Role\App\Enums\RoleName::ADMIN->value => [
        ],
        \Callmeaf\Role\App\Enums\RoleName::USER->value => [

        ],
    ],
    'default_guard_name' => 'web',
];
