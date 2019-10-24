<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Channel\Model\ChannelInterface as BaseChannelInterface;

use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Class SeoPage.
 */
class SeoPage implements SeoPageInterface
{
    use ToggleableTrait;
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    /** @var int */
    protected $id;
    /** @var string */
    protected $code;
    /** @var string */
    protected $name;
    /** @var Collection|ChannelInterface[] */
    protected $channels;

    /**
     * Distributor constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->channels = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $code
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannels(): Collection
    {
        return $this->channels;
    }

    /**
     * {@inheritdoc}
     */
    public function addChannel(BaseChannelInterface $channel): void
    {
        if (!$this->hasChannel($channel)) {
            $this->channels->add($channel);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeChannel(BaseChannelInterface $channel): void
    {
        if ($this->hasChannel($channel)) {
            $this->channels->removeElement($channel);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hasChannel(BaseChannelInterface $channel): bool
    {
        return $this->channels->contains($channel);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaDescription(): ?string
    {
        return $this->getTranslation()->getMetaDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaDescription(?string $metaDescription): void
    {
        $this->getTranslation()->setMetaDescription($metaDescription);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaKeywords(): ?string
    {
        return $this->getTranslation()->getMetaKeywords();
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaKeywords(?string $metaKeywords): void
    {
        $this->getTranslation()->setMetaDescription($metaKeywords);
    }

    /**
     * @param string|null $locale
     *
     * @return DistributorTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface
    {
        /** @var DistributorTranslationInterface $translation */
        $translation = $this->doGetTranslation($locale);

        return $translation;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): SeoPageTranslationInterface
    {
        return new SeoPageTranslation();
    }
}
