<?php

namespace Oxuwazet\Laravel\Ban;

trait Bannable
{
    /**
     * Can this user be ip banned.
     *
     * @return bool Returns true or false.
     */
    public function ipBannable()
    {
        return true;
    }

    /**
     * Can this user ip ban.
     *
     * @return bool Returns true or false.
     */
    public function canIpBan()
    {
        return true;
    }

    /**
     * Can this user be banned.
     *
     * @return bool Returns true or false.
     */
    public function bannable()
    {
        return true;
    }

    /**
     * Can this user ban.
     *
     * @return bool Returns true or false.
     */
    public function canBan()
    {
        return true;
    }
}
