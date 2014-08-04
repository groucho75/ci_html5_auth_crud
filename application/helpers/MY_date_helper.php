<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Date helper extended
 *
 * @package 	FireTruck
 * @subpackage 	Helper
 * @category 	Date
 * @author 		Eventualo
 */


/**
 * Timespan about
 *
 * Returns a span of seconds in a concise format:
 *	10 days
 *
 * Different for standard 'timespan' that returns a full format like:
 *	10 days 14 hours 36 minutes 47 seconds
 *
 * @access	public
 * @param	integer	a number of seconds
 * @param	integer	Unix timestamp
 * @return	str
 */
if ( ! function_exists('timespan_about'))
{
	function timespan_about($seconds = 1, $time = '')
	{
		$full_timespan = timespan($seconds, $time);
		$blocks = explode( ',', $full_timespan );
		return strtolower( $blocks[0] );
	}
}


/**
 * Calculate time difference (seconds) betwwen two mysql date
 *
 * Usage:
 *	echo timediff( "2002-04-16 10:00:00", "2002-03-15 09:30:00" );
 *
 * @access	public
 * @param	mysql date
 * @param	mysql date (today if empty)
 * @return	seconds
 */

if ( ! function_exists('timediff'))
{
	function timediff( $last_time, $first_time=false )
	{
		// convert to unix timestamps
		$last_time	=	mysql_to_unix( $last_time ); 
		
		if ( $first_time )
		{
			$first_time	= mysql_to_unix( $first_time );
		}
		else
		{
			$first_time	= now(); // default now
		}

		// perform subtraction to get the difference (in seconds) between times
		$time_diff	=	$last_time - $first_time;

		// return the difference
		return $time_diff;
	}
}
 

/* EOF */
