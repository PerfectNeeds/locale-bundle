<?php
declare(strict_types=1);

namespace PN\LocaleBundle\Model;

interface Translation
{
    public function getLanguage(): Language;
}
