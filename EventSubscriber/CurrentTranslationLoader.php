<?php
declare(strict_types=1);

namespace PN\LocaleBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use PN\LocaleBundle\Model\Translatable;
use PN\LocaleBundle\Translator;

class CurrentTranslationLoader implements EventSubscriber
{
    /**
     * @var Translator
     */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::postLoad,
            Events::postPersist,
        ];
    }

    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        if ($entity instanceof Translatable) {
            $this->translator->initializeCurrentTranslation($entity);
        }
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        if ($entity instanceof Translatable) {
            $this->translator->initializeCurrentTranslation($entity);
        }
    }
}
