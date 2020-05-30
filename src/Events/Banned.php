<?php

namespace Oxuwazet\Laravel\Ban\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Banned
{
    use Dispatchable, SerializesModels;

    /** @var mixed $user The user that was banned. */
    public $user;

    /** @var array $data The ban data associated. */
    public $data;

    /**
     * Create a new banned event.
     *
     * @param mixed $user The user that was banned.
     * @param array $data The ban data associated.
     *
     * @return void Returns nothing.
     */
    public function __construct($user, $data = [])
    {
        $this->user = $user;
        $this->data = $data;
    }
}
