<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Venturecraft\Revisionable\RevisionableTrait;
use Watson\Rememberable\Rememberable;


/**
 * Generic Model Class
 * @package App
 */
abstract class Model extends Eloquent
{
    use Rememberable, RevisionableTrait;


    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;

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
