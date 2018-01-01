<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respond($categories_paged = Category::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $category = new Category(['name' => $request->input('name')]);

        $category->save();

        return $this->respondResourceCreated("Resource #{$category->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return $this->respond($category = Category::findOrFail($category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $category = Category::findOrFail($category->id);

        $category->update(['name' => $request->input('name')]);

        return $this->respond("Resource #{$category->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category = Category::findOrFail($category_id = $category->id);

        $category->delete();

        return $this->respond("Resource #{$category_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($category): JsonResponse
    {
        $category = Category::withTrashed()->where('id', $category_id = $category);

        $category->restore();

        return $this->respond("Resource #{$category_id} restored.");
    }
}
