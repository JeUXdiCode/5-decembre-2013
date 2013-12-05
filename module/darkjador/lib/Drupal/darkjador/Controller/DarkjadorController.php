<?php

namespace Drupal\darkjador\Controller;

use Drupal\darkjador\Events\BuildMessageEvent;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class DarkjadorController implements ContainerInjectionInterface
{

    /**
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    protected $eventDispatcher;

    /**
     * __construct
     * @param \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    public function __construct(EventDispatcher $eventDispatcher)
    {

        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @return Drupal\darkjador\Controller\DarkjadorController
     */
    public static function create(ContainerInterface $container)
    {
        return new static($container->get('event_dispatcher'));
    }

    /**
     * @todo Call templating 
     * @return string
     */
    public function getPage()
    {
        $message = '';

        $event = new BuildMessageEvent($message);

        $this->eventDispatcher->dispatch('darkjador.buildMessage', $event);

        $message = $event->getMessage();

        return theme('darkjador_message', array('message' => $message));
    }

}
