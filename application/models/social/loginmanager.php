<?php
class Loginmanager extends CI_Model{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function is_logged_in(){
		return $this->input->cookie('user_id');
	}
	public function is_user_exist($user){
		$query = "SELECT * FROM (user) WHERE (user_name='$user' OR
		 email='$user')";
		 
		 if($this->db->query($query)->num_rows > 0 ) return true;
		 else return false;
	}
	
	public function is_password_matched($user, $pass){
		$query = "SELECT * FROM (user) WHERE (user_name='$user' OR
		 email='$user') AND password='" . sha1($pass) . "'";
		 
		 if( $this->db->query($query)->num_rows > 0 ) return true;
		 else return false;
	}
	
	public function is_active($id){
		$query = "SELECT active FROM (user) WHERE user_id=$id";
		 
		 $row = $this->db->query($query)->row_array();
		 
		 if($row['active'] == 'yes') return true;
		 else return false;
	}
	
	public function get_user_id($user){
		$query = "SELECT * FROM (user) WHERE (user_name='$user' OR
		 email='$user')";
		 
		 $row = $this->db->query($query)->row_array();
		 return $row['user_id'];
	}
	
	public function get_user_data($id){
		$query = "SELECT * FROM (user) WHERE user_id = $id";
		 
		 return $this->db->query($query);
	}
	
	public function add_new_user($data){
		$dob = $data['new_year'] . '-' . $data['new_month'] . '-' . $data['new_day'];
		$pass = sha1($data['new_password']);
		$key = rand(100000, 100000000);
		
		$query = "INSERT INTO user (user_name, name, password, email, sex, date_of_birth, activation_key) 
		VALUES('$data[new_user_name]', '$data[new_name]', '$pass', '$data[new_email]', 
		'$data[new_sex]', $dob, '$key')";
		
		$this->db->query($query);
	}
	
	public function activate_user($id){
		$query = "UPDATE user SET active='yes' WHERE user_id=$id";
		$this->db->query($query);		
	}
	
	public function get_activation_key($id){
		$query = "SELECT activation_key FROM (user) WHERE user_id=$id";
		$res = $this->db->query($query);
		$row = $res->row_array();
		return $row['activation_key'];
	}
	
	public function push_cookie($data, $time='0'){
		$row = $data->row_array();
		
		$this->make_cookie('name', $row['name'], $time);
		$this->make_cookie('user_id', $row['user_id'], $time);
	}
	
	public function pop_cookie(){
		$this->make_cookie('name');
		$this->make_cookie('user_id');
	}
	
	public function make_cookie($name, $val='', $time='0'){
		$this->input->set_cookie( array(
			'name'   => $name,
		    'value'  => $val,
		    'expire' => $time,
		    'domain' => '',
		    'path'   => '/',
		    'prefix' => '',
		    'secure' => FALSE
			));
	}
}
?>