<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Channel\Model\ChannelInterface as BaseChannelInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
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
    /** @var string */
    protected $route;
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
     * @return string
     */
    public function getRoute(): ?string
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(?string $route): void
    {
        $this->route = $route;
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
     * {@inheritdoc}
     */
    public function getRobots(): ?string
    {
        return $this->getTranslation()->getRobots();
    }

    /**
     * {@inheritdoc}
     */
    public function setRobots(?string $robots): void
    {
        $this->getTranslation()->setRobots($robots);
    }

    /**
     * {@inheritdoc}
     */
    public function getOgTitle(): ?string
    {
        return $this->getTranslation()->getOgTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setOgTitle(?string $ogTitle): void
    {
        $this->getTranslation()->setOgTitle($ogTitle);
    }

    /**
     * {@inheritdoc}
     */
    public function getOgDescription(): ?string
    {
        return $this->getTranslation()->getOgTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setOgDescription(?string $ogDescription): void
    {
        $this->getTranslation()->setOgDescription($ogDescription);
    }

    /**
     * {@inheritdoc}
     */
    public function getOgImage(): ?string
    {
        return $this->getTranslation()->getOgImage();
    }

    /**
     * {@inheritdoc}
     */
    public function setOgImage(?string $ogImage): void
    {
        $this->getTranslation()->setOgImage($ogImage);
    }

    /**
     * {@inheritdoc}
     */
    public function getOgSitename(): ?string
    {
        return $this->getTranslation()->getOgSitename();
    }

    /**
     * {@inheritdoc}
     */
    public function setOgSitename(?string $ogSitename): void
    {
        $this->getTranslation()->setOgSitename($ogSitename);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterTitle(): ?string
    {
        return $this->getTranslation()->getTwitterTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterTitle(?string $twitterTitle): void
    {
        $this->getTranslation()->setTwitterTitle($twitterTitle);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterDescription(): ?string
    {
        return $this->getTranslation()->getTwitterDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterDescription(?string $twitterDescription): void
    {
        $this->getTranslation()->setTwitterDescription($twitterDescription);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterImage(): ?string
    {
        return $this->getTranslation()->getTwitterImage();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterImage(?string $twitterImage): void
    {
        $this->getTranslation()->setTwitterImage($twitterImage);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterCard(): ?string
    {
        return $this->getTranslation()->getTwitterCard();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterCard(?string $twitterCard): void
    {
        $this->getTranslation()->setTwitterCard($twitterCard);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterImageAlt(): ?string
    {
        return $this->getTranslation()->getTwitterImageAlt();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterImageAlt(?string $twitterImageAlt): void
    {
        $this->getTranslation()->setTwitterImageAlt($twitterImageAlt);
    }

    /**
     * {@inheritdoc}
     */
    public function getTwitterSite(): ?string
    {
        return $this->getTranslation()->getTwitterSite();
    }

    /**
     * {@inheritdoc}
     */
    public function setTwitterSite(?string $twitterSite): void
    {
        $this->getTranslation()->setTwitterSite($twitterSite);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtraTags(): ?string
    {
        return $this->getTranslation()->getExtraTags();
    }

    /**
     * {@inheritdoc}
     */
    public function setExtraTags(?string $extraTags): void
    {
        $this->getTranslation()->setExtraTags($extraTags);
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
