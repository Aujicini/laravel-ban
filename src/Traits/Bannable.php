<?php

namespace Omatamix\LaravelBan\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Omatamix\LaravelBan\Models\Ban;
use Omatamix\LaravelBan\Models\Visitor;

trait Bannable
{
    /**
     * Get the users ban.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne Returns the relationship.
     */
    public function relation()
    {
        return $this->morphOne(Ban::class, 'bannable');
    }

    /**
     * Preform an ip ban.
     *
     * @return void Returns nothing.
     */
    public function ipBan($expires = null)
    {
        if (Auth::user()->canIpBan()) {
            if ($this->canBeIpBanned()) {
                Visitor::create([
                    'visitor'    => Request::ip(),
                    'expires_at' => $expires,
                ]);
            }
        }
    }
}
