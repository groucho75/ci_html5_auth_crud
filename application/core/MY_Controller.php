<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Extend the CI Controller
 */

 
class MY_Controller extends CI_Controller {

	// Array of vars prepared to be sent to all view files
	var $for_views	= array();
	
	
    function __construct()
    {
        parent::__construct();

        		
		// If empty set the base url
		$base_url = $this->config->item('base_url');
		if ( empty($base_url) )
		{
			$site_url = ( (isset($_SERVER['HTTPS']) ) ? "https" : "http");
			$site_url .= "://".$_SERVER['HTTP_HOST'];
			$site_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
			
			$this->config->set_item('base_url', $site_url);
			$base_url = $site_url;
		}
		
		$domain_url = str_replace( array("https://", "http://", "www."), '', $base_url );
		$domain_url = trim($domain_url, './' );
		
		// Prepare common data for views
		$this->for_views = array(
			'site_title'	=> $this->config->item('custom_sitetitle'),
			'meta_desc'		=> $this->config->item('custom_metadesc'),
			'meta_keywords'	=> $this->config->item('custom_metakeywords'),
			'page_title'	=> $this->config->item('custom_sitetitle'),
			'domain_url'	=> $domain_url,
		);		
		
		if ($this->ion_auth->logged_in())
		{
			$this->for_views['user'] = $this->ion_auth->user()->row();
		}
		else
		{
			$this->for_views['user'] = FALSE;
		}
    }

	/**
	 * Easy way to build a "layout" using more views.
	 * 
	 * @param view		the name of view file	
	 * @param data		array data sent to views
	 */ 
	public function _make_layout( $view='', $data=array(), $render=true )
	{
		$data_for_views = array_merge( $this->for_views, $data );

		if ( @file_exists(APPPATH.'views/' .$view.'.php') )
		{	
			$view_html = $this->load->view( $view, $data_for_views, false );
			
			if ( $render ) 
			{
				echo $view_html;
			}
			else
			{
				return $view_html;
			}
		}
					
	}
	
}


/* EOF */
