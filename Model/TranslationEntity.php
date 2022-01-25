<?php

namespace PN\LocaleBundle\Model;

use PN\LocaleBundle\Model\Language;

abstract class TranslationEntity
{

    public function setTranslatable($translatable = null)
    {
        $this->translatable = $translatable;

        return $this;
    }

    public function getTranslatable()
    {
        return $this->translatable;
    }

    public function setLanguage(Language $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

}
