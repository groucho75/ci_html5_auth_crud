<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud extends MY_Controller {

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
	 * Index Page for CRUD sample controller.
	 */
	public function index()
	{
		if ( ! $this->ion_auth->logged_in() )
		{
			redirect('auth/login', 'refresh');
		}
		
		$data['page_title']	= 'Crud sample';
		
		$this->load->library('grocery_CRUD');
		
		$crud = new grocery_CRUD();
		$crud->set_table('items');
		
		$crud->fields('name', 'updated');
		$crud->required_fields('name');
		$crud->field_type('updated','invisible');
		
		$crud->unset_jquery();
		//$crud->set_theme('twitter-bootstrap3');

		$crud->callback_before_update( array( $this, '_crud_index_before_insert_or_update' ) );
		$crud->callback_before_insert( array( $this, '_crud_index_before_insert_or_update' ) );
				
		$data = array_merge ($data, (array)$crud->render() );
		
		$this->_make_layout('crud', $data);			
	}


    /**
     * _crud_option_before_insert_or_update 
     *
     * Do before insert
     */
    function _crud_index_before_insert_or_update ( $post_array, $primary_key )
    {   
		$this->load->helper('date');
        $this->load->helper('security');
        
        $post_array = array_map_recursive( 'xss_clean', $post_array );
        $post_array = array_map_recursive( 'strip_tags', $post_array );

		$post_array['updated'] = date('Y-m-d H:i:s',now());
				
        return $post_array;
    }	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
