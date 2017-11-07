<?php namespace DCAS\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function setup()
    {
        $this->onlyShowDeletedForAdmins();
    }

    public function onlyShowDeletedForAdmins()
    {
        if(!auth()->user()) return null;

        if(auth()->user()->isAdmin()) $this->withTrashed();
    }

    /**
     * @param $name
     * @return $this
     */
    public function name($name)
    {
        return $this->where(function ($q) use ($name) {
            return $q->where('name', 'LIKE', "%$name%");
        });
    }

    public function isDisabled()
    {
        $this->where('is_disabled', true);
    }

    public function isLoggedIn()
    {
        $this->where('is_logged_in', true);
    }
}
