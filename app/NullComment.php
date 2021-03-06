<?php

namespace App;

/**
 * App\NullComment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
class NullComment extends Model
{
    /**
     * @var null
     */
    protected $ticket_id = null;

    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var null
     */
    protected $comment = null;

    public function getTicketId()
    {
        return $this->ticket_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
