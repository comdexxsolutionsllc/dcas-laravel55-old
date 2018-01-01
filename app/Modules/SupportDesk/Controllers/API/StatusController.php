<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Models\Status;

class StatusController extends Controller
{
    use ApiErrorResponse;

    /**
     * StatusController constructor.
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
        return $this->respond($statuses_paged = Status::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $status = new Status($request->only(['name', 'hex']));

        $status->save();

        return $this->respondResourceCreated("Resource #{$status->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Status $status): JsonResponse
    {
        return $this->respond($status = Status::findOrFail($status));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Status $status): JsonResponse
    {
        $status = Status::findOrFail($status->id);

        $status->update($request->only(['name', 'hex']));

        return $this->respond("Resource #{$status->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Status $status): JsonResponse
    {
        $status = Status::findOrFail($status_id = $status->id);

        $status->delete();

        return $this->respond("Resource #{$status_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($status): JsonResponse
    {
        $status = Status::withTrashed()->where('id', $status_id = $status);

        $status->restore();

        return $this->respond("Resource #{$status_id} restored.");
    }
}
