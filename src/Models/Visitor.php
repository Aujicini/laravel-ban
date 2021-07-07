<?php

namespace Omatamix\LaravelBan\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /** @var array $casts The attributes that should be cast. */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /** @var array $fillable The attributes that are mass assignable. */
    protected $fillable = [
        'visitor',
        'expires_at',
    ];

    /** @var string $table The table associated with the model. */
    protected $table = 'blacklists';
}
