<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\SupportDesk\Models\Status;

class StatusController extends Controller
{
    /**
     * StatusController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        //
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
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status): Response
    {
        //
    }
}
