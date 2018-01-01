<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use App\Permission;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    use ApiErrorResponse;

    /**
     * PermissionsController constructor.
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
        return $this->respond($permissions_paged = Permission::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $permission = new Permission($request->only(['name', 'display_name', 'description']));

        $permission->save();

        return $this->respondResourceCreated("Resource #{$permission->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Permission $permission): JsonResponse
    {
        return $this->respond($permission = Permission::findOrFail($permission));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Permission $permission): JsonResponse
    {
        $permission = Permission::findOrFail($permission->id);

        $permission->update($request->only(['name', 'display_name', 'description']));

        return $this->respond("Resource #{$permission->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Permission $permission): JsonResponse
    {
        $permission = Permission::findOrFail($permission_id = $permission->id);

        $permission->delete();

        return $this->respond("Resource #{$permission_id} deleted.");
    }
}
