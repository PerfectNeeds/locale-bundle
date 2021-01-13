<?php

namespace PN\LocaleBundle\Model;

abstract class TranslationEntity {

    /**
     * Set translatable
     */
    public function setTranslatable($translatable = null) {
        $this->translatable = $translatable;

        return $this;
    }

    /**
     * Get translatable
     */
    public function getTranslatable() {
        return $this->translatable;
    }

    /**
     * Set language
     *
     * @param \PN\LocaleBundle\Entity\Language $language
     *
     * @return BloggerTranslation
     */
    public function setLanguage(\Arxy\EntityTranslationsBundle\Model\Language $language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \PN\LocaleBundle\Entity\Language
     */
    public function getLanguage() {
        return $this->language;
    }

}
