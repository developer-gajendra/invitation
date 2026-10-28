<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invitation extends Model
{
    protected $fillable = [
        'user_id',
        'invitation_template_id ',
        'slug',
        'title',
        'person1_name',
        'person2_name',
        'person2_name',
        'person1_photo',
        'person2_photo',
        'description',
        'invitation_date',
        'status',
        'music_enabled',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(InvitationTemplate::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(InvitationEvent::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(InvitationPhoto::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(GuestRsvp::class);
    }




    /*$invitation->template->name;

    $invitation->template->invitationType->title;


    $invitation->events;

    $invitation->photos;

    $invitation->guests;

    $invitation->guests->first()->rsvp;

    $invitation->guests->first()->eventRsvps;*/


}