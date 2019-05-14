<?php

namespace PN\LocaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Language
 *
 * @UniqueEntity("locale")
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="PN\LocaleBundle\Repository\LanguageRepository")
 */
class Language implements \VM5\EntityTranslationsBundle\Model\Language {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="locale", type="string", length=5, unique=true)
     */
    private $locale;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=45)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="flag_asset", type="string", length=45)
     */
    private $flagAsset;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return Language
     */
    public function setLocale($locale) {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Language
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set flagAsset
     *
     * @param string $flagAsset
     *
     * @return Language
     */
    public function setFlagAsset($flagAsset) {
        $this->flagAsset = $flagAsset;

        return $this;
    }

    /**
     * Get flagAsset
     *
     * @return string
     */
    public function getFlagAsset() {
        return $this->flagAsset;
    }

}
