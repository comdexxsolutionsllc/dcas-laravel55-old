<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\SupportDesk\Models\Category;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('SupportDesk::categories.index');
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
//        $this->authorize('create', Category::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category): Response
    {
//        $this->authorize('update', Category::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): Response
    {
//        $this->authorize('delete', Category::class);
    }
}
