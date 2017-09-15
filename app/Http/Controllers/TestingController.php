<?php

namespace App\Http\Controllers;

//use App\Criteria\UserCriteria;
//use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Repositories\UserRepositoryEloquent;

class TestingController extends Controller
{
    /**
     * @var UserRepositoryEloquent
     */
    protected $repository;

    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function criteria()
    {
        $response = [
            'debug' => [
                'route_path' => \Route::current()->uri(),
                'message' => 'This controller is not currently being used for testing.',
                'code' => 501
            ]
        ];

        return (config('app.debug')) ? response()->json($response, 501) : response()->json([], 200);

//        $this->repository->pushCriteria(new UserCriteria());
//        $users = $this->repository->getByCriteria(new UserCriteria());
//
//        return $users;
    }
}
