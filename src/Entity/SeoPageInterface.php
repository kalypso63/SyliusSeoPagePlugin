<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity;

use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Interface SeoPageInterface.
 */
interface SeoPageInterface extends ResourceInterface, CodeAwareInterface, ToggleableInterface, TranslatableInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string|null $metaDescription
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getRoute(): ?string;

    /**
     * @param string|null $route
     */
    public function setRoute(?string $route): void;

    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string;

    /**
     * @param string|null $metaDescription
     */
    public function setMetaDescription(?string $metaDescription): void;

    /**
     * @return string|null
     */
    public function getMetaKeywords(): ?string;

    /**
     * @param string|null $metaKeywords
     */
    public function setMetaKeywords(?string $metaKeywords): void;

    /**
     * @return string|null
     */
    public function getRobots(): ?string;

    /**
     * @param string|null $robots
     */
    public function setRobots(?string $robots): void;

    /**
     * @return string|null
     */
    public function getOgTitle(): ?string;

    /**
     * @param string|null $ogTitle
     */
    public function setOgTitle(?string $ogTitle): void;

    /**
     * @return string|null
     */
    public function getOgDescription(): ?string;

    /**
     * @param string|null $ogDescription
     */
    public function setOgDescription(?string $ogDescription): void;

    /**
     * @return string|null
     */
    public function getOgImage(): ?string;

    /**
     * @param string|null $ogImage
     */
    public function setOgImage(?string $ogImage): void;

    /**
     * @return string|null
     */
    public function getOgSitename(): ?string;

    /**
     * @param string|null $ogSitename
     */
    public function setOgSitename(?string $ogSitename): void;

    /**
     * @return string|null
     */
    public function getTwitterTitle(): ?string;

    /**
     * @param string|null $twitterTitle
     */
    public function setTwitterTitle(?string $twitterTitle): void;

    /**
     * @return string|null
     */
    public function getTwitterDescription(): ?string;

    /**
     * @param string|null $twitterDescription
     */
    public function setTwitterDescription(?string $twitterDescription): void;

    /**
     * @return string|null
     */
    public function getTwitterImage(): ?string;

    /**
     * @param string|null $twitterImage
     */
    public function setTwitterImage(?string $twitterImage): void;

    /**
     * @return string|null
     */
    public function getTwitterCard(): ?string;

    /**
     * @param string|null $twitterCard
     */
    public function setTwitterCard(?string $twitterCard): void;

    /**
     * @return string|null
     */
    public function getTwitterImageAlt(): ?string;

    /**
     * @param string|null $twitterImageAlt
     */
    public function setTwitterImageAlt(?string $twitterImageAlt): void;

    /**
     * @return string|null
     */
    public function getTwitterSite(): ?string;

    /**
     * @param string|null $twitterSite
     */
    public function setTwitterSite(?string $twitterSite): void;

    /**
     * @return string|null
     */
    public function getExtratags(): ?string;

    /**
     * @param string|null $extraTags
     */
    public function setExtraTags(?string $extraTags): void;

    /**
     * @param string|null $locale
     *
     * @return SeoPageTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface;
}
