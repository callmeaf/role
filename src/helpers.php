<?php

if(!function_exists('userHasRole')) {
    function userHasRole(\Callmeaf\Role\App\Enums\RoleName|string $role,$user = null): bool
    {
        $user ??= \Illuminate\Support\Facades\Auth::user();

        if(! $user) {
            return false;
        }

        if($role instanceof \Callmeaf\Role\App\Enums\RoleName) {
            $role = $role->value;
        }
        return $user->hasRole($role);
    }
}

if(!function_exists('userIsSuperAdmin')) {
    function userIsSuperAdmin($user = null): bool
    {
        return userHasRole(role: \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN,user: $user);
    }
}

if(!function_exists('userIsAdmin')) {
    function userIsAdmin($user = null): bool
    {
        return userHasRole(role: \Callmeaf\Role\App\Enums\RoleName::ADMIN,user: $user);
    }
}

if(!function_exists('userIsUser')) {
    function userIsUser($user = null): bool
    {
        return userHasRole(role: \Callmeaf\Role\App\Enums\RoleName::USER,user: $user);
    }
}
