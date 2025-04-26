<?php

namespace Callmeaf\Role\App\Http\Resources\Web\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<RoleResource>
 */
class RoleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, RoleResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
