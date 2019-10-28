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
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SeoPageExtension extends AbstractExtension
{
    /** @var SeoPageRepository */
    protected $seoPageRepository;

    /** @var ChannelContextInterface */
    private $channelContext;

    /** @var EngineInterface */
    private $templatingEngine;

    /**
     * SeoPageExtension constructor.
     * @param SeoPageRepository $seoPageRepository
     * @param ChannelContextInterface $channelContext
     * @param EngineInterface $templatingEngine
     */
    public function __construct(SeoPageRepository $seoPageRepository, ChannelContextInterface $channelContext, EngineInterface $templatingEngine)
    {
        $this->seoPageRepository = $seoPageRepository;
        $this->channelContext = $channelContext;
        $this->templatingEngine = $templatingEngine;
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
        if (!empty($params['default']) && $data instanceof SeoPageInterface) {
            //get default data
            $defaultData = $this->seoPageRepository->findEnabledByCode($params['default'], $channelCode);
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
        //return only data
        if (!empty($params['data-only']) && true === $params['data-only']) {
            return $data;
        }

        return $this->templatingEngine->render('@IpanemaSyliusSeoPagePlugin/Shop/_seo.html.twig', [
            'data' => $data,
        ]);
    }
}
