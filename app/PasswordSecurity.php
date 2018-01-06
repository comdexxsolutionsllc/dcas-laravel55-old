<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PasswordSecurity extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
