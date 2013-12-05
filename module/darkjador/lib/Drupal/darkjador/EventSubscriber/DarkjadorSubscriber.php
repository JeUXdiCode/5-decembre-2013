<?php

namespace Drupal\darkjador\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\darkjador\Events\BuildMessageEvent;

class DarkjadorSubscriber implements EventSubscriberInterface
{

    /**
     * Builds the message
     * @param \Drupal\darkjador\Events\BuildMessageEvent $event
     */
    public function buildMessage(BuildMessageEvent $event)
    {
        $event->setMessage('Hello Dark Jador !');
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        $events['darkjador.buildMessage'][] = array('buildMessage');
        return $events;
    }

}
