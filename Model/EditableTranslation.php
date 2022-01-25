<?php
declare(strict_types=1);

namespace PN\LocaleBundle\Model;

interface EditableTranslation extends Translation
{
    public function setLanguage(Language $language): void;
}
