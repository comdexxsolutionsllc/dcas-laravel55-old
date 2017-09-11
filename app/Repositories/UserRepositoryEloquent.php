<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\User;
use App\Validators\UserValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements CacheableInterface, UserRepository
{
    use CacheableRepository;

    protected $fieldSearchable = [
        'username'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     *
     * @return string
     */
    public function presenter()
    {
        return "App\\Presenters\\UserPresenter";
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return "App\\Validators\\UserValidator";
    }
}
