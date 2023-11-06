<?php

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid@respinar.com>
 *
 * @license MIT
 */


/**
 * Namespace
 */
namespace Respinar\OwlcarouselBundle\Helper;

use Contao\FrontendTemplate;
use Contao\ContentModel;
use Contao\StringUtil;
use Contao\Controller;
use Contao\System;


/**
 * Class OwlCarousel
 */
class Owlcarousel
{

	static public function parseSlides($objSlides, $model)
	{
		if ($objSlides->count() < 1)
		{
			return array();
		}

		$arrSlides = array();

		foreach($objSlides as $objSlide)
		{
			$arrSlides[] = Owlcarousel::parseSlide($objSlide, $model);
		}

		return $arrSlides;
	}


	static public function parseSlide($objSlide, $model)
	{

		$objTemplate = new FrontendTemplate($model->owl_slide_template);

		$objTemplate->setData($objSlide->row());

		$objTemplate->addImage = false;

		// Add an image
		if ($objSlide->singleSRC != '')
		{
			$imgSize = null;

			if ($model->imgSize)
			{
				$size = StringUtil::deserialize($model->imgSize);

				if ($size[0] > 0 || $size[1] > 0 || is_numeric($size[2]) || ($size[2][0] ?? null) === '_')
				{
					$imgSize = $model->imgSize;
				}
			}

			$figureBuilder = System::getContainer()
				->get('contao.image.studio')
				->createFigureBuilder()
				->from($objSlide->singleSRC)
				->setSize($imgSize);

			if (null !== ($figure = $figureBuilder->buildIfResourceExists()))
			{
				$figure->applyLegacyTemplateData($objTemplate);
			}
		}

		$objElement = ContentModel::findPublishedByPidAndTable($objSlide->id, 'tl_owlcarousel_slide');

		if ($objElement !== null)
		{
			while ($objElement->next())
			{
				$objTemplate->text .= Controller::getContentElement($objElement->current());
			}
		}

		$objTemplate->hrefclass = $objSlide->class;

		return $objTemplate->parse();

	}

}
