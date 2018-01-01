<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use App\Role;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    use ApiErrorResponse;

    /**
     * RolesController constructor.
     */
    public function __construct()
    {
        $this->middleware(['api']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respond($roles_paged = Role::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $role = new Role($request->only(['name', 'display_name', 'description']));

        $role->save();

        return $this->respondResourceCreated("Resource #{$role->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Role $role): JsonResponse
    {
        return $this->respond($role = Role::findOrFail($role));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Role $role): JsonResponse
    {
        $role = Role::findOrFail($role->id);

        $role->update($request->only(['name', 'display_name', 'description']));

        return $this->respond("Resource #{$role->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        $role = Role::findOrFail($role_id = $role->id);

        $role->delete();

        return $this->respond("Resource #{$role_id} deleted.");
    }
}
