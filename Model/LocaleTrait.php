<?php

namespace PN\LocaleBundle\Model;

use Arxy\EntityTranslationsBundle\Model\Translation;

trait LocaleTrait
{

    protected $currentTranslation;

    /**
     * This method is used by bundle to inject current translation.
     */
    public function setCurrentTranslation(?Translation $translation = null):void
    {
        $this->currentTranslation = $translation;
    }

    /**
     * Add translation
     *
     * @param \PN\Bundle\CMSBundle\Entity\Translation\BloggerTranslation $translation
     *
     * @return Blogger
     */
    public function addTranslation(TranslationEntity $translation)
    {
        if (!$this->translations instanceof \Doctrine\ORM\PersistentCollection AND !$this->translations instanceof \Doctrine\Common\Collections\ArrayCollection) {
            throw new \Exception('Error: Add $this->translations = new \Doctrine\Common\Collections\ArrayCollection() to '.__CLASS__.'::__construct() method');
        }
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setTranslatable($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param \PN\Bundle\CMSBundle\Entity\Translation\BloggerTranslation $translation
     */
    public function removeTranslation(TranslationEntity $translation)
    {
        if (!$this->translations instanceof \Doctrine\ORM\PersistentCollection AND !$this->translations instanceof \Doctrine\Common\Collections\ArrayCollection) {
            throw new \Exception('Error: Add $this->translations = new \Doctrine\Common\Collections\ArrayCollection() to '.__CLASS__.'::__construct() method');
        }
        $this->translations->removeElement($translation);
        $translation->setTranslatable(null);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

}
