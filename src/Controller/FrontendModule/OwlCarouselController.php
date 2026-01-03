<?php

declare(strict_types=1);

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\OwlCarouselBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\ModuleModel;
use Contao\Template;
use Respinar\OwlCarouselBundle\OwlCarouselRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule('owlcarousel', category: 'application', template: 'mod_owlcarousel')]
class OwlCarouselController extends AbstractFrontendModuleController
{
    public function __construct(private readonly OwlCarouselRenderer $renderer)
    {
    }

    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $this->renderer->render($template, $model, 'mod-owlcarousel');

        return $template->getResponse();
    }
}
