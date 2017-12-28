<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\SupportDesk\Models\Category;

class CategoryController extends Controller
{
    use ApiErrorResponse;

    /**
     * CategoryController constructor.
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
        return Category::paginate(50);
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
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category): Response
    {
        return Category::findOrFail($category);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): Response
    {
        //
    }
}
