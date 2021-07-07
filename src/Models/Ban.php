<?php

namespace Omatamix\LaravelBan\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    /** @var array $casts The attributes that should be cast. */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /** @var array $fillable The attributes that are mass assignable. */
    protected $fillable = [
        'user_id',
        'namespace',
        'reason',
        'expires_at',
    ];

    /**
     * Get the relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo Returns the relation.
     */
    public function bannable()
    {
        return $this->morphTo('relation');
    }
}
