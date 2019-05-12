<?php

namespace PN\LocaleBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\RuntimeExtensionInterface;

class VarsRuntime implements RuntimeExtensionInterface {

    private $container;
    private $em;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->em = $container->get('doctrine')->getManager();
    }

    public function pnLanguages() {
        return $this->em->getRepository('LocaleBundle:Language')->findAll();
    }

}
