<?php

declare(strict_types=1);

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\OwlCarouselBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Template;
use Respinar\OwlCarouselBundle\OwlCarouselRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement('owlcarousel', category: 'media', template: 'ce_owlcarousel')]
class OwlCarouselController extends AbstractContentElementController
{
    public function __construct(private readonly OwlCarouselRenderer $renderer)
    {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $this->renderer->render($template, $model, 'ce-owlcarousel', (string) $model->size);

        return $template->getResponse();
    }
}
