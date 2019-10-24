<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Form\Type;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeoPageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $seopage = $builder->getData();
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'sylius.form.attribute.name',
            ])
            ->add('code', TextType::class, [
                'label' => 'ipanema_sylius_seo_page_plugin.form.code',
                'disabled' => null !== $seopage->getCode(),
            ])
            ->add('enabled', CheckboxType::class, [
                'required' => false,
            ])
            ->add('channels', ChannelChoiceType::class, [
                'label' => 'ipanema_sylius_seo_page_plugin.form.channels',
                'required' => false,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => SeoPageTranslationType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Ipanema\SyliusSeoPagePlugin\Entity\SeoPage',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ipanema_sylius_seo_page_form_type';
    }
}
