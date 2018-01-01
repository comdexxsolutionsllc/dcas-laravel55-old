<?php

namespace Modules\SupportDesk\Controllers\API;

use App\Http\Controllers\Controller;
use DCAS\Traits\ApiErrorResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Models\Comment;

class CommentsController extends Controller
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respond($comments_paged = Comment::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $comment = new Comment(['comment' => $request->input('comment')]);

        $comment->save();

        return $this->respondResourceCreated("Resource #{$comment->id} created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\SupportDesk\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $comment): JsonResponse
    {
        return $this->respond($comment = Comment::findOrFail($comment));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Modules\SupportDesk\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Comment $comment): JsonResponse
    {
        $comment = Comment::findOrFail($comment->id);

        $comment->update(['comment' => $request->input('comment')]);

        return $this->respond("Resource #{$comment->id} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\SupportDesk\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment): JsonResponse
    {
        $comment = Comment::findOrFail($comment_id = $comment->id);

        $comment->delete();

        return $this->respond("Resource #{$comment_id} deleted.");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($comment): JsonResponse
    {
        $comment = Comment::withTrashed()->where('id', $comment_id = $comment);

        $comment->restore();

        return $this->respond("Resource #{$comment_id} restored.");
    }
}
