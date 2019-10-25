<?php

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
     * @param string|null $locale
     *
     * @return SeoPageTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface;
}
