<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Models\Ticket;

class TicketsController extends Controller
{
    use ApiErrorResponse;

    /**
     * TicketsController constructor.
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
        return $this->respond($tickets_paged = Ticket::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $ticket = new Ticket($request->only([
            'user_id',
            'category_id',
            'queue_id',
            'technician_id',
            'ticket_id',
            'title',
            'priority',
            'status',
            'message'
        ]));

        $ticket->save();

        return $this->respondResourceCreated("Resource #{$ticket->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Ticket $ticket): JsonResponse
    {
        return $this->respond($ticket = Ticket::findOrFail($ticket));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Ticket $ticket): JsonResponse
    {
        $ticket = Ticket::findOrFail($ticket->id);

        $ticket->update($request->only([
            'user_id',
            'category_id',
            'queue_id',
            'technician_id',
            'ticket_id',
            'title',
            'priority',
            'status',
            'message'
        ]));

        return $this->respond("Resource #{$ticket->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Ticket $ticket
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Ticket $ticket): JsonResponse
    {
        $ticket = Ticket::findOrFail($ticket_id = $ticket->id);

        $ticket->delete();

        return $this->respond("Resource #{$ticket_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $ticket
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($ticket): JsonResponse
    {
        $ticket = Ticket::withTrashed()->where('id', $ticket_id = $ticket);

        $ticket->restore();

        return $this->respond("Resource #{$ticket_id} restored.");
    }
}
