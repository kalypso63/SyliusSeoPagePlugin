<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace Ipanema\SyliusSeoPagePlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Ipanema\SyliusSeoPagePlugin\Entity\SeoPageInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class SeoPageRepository extends EntityRepository
{
    public function createListQueryBuilder(string $localeCode): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->leftJoin('o.translations', 'translation', 'WITH', 'translation.locale = :localeCode')
            ->setParameter('localeCode', $localeCode)
        ;
    }

    public function findEnabledByCode(string $code, string $channelCode): ?SeoPageInterface
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.channels', 'channel')
            ->where('o.code = :code')
            ->andWhere('o.enabled = true')
            ->andWhere('channel.code = :channelCode')
            ->setParameter('code', $code)
            ->setParameter('channelCode', $channelCode)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findEnabledByRoute(string $route, string $channelCode): ?SeoPageInterface
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.channels', 'channel')
            ->where('o.route = :route')
            ->andWhere('o.enabled = true')
            ->andWhere('channel.code = :channelCode')
            ->setParameter('route', $route)
            ->setParameter('channelCode', $channelCode)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
