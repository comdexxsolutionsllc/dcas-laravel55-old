<?php

namespace App;

/**
 * App\NullTicket.
 *
 * @property \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
class NullTicket extends Model
{
    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var int
     */
    protected $category_id = 0;

    /**
     * @var null
     */
    protected $ticket_id = null;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var int
     */
    protected $priority = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var string
     */
    protected $status = 'nullable';

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getTicketId()
    {
        return $this->ticket_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
