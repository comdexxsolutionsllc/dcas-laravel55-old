<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\SupportDesk\Models\Queue;

class QueueController extends Controller
{
    use ApiErrorResponse;

    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['api']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return Queue::paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $queue): Response
    {
        return Queue::findOrFail($queue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Queue $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue): Response
    {
        //
    }
}
