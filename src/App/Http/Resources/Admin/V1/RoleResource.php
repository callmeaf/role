<?php

namespace Callmeaf\Role\App\Http\Resources\Admin\V1;

use Callmeaf\Permission\App\Repo\Contracts\PermissionRepoInterface;
use Callmeaf\Role\App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Role $resource
 */
class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var PermissionRepoInterface $permissionRepo
         */
        $permissionRepo = app(PermissionRepoInterface::class);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_fa' => $this->name_fa,
            'guard_name' => $this->guard_name,
            'created_at' => $this->created_at,
            'created_at_text' => $this->createdAtText(),
            'updated_at' => $this->updated_at,
            'updated_at_text' => $this->updatedAtText(),
            'deleted_at' => $this->deleted_at,
            'deleted_at_text' => $this->deletedAtText(),
            'permissions' => $permissionRepo->toResourceCollection($this->whenLoaded('permissions'))
        ];
    }
}
