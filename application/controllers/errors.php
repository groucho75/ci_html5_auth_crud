<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Errors extends MY_Controller {
		
		
	/**
	 * 404 - Not found page
	 */
    public function not_found()
	{	
		$data['page_title']	= '404!';
		$data['message'] 	= $this->lang->line('custom_not_found');
		
		$this->_make_layout('message', $data);		
	}
	
		
}


/* EOF */
