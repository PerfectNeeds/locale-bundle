<?php

namespace PNLocaleBundle\Model;

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
     * @param \PNLocaleBundle\Entity\Language $language
     *
     * @return BloggerTranslation
     */
    public function setLanguage(\VM5\EntityTranslationsBundle\Model\Language $language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \PNLocaleBundle\Entity\Language
     */
    public function getLanguage() {
        return $this->language;
    }

}
