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
class Language implements \Arxy\EntityTranslationsBundle\Model\Language
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="locale", type="string", length=5, unique=true)
     */
    private $locale;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=45)
     */
    private $title;

    /**
     * @ORM\Column(name="flag_asset", type="string", length=45)
     */
    private $flagAsset;

    public function getId()
    {
        return $this->id;
    }

    public function setLocale(string $locale)
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setFlagAsset(string $flagAsset)
    {
        $this->flagAsset = $flagAsset;

        return $this;
    }

    public function getFlagAsset(): string
    {
        return $this->flagAsset;
    }

}
