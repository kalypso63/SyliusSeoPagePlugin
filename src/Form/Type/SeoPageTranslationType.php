<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeoPageTranslationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('metaDescription', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.meta_description',
            ])
            ->add('metaKeywords', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.meta_keywords',
            ])
            ->add('robots', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.robots',
            ])
            ->add('ogTitle', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.og_title',
            ])
            ->add('ogDescription', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.og_description',
            ])
            ->add('ogImage', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.og_image',
            ])
            ->add('ogSitename', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.og_sitename',
            ])
            ->add('twitterTitle', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_title',
            ])
            ->add('twitterDescription', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_description',
            ])
            ->add('twitterImage', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_image',
            ])
            ->add('twitterImageAlt', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_image_alt',
            ])
            ->add('twitterCard', ChoiceType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_card',
                'choices' => [
                    'Summary' => 'summary',
                    'Summary large image' => 'summary_large_image',
                    'App' => 'app',
                    'Player' => 'player',
                ],
                'placeholder' => 'ipanema_sylius_seo_page_plugin.form.placeholder',
            ])
            ->add('twitterSite', TextType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.twitter_site',
            ])
            ->add('extraTags', TextareaType::class, [
                'required' => false,
                'label' => 'ipanema_sylius_seo_page_plugin.form.extra_tags',
                'attr' => [
                    'placeholder' => '<meta name="generator" content="Sylius" />'
                ]
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
