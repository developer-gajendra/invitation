<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationTemplate extends Model
{
    protected $fillable = [
        'invitation_type_id',
        'name',
        'slug',
        'thumbnail',
        'view_path',
        'category',
        'is_active',
    ];


    public function invitationType(): BelongsTo
    {
        return $this->belongsTo(InvitationType::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class, 'invitation_template_id');
    }
}