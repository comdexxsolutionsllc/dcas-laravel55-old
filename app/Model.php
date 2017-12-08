<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Rogercbe\TableSorter\Sortable;
use Watson\Rememberable\Rememberable;

/**
 * Generic Model Class.
 */
abstract class Model extends Eloquent
{
    use Rememberable, Sortable;

    /**
     * Search as you type.
     * TNT/Scout.
     *
     * @var bool
     */
    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // TODO:  Customize array.

        return $array;
    }
}
