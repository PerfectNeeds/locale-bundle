<?php

namespace PN\LocaleBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PN\LocaleBundle\Repository\LanguageRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use PN\LocaleBundle\Model\Language as LanguageInterface;
/**
 * Language
 *
 * @UniqueEntity("locale")
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="PN\LocaleBundle\Repository\LanguageRepository")
 */
#[UniqueEntity("locale")]
#[ORM\Table(name: "language")]
#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language implements LanguageInterface
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    #[ORM\Id]
    #[ORM\Column(name: "id", type: Types::INTEGER)]
    #[ORM\GeneratedValue]
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="locale", type="string", length=5, unique=true)
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: "locale", type: Types::STRING, length: 5, unique: true)]
    private $locale;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=45)
     */
    #[Assert\NotBlank]
    #[ORM\Column(name: "title", type: Types::STRING, length: 45)]
    private $title;

    /**
     * @ORM\Column(name="flag_asset", type="string", length=45)
     */
    #[ORM\Column(name: "flag_asset", type: Types::STRING, length: 45)]
    private $flagAsset;

    public function getId()
    {
        return $this->id;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setFlagAsset(string $flagAsset): self
    {
        $this->flagAsset = $flagAsset;

        return $this;
    }

    public function getFlagAsset(): string
    {
        return $this->flagAsset;
    }

}