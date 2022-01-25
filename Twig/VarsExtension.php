<?php

namespace PN\LocaleBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

class VarsExtension extends AbstractExtension implements ExtensionInterface
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pnLanguages', [VarsRuntime::class, 'pnLanguages']),
        ];
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('translation', [VarsRuntime::class, 'getTranslation']),
            new TwigFilter('translate', [VarsRuntime::class, 'translate']),
        ];
    }

    public function getName(): string
    {
        return 'locale.twig.extension';
    }

}
