<?php

namespace App\Http\Controllers\Api;

use App\Services\ItemService;
use App\Http\Controllers\Controller;
use App\User;

class TestingController extends Controller
{
    protected $itemService;

    /**
     * TestingController constructor.
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(5);

        $result = $this->itemService->getItems($data, []);

        return response()->make($result, 200);
    }
}
