<?php
class Login extends CI_Controller{
	//diclare page variables
	private $page;

	public function __construct(){
		parent::__construct();
		
		$this->page['title'] = 'hakunamatata';
		
		$script = array('jquery', 'form_validation');
		$css = array();
		
		$this->page['header'] = 'Its a header';
		$this->page['footer'] = 'Here goes footer';
		$this->page['javascript'] = $script; 
		$this->page['css'] = $css;
		
	}
	
	public function index(){
		//$this->Loginmanager->make_cookie('a', 'sex', '0');
		
		if($this->Loginmanager->is_logged_in()){
			$this->load->view('social/header', $this->page);
		}else{
			$this->load->view('social/login_header', $this->page);
			$this->load->view('social/signup', $this->page);
			$this->load->view('social/footer', $this->page);
		}
	}
	
	public function check_point(){
		if(isset($_POST['login'])){// if login button clicked
			$this->do_login();			
		}
		
		else if(isset($_POST['signup'])){// if signup button clicked
			$this->do_signup();
		}
		
		else if(isset($_POST['logout'])){// if logout button clicked
			$this->do_logout();
		}
		
		else if(isset($_POST['activate'])){// if activate button clicked
			$this->do_activate();
		}
	}
	
	private function do_login(){
		$directed = false;
		if($this->Loginmanager->is_user_exist($_POST['user_name']) == false and $directed == false){
			$this->Loginmanager->make_cookie('login_error', "User doesn't exist", '250000');
			$this->mylib->redirect(base_url());
			$directed = true;
		}
		if($this->Loginmanager->is_password_matched($_POST['user_name'],$_POST['password']) == false and $directed == false){
			$this->Loginmanager->make_cookie('login_error', "Password doesn't match", '250000');
			$this->mylib->redirect(base_url());
			$directed = true;
		}
		if($directed == false ){
			$id = $this->Loginmanager->get_user_id($_POST['user_name']);
			
			if($this->Loginmanager->is_active($id) == false){
				$this->do_activate($id);
			}else{
				$res = $this->Loginmanager->get_user_data($id);
				if(isset($_POST['keep_logged_in'])) $this->Loginmanager->push_cookie($res, '2500000');
				else $this->Loginmanager->push_cookie($res);
				$this->mylib->redirect(base_url());
			}
		}
	}
	
	private function do_signup(){
		$directed = false;
		
		if($this->Loginmanager->is_user_exist($_POST['new_user_name']) and $directed == false){
			$this->Loginmanager->make_cookie('signup_error', "Username already exist", '250000');
			$this->mylib->redirect(base_url());
			$directed = true; 
		}
		
		if($this->Loginmanager->is_user_exist($_POST['new_email']) and $directed == false){
			$this->Loginmanager->make_cookie('signup_error', "Email already exist", '250000');
			$this->mylib->redirect(base_url());
			$directed = true;
		}
		
		if($_POST['new_email'] != $_POST['new_re_email'] and $directed == false){
			$this->Loginmanager->make_cookie('signup_error', "Email doesn't match", '250000');
			$this->mylib->redirect(base_url());
			$directed = true;
		}
		
		if($_POST['new_password'] != $_POST['new_re_password'] and $directed == false){
			$this->Loginmanager->make_cookie('signup_error', "Password doesn't match", '250000');
			$this->mylib->redirect(base_url());
			$directed = true;
		}
		
		if($directed == false){
			$this->Loginmanager->add_new_user($_POST);
			$id = $this->Loginmanager->get_user_id($_POST['new_email']);
			$this->do_activate($id);
		}
	}
	
	private function do_logout(){
		echo "out";
		$this->Loginmanager->pop_cookie();
		header( 'Location: '.base_url() );
	}
	
	private function do_activate($id = ''){
		if(isset($_POST['activate'])){
			$key = $this->Loginmanager->get_activation_key($_POST['user_id']);
			if($_POST['entered_key'] == $key){
				$this->Loginmanager->activate_user($_POST['user_id']);
				$res = $this->Loginmanager->get_user_data($_POST['user_id']);
				$this->Loginmanager->push_cookie($res);
				$this->mylib->redirect(base_url());
			}else {
				$this->page['res'] = $this->Loginmanager->get_user_data($_POST['user_id']);
				$this->Loginmanager->make_cookie('activation_error', "Code doesn't match", '250000');
				$this->load->view('social/activate', $this->page);
			}
		}else{
			$this->page['res'] = $this->Loginmanager->get_user_data($id);
			$this->load->view('social/activate', $this->page);
		}
		
	}
}


?>