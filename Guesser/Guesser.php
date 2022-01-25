<?php
declare(strict_types=1);

namespace PN\LocaleBundle\Guesser;


interface Guesser
{
    public function guessLocale(): ?string;

    public function guessFallbackLocales(): ?array;
}
