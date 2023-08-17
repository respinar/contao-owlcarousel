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
namespace Respinar\OwlCarousel\Frontend\Module;

use Respinar\OwlCarousel\Model\OwlCarouselModel;
use Respinar\OwlCarousel\Model\OwlCarouselSlideModel;
use Respinar\OwlCarousel\Frontend\FrontendOwlCarousel;

/**
 * Class ModuleOwlCarousel
 */
class ModuleOwlCarousel extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_owlcarousel';

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
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

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

		$intTotal = OwlCarouselSlideModel::countPublishedByPid($this->owl_carousel);

		if ($intTotal < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['MSC']['owlcarousel_noSlide'];

			return;
		}

		$objOwlCarousel = OwlCarouselModel::findBy('id',$this->owl_carousel);
		$this->Template->setData($objOwlCarousel->row());

		$objSlides = OwlCarouselSlideModel::findPublishedByPid($this->owl_carousel);

		// No items found
		if ($objSlides !== null)
		{
			$OwlCarousel = new FrontendOwlCarousel();

			$OwlCarousel->owl_slide_template = $this->owl_slide_template;
			$OwlCarousel->imgSize = $this->imgSize;

			$this->Template->slides = $OwlCarousel->parseSlides($objSlides);
		}

	}

}
