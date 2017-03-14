<?php

/**
 * Owlcarousel Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */


/**
 * Namespace
 */
namespace Respinar\OwlCarousel;


/**
 * Class ContentOwlCarousel
 */
class ContentOwlCarousel extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_owlcarousel';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['owlcarousel'][0]) . ' ###';

			$objOwlCarousel = \OwlCarouselModel::findBy('id',$this->owl_carousel);

			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->owl_carousel;
			$objTemplate->link = $objOwlCarousel->title;
			$objTemplate->href = 'contao/main.php?do=owlcarousel&amp;table=tl_owlcarousel_slide&amp;id=' . $this->owl_carousel;

			return $objTemplate->parse();
		}

		// No catalog categries available
		if (!isset($this->owl_carousel))
		{
			return '';
		}

		if (TL_MODE == 'FE')
		{
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/owlcarousel/assets/vendor/OwlCarousel2/OwlCarousel2/owl.carousel.min.js|static';
            $GLOBALS['TL_CSS'][] = 'system/modules/owlcarousel/assets/vendor/OwlCarousel2/OwlCarousel2/assets/owl.carousel.min.css|static';
			$GLOBALS['TL_CSS'][] = 'system/modules/owlcarousel/assets/vendor/OwlCarousel2/OwlCarousel2/assets/owl.theme.default.min.css|static';

			if(($this->owl_animateIn || $this->owl_animateOut) && $this->owl_items==1)
			{
				$GLOBALS['TL_CSS'][] = 'system/modules/owlcarousel/assets/vendor/daneden/animate.css/animate.min.css|static';
			}
        }

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

		$intTotal = \OwlCarouselSlideModel::countPublishedByPid($this->owl_carousel);

		if ($intTotal < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['owlcarousel_noSlide'];

			return;
		}

		$objSlides = \OwlCarouselSlideModel::findPublishedByPid($this->owl_carousel);

		// No items found
		if ($objSlides !== null)
		{
			$OwlCarousel = new OwlCarousel();

			$OwlCarousel->owl_slide_template = $this->owl_slide_template;
			$OwlCarousel->imgSize = $this->size;

			$this->Template->slides = $OwlCarousel->parseSlides($objSlides);
		}

	}

}
