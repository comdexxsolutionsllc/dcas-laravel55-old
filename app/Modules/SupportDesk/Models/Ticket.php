<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use App\User;

class Ticket extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status'
    ];

    /**
     * Is the ticket open?
     *
     * @return bool
     */
    public function isOpen(): bool
    {
        return ($this->status !== 'Closed') ? true : false;
    }

    /**
     * Is the ticket closed?
     *
     * @return bool
     */
    public function isClosed(): bool
    {
        return ($this->status === 'Closed') ? true : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
