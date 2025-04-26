<?php

namespace Callmeaf\Role\App\Http\Controllers\Admin\V1;

use Callmeaf\Base\App\Http\Controllers\Admin\V1\AdminController;
use Callmeaf\Role\App\Repo\Contracts\RoleRepoInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends AdminController implements HasMiddleware
{
    public function __construct(protected RoleRepoInterface $roleRepo)
    {
        parent::__construct($this->roleRepo->config);
    }

    public static function middleware(): array
    {
        return [
           //
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->roleRepo->latest()->search()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return $this->roleRepo->create(data: $this->request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->roleRepo->findById(value: $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return $this->roleRepo->update(id: $id, data: $this->request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->roleRepo->delete(id: $id);
    }

    public function statusUpdate(string $id)
    {
        return $this->roleRepo->update(id: $id, data: $this->request->validated());
    }

    public function typeUpdate(string $id)
    {
        return $this->roleRepo->update(id: $id, data: $this->request->validated());
    }

    public function trashed()
    {
        return $this->roleRepo->trashed()->latest()->search()->paginate();
    }

    public function restore(string $id)
    {
        return $this->roleRepo->restore(id: $id);
    }

    public function forceDestroy(string $id)
    {
        return $this->roleRepo->forceDelete(id: $id);
    }
}
