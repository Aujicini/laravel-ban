<?php

namespace Omatamix\LaravelBan\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Omatamix\LaravelBan\Models\Ban;
use Omatamix\LaravelBan\Models\Visitor;

trait Bannable
{
    /**
     * Preform a regular user ban.
     *
     * @param array $banData A list of data assigned to the ban.
     *
     * @return void Returns nothing.
     */
    public function ban(array $banData = [
        'user_id'   => $this->id,
        'issued_by' => Auth::id(),
    ]) {
        if (Auth::user()->canBan()) {
            if ($this->canBeBanned()) {
                if (!$this->isBanned()) {
                    Ban::create($banData);
                }
            }
        }
    }

    /**
     * Can this user ban another user.
     *
     * @return bool Returns true or false.
     */
    public function canBan()
    {
        return true;
    }

    /**
     * Can this user be banned.
     *
     * @return bool Returns true or false.
     */
    public function canBeBanned()
    {
        return true;
    }

    /**
     * Can this user be ip banned.
     *
     * @return bool Returns true or false.
     */
    public function canBeIpBanned()
    {
        return true;
    }

    /**
     * Can this user ip ban another user.
     *
     * @return bool Returns true or false.
     */
    public function canIpBan()
    {
        return true;
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
     * Get the users ban.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne Returns the relationship.
     */
    public function relation()
    {
        return $this->morphOne(Ban::class, 'bannable');
    }
}
