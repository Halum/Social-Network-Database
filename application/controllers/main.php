<?php
class Main extends CI_Controller{
	//diclare page variables
	private $page;

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		
		$this->page['title'] = 'hakunamatata';
		
		$script = array();
		$css = array();
		
		$this->page['header'] = 'Its a header';
		$this->page['footer'] = 'Here goes footer';
		$this->page['javascript'] = $script; 
		$this->page['css'] = $css;
		
	}
	
	public function index(){
		$this->load->view('social/login_header', $this->page);
		$this->load->view('social/login', $this->page);
		$this->load->view('social/footer', $this->page);
	}
}


?>