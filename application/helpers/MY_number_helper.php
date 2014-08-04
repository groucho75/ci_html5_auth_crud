<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Number helper extended
 *
 * @package 	FireTruck
 * @subpackage 	Helper
 * @category 	Number
 * @author 		Eventualo
 */



/**
 * Return a formatted rate (percentage)
 *
 * @access	public
 * @param	mysql date
 * @param	mysql date (today if empty)
 * @return	seconds
 */

if ( ! function_exists('format_perc'))
{
    function format_perc ( $num=0, $tot=0, $dec=0 )
    {
		if ( $tot == 0 || $num == 0 ) return 0;

		$perc = $num / $tot * 100;
		
		return number_format($perc, $dec, '.', '');
	}
}
 

/* EOF */
