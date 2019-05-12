<?php

namespace PN\LocaleBundle\Twig;

use PN\LocaleBundle\Twig\VarsRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VarsExtension extends AbstractExtension {

    public function getFunctions() {
        return array(
            new TwigFunction('pnLanguages', array(VarsRuntime::class, 'pnLanguages')),
        );
    }

    public function getName() {
        return 'locale.twig.extension';
    }

}
