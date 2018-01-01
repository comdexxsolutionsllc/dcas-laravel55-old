<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\SupportDesk\Mailers\AppMailer;
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

    /**
     * Show all closed tickets.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function showClosed(): LengthAwarePaginator
    {
        $tickets = Ticket::where('status', 'Closed')
            ->with('category')
            ->paginate(
                config('modules.tickets.ticket.pagination')
            );

        return $tickets;
    }

    /**
     * Close a ticket.
     *
     * @param $ticket_id
     * @param AppMailer $mailer
     * @return JsonResponse
     */
    public function close($ticket_id, AppMailer $mailer): JsonResponse
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return $this->respond("Ticket #{$ticket->id} has been closed.");
    }

    /**
     * Open a ticket.
     *
     * @param $ticket_id
     * @param AppMailer $mailer
     * @return JsonResponse
     */
    public function open($ticket_id, AppMailer $mailer): JsonResponse
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Open';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return $this->respond("Ticket #{$ticket->id} has been re-opened.");
    }

    /**
     * Show all user tickets.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function userTickets(Request $request): LengthAwarePaginator
    {
        $tickets = Ticket::where('user_id', $request->only('user_id'))
            ->with('category')
            ->paginate(
                $pagination = config('modules.tickets.ticket.pagination')
            );

        return $tickets;
    }
}
