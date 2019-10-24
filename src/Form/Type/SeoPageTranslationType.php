<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Form\Type;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class SeoPageTranslationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('metaDescription', TextareaType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.meta_description',
            ])
            ->add('metaKeywords', TextareaType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.meta_keywords',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Ipanema\SyliusSeoPagePlugin\Entity\SeoPageTranslation',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ipanema_sylius_seo_page_translation_form_type';
    }
}
