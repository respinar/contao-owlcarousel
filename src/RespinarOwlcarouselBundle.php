<?php

declare(strict_types=1);

/*
 * This file is part of Contao Owl Carousel Bundle.
 *
 * (c) Hamid Abbaszadeh 2023 <abbaszadeh.h@gmail.com>
 * 
 * @license MIT
 */

namespace Respinar\OwlcarouselBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RespinarOwlcarouselBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
