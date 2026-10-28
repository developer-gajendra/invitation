<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationType extends Model
{

    protected $table = [
        'invitation_types',
    ];

    protected $fillable = [
        'title',
    ];

    public function templates(): HasMany
    {
        return $this->hasMany(InvitationTemplate::class);
    }
}