<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Interface SeoPageTranslationInterface
 */
interface SeoPageTranslationInterface extends ResourceInterface, TranslationInterface
{
    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string;

    /**
     * @param string|null $name
     */
    public function setMetaDescription(?string $name): void;

    public function getMetaKeywords(): ?string;

    public function setMetaKeywords(?string $address): void;
}
