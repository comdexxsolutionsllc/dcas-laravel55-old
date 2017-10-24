<?php

namespace Modules\SupportDesk\Models;

use App\Model;
use App\User;

class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'user_id', 'comment'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
