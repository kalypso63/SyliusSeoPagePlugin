<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Twig;

use Ipanema\SyliusSeoPagePlugin\Entity\SeoPageInterface;
use Ipanema\SyliusSeoPagePlugin\Repository\SeoPageRepository;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SeoPageExtension extends AbstractExtension
{
    /** @var SeoPageRepository */
    protected $seoPageRepository;

    /** @var ChannelContextInterface */
    private $channelContext;

    /** @var Environment */
    private $twig;

    /**
     * SeoPageExtension constructor.
     * @param SeoPageRepository $seoPageRepository
     * @param ChannelContextInterface $channelContext
     * @param Environment $twig
     */
    public function __construct(SeoPageRepository $seoPageRepository, ChannelContextInterface $channelContext, Environment $twig)
    {
        $this->seoPageRepository = $seoPageRepository;
        $this->channelContext = $channelContext;
        $this->twig = $twig;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('seo_page', [$this, 'getSeoPage'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param array $params
     *
     * @return SeoPageInterface|string|null
     */
    public function getSeoPage(array $params)
    {
        $channelCode = $this->channelContext->getChannel()->getCode();
        if (!empty($params['code'])) {
            $data = $this->seoPageRepository->findEnabledByCode($params['code'], $channelCode);
        } elseif (!empty($params['route'])) {
            $data = $this->seoPageRepository->findEnabledByRoute($params['route'], $channelCode);
        }
        //get record default if not result
        if (!empty($params['default'])) {
            //get default data
            $defaultData = $this->seoPageRepository->findEnabledByCode($params['default'], $channelCode);
            if (null === $data) {
                $data = $defaultData;
            } else {
                //merge data with default record
                if ($defaultData instanceof SeoPageInterface) {
                    $propertyAccessor = PropertyAccess::createPropertyAccessor();
                    $translation = $data->getTranslation();
                    $reflect = new \ReflectionClass($translation);
                    $properties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);
                    foreach ($properties as $property) {
                        $property->setAccessible(true);
                        if (empty($property->getValue($translation))) {
                            $property->setValue($translation, $propertyAccessor->getValue($defaultData, $property->getName()));
                        }
                    }
                }
            }
        }
        //return only data
        if (!empty($params['data-only']) && true === $params['data-only']) {
            return $data;
        }

        return $this->twig->render('@IpanemaSyliusSeoPagePlugin/Shop/_seo.html.twig', [
            'data' => $data,
        ]);
    }
}
