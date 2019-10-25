<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Form\Type;

use Doctrine\ORM\EntityRepository;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\RouterInterface;

class SeoPageType extends AbstractType
{
    /** @var RouterInterface */
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }
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
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $routes = [];
            foreach ($this->router->getRouteCollection()->all() as $routeName => $route) {
                if (0 === preg_match("#^/admin(.*)|/api(.*)|/_profiler(.*)|/_error(.*)|/_wdt(.*)|/payment(.*)|/sitemap(.*)|/media/cache/(.*)$#i", $route->getPath())) {
                    $routes[$route->getPath()] = $routeName;
                }
            }
            $form->add('route', ChoiceType::class, [
                'label' => 'ipanema_sylius_seo_page_plugin.form.route',
                'required' => false,
                'choices' => $routes,
                'placeholder' => 'ipanema_sylius_seo_page_plugin.form.placeholder',
            ]);
        });
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
