<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity\Traits;

trait MetaTagsTrait
{
    /** @var string|null */
    protected $robots;
    /**
     * @var string|null
     */
    protected $ogTitle;
    /**
     * @var string|null
     */
    protected $ogDescription;
    /**
     * @var string|null
     */
    protected $ogImage;
    /**
     * @var string|null
     */
    protected $ogSitename;
    /**
     * @var string|null
     */
    protected $twitterTitle;
    /**
     * @var string|null
     */
    protected $twitterDescription;
    /**
     * @var string|null
     */
    protected $twitterImage;
    /**
     * @var string|null
     */
    protected $twitterCard;
    /**
     * @var string|null
     */
    protected $twitterImageAlt;
    /**
     * @var string|null
     */
    protected $twitterSite;
    /**
     * @var string|null
     */
    protected $extraTags;

    public function getRobots(): ?string
    {
        return $this->robots;
    }

    public function setRobots(?string $robots): void
    {
        $this->robots = $robots;
    }

    public function getOgTitle(): ?string
    {
        return $this->ogTitle;
    }

    public function setOgTitle(?string $ogTitle): void
    {
        $this->ogTitle = $ogTitle;
    }

    public function getOgDescription(): ?string
    {
        return $this->ogDescription;
    }

    public function setOgDescription(?string $ogDescription): void
    {
        $this->ogDescription = $ogDescription;
    }

    public function getOgImage(): ?string
    {
        return $this->ogImage;
    }

    public function setOgImage(?string $ogImage): void
    {
        $this->ogImage = $ogImage;
    }

    public function getOgSitename(): ?string
    {
        return $this->ogSitename;
    }

    public function setOgSitename(?string $ogSitename): void
    {
        $this->ogSitename = $ogSitename;
    }

    public function getTwitterTitle(): ?string
    {
        return $this->twitterTitle;
    }

    public function setTwitterTitle(?string $twitterTitle): void
    {
        $this->ogTitle = $ogTitle;
    }

    public function getTwitterDescription(): ?string
    {
        return $this->twitterDescription;
    }

    public function setTwitterDescription(?string $twitterDescription): void
    {
        $this->twitterDescription = $twitterDescription;
    }

    public function getTwitterImage(): ?string
    {
        return $this->twitterImage;
    }

    public function setTwitterImage(?string $twitterImage): void
    {
        $this->twitterImage = $twitterImage;
    }

    public function getTwitterCard(): ?string
    {
        return $this->twitterCard;
    }

    public function setTwitterCard(?string $twitterCard): void
    {
        $this->twitterCard = $twitterCard;
    }

    public function getTwitterImageAlt(): ?string
    {
        return $this->twitterImageAlt;
    }

    public function setTwitterImageAlt(?string $twitterImageAlt): void
    {
        $this->twitterImageAlt = $twitterImageAlt;
    }

    public function getTwitterSite(): ?string
    {
        return $this->twitterSite;
    }

    public function setTwitterSite(?string $twitterSite): void
    {
        $this->twitterSite = $twitterSite;
    }

    public function getExtraTags(): ?string
    {
        return $this->extraTags;
    }

    public function setExtraTags(?string $extraTags): void
    {
        $this->extraTags= $extraTags;
    }
}
