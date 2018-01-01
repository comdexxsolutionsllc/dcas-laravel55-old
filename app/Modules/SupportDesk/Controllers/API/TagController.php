<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Models\Tag;

class TagController extends Controller
{
    use ApiErrorResponse;

    /**
     * TagController constructor.
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
        return $this->respond($tags_paged = Tag::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $tag = new Tag($request->only(['name', 'slug', 'type', 'order_column']));

        $tag->save();

        return $this->respondResourceCreated("Resource #{$tag->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tag $tag): JsonResponse
    {
        return $this->respond($tag = Tag::findOrFail($tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Tag $tag): JsonResponse
    {
        $tag = Tag::findOrFail($tag->id);

        $tag->update($request->only(['name', 'slug', 'type', 'order_column']));

        return $this->respond("Resource #{$tag->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Tag $tag): JsonResponse
    {
        $tag = Tag::findOrFail($tag_id = $tag->id);

        $tag->delete();

        return $this->respond("Resource #{$tag_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($tag): JsonResponse
    {
        $tag = Tag::withTrashed()->where('id', $tag_id = $tag);

        $tag->restore();

        return $this->respond("Resource #{$tag_id} restored.");
    }
}
