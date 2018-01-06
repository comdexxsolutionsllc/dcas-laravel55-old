<?php

namespace App\Http\Controllers\Api;

class TestingController extends ApiDefaultController
{
    public function __construct()
    {
        $this->middleware(['auth', '2fa']);
    }

    /**
     * @return array
     */
    protected function tfaTest(): array
    {
//        return [
//            'data' => [
//                'message' => 'You made it'
//            ]
//        ];
        return view('auth.2fa');
    }
}
