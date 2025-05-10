<?php

namespace Callmeaf\Role\App\Http\Requests\Admin\V1;

use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest
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
    public function rules(RoleRepoInterface $roleRepo): array
    {
        return [
            'name' => ['required','string','max:255',Rule::unique($roleRepo->getTable(),'name')->ignore($this->route('role'))],
            'name_fa' => ['required','string','max:255',Rule::unique($roleRepo->getTable(),'name_fa')->ignore($this->route('role'))],
        ];
    }
}
