<?php

declare(strict_types=1);

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\OwlCarouselBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\ModuleModel;
use Contao\Template;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Respinar\OwlCarouselBundle\OwlCarousel;
use Respinar\OwlCarouselBundle\Model\OwlcarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlcarouselSlideModel;

#[AsFrontendModule(category: 'application', template: 'mod_owlcarousel')]
class OwlCarouselController extends AbstractFrontendModuleController
{
    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {

        $intTotal = OwlcarouselSlideModel::countPublishedByPid($model->owl_carousel);

		if ($intTotal < 1)
		{
			$template->empty = $GLOBALS['TL_LANG']['MSC']['owlcarousel_noSlide'];

			return $template->getResponse();
		}

		$objOwlCarousel = OwlcarouselModel::findBy('id',$model->owl_carousel);
		$template->setData($objOwlCarousel->row());

		$template->navText = json_encode(StringUtil::deserialize($objOwlCarousel->navText));

		$objSlides = OwlcarouselSlideModel::findPublishedByPid($model->owl_carousel);

		// Items found
		if ($objSlides !== null)
		{

			$template->slides = Owlcarousel::parseSlides($objSlides, $model);
		}

		$GLOBALS['TL_BODY'][] = Template::generateScriptTag('bundles/respinarowlcarousel/owl.carousel.min.js', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.carousel.min.css', false, null);
        $GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.theme.default.min.css', false, null);

		if ($objOwlCarousel->animateIn || $objOwlCarousel->animateOut) {
			$GLOBALS['TL_BODY'][] = Template::generateStyleTag('bundles/respinarowlcarousel/animate/animate.min.css', false, null);
		}

        return $template->getResponse();

    }
}
