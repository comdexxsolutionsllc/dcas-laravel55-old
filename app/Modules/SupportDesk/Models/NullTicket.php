<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * App\NullTicket
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
     * @var int
     */
    protected $queue_id = 0;

    /**
     * @var int
     */
    protected $technician_id = 0;

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
    protected $status = 'nullable';

    /**
     * @var string
     */
    protected $message = '';

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

    /**
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queue_id;
    }

    /**
     * @return int
     */
    public function getTechnicianId(): int
    {
        return $this->technician_id;
    }
}
