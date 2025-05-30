<?php

namespace Callmeaf\Role\App\Http\Requests\Admin\V1;

use Callmeaf\Permission\App\Repo\Contracts\PermissionRepoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleSyncPermissionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(PermissionRepoInterface $permissionRepo): array
    {
        return [
            'permissions_ids' => ['nullable','array'],
            'permissions_ids.*' => ['required',Rule::exists($permissionRepo->getTable(),$permissionRepo->getModel()->getKeyName())],
        ];
    }
}
