<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity;

use Ipanema\SyliusSeoPagePlugin\Entity\SeoPageTranslationInterface;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * Class SeoPageTranslation.
 */
class SeoPageTranslation extends AbstractTranslation implements SeoPageTranslationInterface
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $metaDescription;
    /** @var string */
    protected $metaKeywords;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getMetaDescription();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     */
    public function setMetaDescription(?string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return string
     */
    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     */
    public function setMetaKeywords(?string $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

}
