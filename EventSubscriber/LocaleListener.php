<?php
declare(strict_types=1);

namespace PN\LocaleBundle\EventSubscriber;

use PN\LocaleBundle\Guesser\GuesserLoader;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LocaleListener implements EventSubscriberInterface
{
    /**
     * @var GuesserLoader
     */
    private $guessLoader;

    public function __construct(GuesserLoader $guessLoader)
    {
        $this->guessLoader = $guessLoader;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $this->guessLoader->load();
    }
}
