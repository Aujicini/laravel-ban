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
     * @param array $banData A list of data assigned to the ban.
     *
     * @return void Returns nothing.
     */
    public function ipBan(array $banData = [
        'visitor'   => Request::ip(),
        'issued_by' => Auth::id(),
    ]) {
        if (Auth::user()->canIpBan()) {
            if ($this->canBeIpBanned()) {
                if (!$this->isIpBanned()) {
                    Visitor::create($banData);
                }
            }
        }
    }

    /**
     * Preform a regular user ban.
     *
     * @return void Returns nothing.
     */
    public function ban(array $banData = [
        'user_id'   => $this->id,
        'issued_by' => Auth::id(),
    ]) {
        if (Auth::user()->canIpBan()) {
            if ($this->canBeIpBanned()) {
                if (!$this->isBanned()) {
                    Ban::create($banData);
                }
            }
        }
    }
}
