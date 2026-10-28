<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestEventRsvp extends Model
{
    protected $fillable = [
        'guest_id',
        'event_id',
        'status',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(
            InvitationEvent::class,
            'event_id'
        );
    }
}