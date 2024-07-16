<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class site extends MY_Cliente
{
	public $menu;
    public function __construct()
    {
        parent:: __construct();
        
        $this->load->helper(array('form', 'text'));	//helper
        $this->load->library('form_validation');		//library
    }
    //funcao da login
    public function index() {
		redirect('/login');
    } // fim login//
    
    
}