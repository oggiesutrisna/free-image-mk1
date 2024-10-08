<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    protected $fillable = [
        'user_id',
        'picture',
        'picture_slug',
        'picture_name',
        'picture_description',
        'picture_category',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
