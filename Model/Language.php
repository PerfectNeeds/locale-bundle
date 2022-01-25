<?php
declare(strict_types=1);

namespace PN\LocaleBundle\Model;

interface Language
{
    public function getLocale(): string;
}
