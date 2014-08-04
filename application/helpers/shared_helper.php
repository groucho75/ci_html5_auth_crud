<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Helper of commomn and shared functions
 * 
 * @author Eventualo
 * @package CodeIgniter
 * 
 */



/**
* XSS mitigation functions
*
* @see https://www.owasp.org/index.php/PHP_Security_Cheat_Sheet
* @param str
* @return str
*/
if ( ! function_exists('xssafe') ) :
function xssafe ( $data, $encoding='UTF-8' )
{
	return htmlspecialchars( $data, ENT_QUOTES | ENT_HTML401, $encoding );
}
endif;

if ( ! function_exists('xecho') ) :
function xecho ( $data )
{
	echo xssafe( $data );
}
endif;



/* EOF */
