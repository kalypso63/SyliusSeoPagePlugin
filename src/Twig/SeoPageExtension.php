<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Twig;

use Ipanema\SyliusSeoPagePlugin\Repository\SeoPageRepository;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SeoPageExtension extends AbstractExtension
{
    /** @var SeoPageRepository */
    protected $seoPageRepository;

    /** @var ChannelContextInterface */
    private $channelContext;

    public function __construct(SeoPageRepository $seoPageRepository, ChannelContextInterface $channelContext)
    {
        $this->seoPageRepository = $seoPageRepository;
        $this->channelContext = $channelContext;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('seo_page', [$this, 'getSeoPage']),
        ];
    }

    public function getSeoPage($code)
    {
        $channelCode = $this->channelContext->getChannel()->getCode();
        return $this->seoPageRepository->findEnabledByCode($code, $channelCode);
    }
}
