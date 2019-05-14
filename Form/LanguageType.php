<?php

namespace PN\LocaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Psr\Container\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\LanguageType as LangType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotEqualTo;

class LanguageType extends AbstractType {

    public function __construct(ContainerInterface $container) {
        $this->defaultLocale = $container->getParameter("locale");
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('locale', LangType::class, [
                    'placeholder' => 'Choose an option',
                    "attr" => [
                        "class" => "select-search"
                    ],
                    'choice_label' => function ($value, $key) {
                        return $key . " ($value)";
                    },
                    'choice_attr' => function($choice, $key, $value) {
                        return ['data-name' => $key];
                    },
                    "constraints" => [
                        new NotEqualTo([
                            "value" => $this->defaultLocale,
                            "message" => 'You should not enter the default language "' . $this->defaultLocale . '"'
                                ])
                    ]
                ])
                ->add('flagAsset')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'PN\LocaleBundle\Entity\Language'
        ));
    }

    public function getBlockPrefix() {
        return 'pn_locale_bundle_language';
    }

}
