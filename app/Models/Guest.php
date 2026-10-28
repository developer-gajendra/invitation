<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    protected $fillable = [
        'invitation_id',
        'name',
        'phone',
        'email',
        'group_name',
        'side',
        'guest_count',
        'personalized_slug',
        'status',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function rsvp(): HasOne
    {
        return $this->hasOne(GuestRsvp::class);
    }

    public function eventRsvps(): HasMany
    {
        return $this->hasMany(GuestEventRsvp::class);
    }
}