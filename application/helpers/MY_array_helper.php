<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * FireeTruck Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/array_helper.html
 */



/**
 * Merges two arrays and replace existing Entrys
 *
 * Merges two Array like the PHP Function array_merge_recursive.
 * The main difference is that existing Keys will be replaced with new Values,
 * not combined in a new Sub Array.
 *
 * Usage:
 *         $newArray = array_merge_replace( $array, $newValues );
 *
 * @access puplic
 * @author Tobias Tom <t.tom@succont.de>
 * @param array $array First Array with 'replaceable' Values
 * @param array $newValues Array which will be merged into first one
 * @return array Resulting Array from replacing Process
 *
 * http://php.net/manual/en/function.array-merge-recursive.php#38854
 */

if ( ! function_exists('array_merge_replace'))
{
	function array_merge_replace ( $array, $newValues ) 
	{
		foreach ( $newValues as $key => $value ) {
			if ( is_array( $value ) ) {
				if ( !isset( $array[ $key ] ) ) {
					$array[ $key ] = array();
				}
				$array[ $key ] = array_merge_replace( $array[ $key ], $value );
			} else {
				if ( isset( $array[ $key ] ) && is_array( $array[ $key ] ) ) {
					$array[ $key ][ 0 ] = $value;
				} else {
					if ( isset( $array ) && !is_array( $array ) ) {
						$temp = $array;
						$array = array();
						$array[0] = $temp;
					}
					$array[ $key ] = $value;
				}
			}
		}
		return $array;
	}
}


/**
 * Order a multimensional array (or an array of objects) by a certain key.
 * 
 * Usage:
 * 			array_multidim_sort( $array, 'key_name' );
 */

if ( ! function_exists('array_multidim_sort'))
{
	function array_multidim_sort (&$array, $key, $asc=TRUE) 
	{
		/*
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		asort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
		*/
		
		if ( ! function_exists('build_sorter'))
		{
			function build_sorter($key, $asc) {
				return function ($a, $b) use ($key, $asc) {
					if ( is_object($a) && is_object($b) )
					{
						$comparison = strcasecmp($a->$key, $b->$key);
						return ( $asc ) ? $comparison : -1*( $comparison );
					}
					else
					{
						$comparison = strcasecmp($a[$key], $b[$key]);
						return ( $asc ) ? $comparison : -1*( $comparison );
					}
				};
			}
		}
		usort( $array, build_sorter($key, $asc) );
		
	}
}


/**
 * Make a recursive mapping (infact array_map gives error if some array
 * element is array).
 * 
 * @see		http://www.php.net/manual/en/function.array-map.php#107808
 */

if ( ! function_exists('array_map_recursive'))
{
	function array_map_recursive($fn, $arr) {
		$rarr = array();
		foreach ($arr as $k => $v) {
			$rarr[$k] = is_array($v) ? array_map_recursive($fn, $v) : call_user_func($fn, $v);
		}
		return $rarr;
	}	
}


/**
 * This function return array dump 
 * @param array 	the array data
 * @param bol 		return or echo
 * @return string
 */
if ( ! function_exists('array_pre') ) :
function array_pre($data = array(), $return=false) {
	
	$output = '<pre>'. print_r ( (array)$data, true ) .'</pre>';

	if ( $return )
	{
		return $output;
	}
	else
	{
		echo $output;
	}
}
endif;


/* EOF */
