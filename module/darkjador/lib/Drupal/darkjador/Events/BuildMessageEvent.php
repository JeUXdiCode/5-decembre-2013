<?php

namespace Drupal\darkjador\Events;

use Symfony\Component\EventDispatcher\Event;

class BuildMessageEvent extends Event
{

    /**
     * Current event message
     * @var String
     */
    private $message;

    /**
     * __construct
     * @param String $message
     */
    public function __construct($message)
    {
        $this->setMessage($message);
    }

    /**
     * Returns current message
     * @return String
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets current message
     * @param String $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}
