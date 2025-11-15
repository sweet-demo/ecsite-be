<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPersonalInfo extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birthdate',
        'tel1',
        'tel2',
        'tel3',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
