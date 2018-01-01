<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Models\Queue;

class QueueController extends Controller
{
    use ApiErrorResponse;

    /**
     * QueueController constructor.
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
        return $this->respond($queues_paged = Queue::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $queue = new Queue($request->only(['name', 'description']));

        $queue->save();

        return $this->respondResourceCreated("Resource #{$queue->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Queue $queue): JsonResponse
    {
        return $this->respond($queue = Queue::findOrFail($queue));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Queue $queue): JsonResponse
    {
        $queue = Queue::findOrFail($queue->id);

        $queue->update($request->only(['name', 'description']));

        return $this->respond("Resource #{$queue->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Queue $queue): JsonResponse
    {
        $queue = Queue::findOrFail($queue_id = $queue->id);

        $queue->delete();

        return $this->respond("Resource #{$queue_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $queue
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($queue): JsonResponse
    {
        $queue = Queue::withTrashed()->where('id', $queue_id = $queue);

        $queue->restore();

        return $this->respond("Resource #{$queue_id} restored.");
    }
}
