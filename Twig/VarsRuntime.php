<?php

namespace PN\LocaleBundle\Twig;

use PN\LocaleBundle\Model\Translatable;
use PN\LocaleBundle\Model\Translation;
use PN\LocaleBundle\Translator;
use Doctrine\ORM\EntityManagerInterface;
use PN\LocaleBundle\Entity\Language;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\RuntimeExtensionInterface;

class VarsRuntime implements RuntimeExtensionInterface
{

    private $em;
    private $translator;

    public function __construct(EntityManagerInterface $em, Translator $translationService)
    {
        $this->em = $em;
        $this->translator = $translationService;
    }

    public function pnLanguages(): array
    {
        return $this->em->getRepository(Language::class)->findAll();
    }

    public function getTranslation(Translatable $translatable, string $locale): ?Translation
    {
        return $this->translator->getTranslation($translatable, $locale);
    }

    public function translate(Translatable $translatable, string $field, string $locale = null): ?string
    {
        return $this->translator->translate($translatable, $field, $locale);
    }
}
