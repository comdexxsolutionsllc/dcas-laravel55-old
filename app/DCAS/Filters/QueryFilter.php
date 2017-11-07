<?php

namespace DCAS\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class QueryFilter
 * @package DCAS\Filters
 * @link https://github.com/laracasts/Dedicated-Query-String-Filtering
 */
abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $builder;
    }

    /**
     * Return all filters.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }
}