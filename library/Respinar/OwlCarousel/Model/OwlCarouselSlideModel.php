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
namespace Respinar\OwlCarousel\Model;

/**
 * Class OwlCarouselSlideModel
 */
class OwlCarouselSlideModel extends \Model
{

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $strTable = 'tl_owlcarousel_slide';

	/**
	 * Find published OwlCarousel items by their parent ID
	 *
	 * @param array   $intPids     An integer of OwlCarousel ID
	 * @param array   $arrOptions  An optional options array
	 *
	 * @return \Model\Collection|null A collection of models or null if there are no OwlCarousel
	 */
	public static function findPublishedByPid($intPid, array $arrOptions=array())
	{
		if (!isset($intPid))
		{
			return null;
		}

		$t = static::$strTable;
		$arrColumns = array("$t.pid=?");

		// Never return unpublished elements in the back end, so they don't end up in the RSS feed
		if (!BE_USER_LOGGED_IN || TL_MODE == 'BE')
		{
			$time = time();
			$arrColumns[] = "($t.start='' OR $t.start<$time) AND ($t.stop='' OR $t.stop>$time) AND $t.published=1";
		}

		if (!isset($arrOptions['order']))
		{
			$arrOptions['order']  = "$t.sorting";
		}

		return static::findBy($arrColumns, $intPid, $arrOptions);
	}


	/**
	 * Count published OwlCarousel items by their parent ID
	 *
	 * @param array   $intPid     An array of OwlCarousel ID
	 * @param array   $arrOptions  An optional options array
	 *
	 * @return integer The number of OwlCarousel items
	 */
	public static function countPublishedByPid($intPid, array $arrOptions=array())
	{
		if (!isset($intPid))
		{
			return 0;
		}

		$t = static::$strTable;
		$arrColumns = array("$t.pid=?");

		if (!BE_USER_LOGGED_IN)
		{
			$time = time();
			$arrColumns[] = "($t.start='' OR $t.start<$time) AND ($t.stop='' OR $t.stop>$time) AND $t.published=1";
		}

		return static::countBy($arrColumns, $intPid, $arrOptions);
	}

}
