<?php

declare(strict_types=1);

/*
 * This file is part of Contao Owl Carousel Bundle.
 *
 * (c) Hamid Abbaszadeh 2023 <abbaszadeh.h@gmail.com>
 * 
 * @license MIT
 */

namespace Respinar\OwlcarouselBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RespinarOwlcarouselExtension extends Extension
{
    /**
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );

        $loader->load('services.yaml');
    }
}
