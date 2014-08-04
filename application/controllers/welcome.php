<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Welcome extends MY_Controller {

    /**
     * Remap function
     */
    public function _remap($method, $params = array())
    {
		/*
        // Insert here you method to be filtered/remapped
        if ( $method == 'a_method' )
        {
			
            return call_user_func_array( array($this, $method), $params);
        }
		else */
		
        // Standard method (/contact/index, ...)
        if (method_exists($this, $method))
        {
            return call_user_func_array( array($this, $method), $params);
        }
        else 
        {
            // Error page for missing method
            redirect('errors/not_found');
        }   
    }
    
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['page_title']	= 'Hi there! Welcome in ci_html5_auth_crud';
		$data['message'] 	= 'To enter the CRUD reserved area (the link is in top navbar) please login as: admin@admin.com / password.';
		
		$this->_make_layout('message', $data);			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
