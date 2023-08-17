<?php

declare(strict_types=1);

/*
 * This file is part of Contao Owl Carousel Bundle.
 *
 * (c) Hamid Abbaszadeh 2023 <abbaszadeh.h@gmail.com>
 * 
 * @license MIT
 */

namespace Respinar\OwlcarouselBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Respinar\OwlcarouselBundle\RespinarOwlcarouselBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(RespinarOwlcarouselBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
