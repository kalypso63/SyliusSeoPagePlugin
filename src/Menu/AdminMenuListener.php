<?php

/*
 * This file is part of the Symfony package.
 * (c) Ipanema <code@groupe-ipanema.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ipanema\SyliusSeoPagePlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('seopage')
            ->setLabel('ipanema_sylius_seo_page_plugin.admin.menu.header')
        ;
        $newSubmenu
            ->addChild('seo', ['route' => 'ipanema_sylius_seo_page_plugin_admin_seopage_index'])
            ->setLabel('ipanema_sylius_seo_page_plugin.admin.menu.list')
            ->setLabelAttribute('icon', 'icon clipboard list')
        ;
    }
}
