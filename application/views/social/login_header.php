<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>-->
<?php 
if(isset($javascript)){
	foreach($javascript as $script){
		echo "<script src=\"" . base_url() . "script/social/" . $script . ".js\"></script>\n";		
	}
}

if(isset($css)){
	foreach($css as $style){
		echo "<link rel=\"stylesheet\" href=\"" . base_url() . "css/social/" . $style . ".css\">\n";		
	}
}
?>
</head>

<body>
<?php	
	if(isset($_COOKIE['login_error'])){
		echo form_fieldset('Login Error', array('id'=>'login_error', 'class'=>'error'));
		echo '<p>'.$_COOKIE['login_error']."</p>";
		setcookie('login_error', '', time(), '/');
		echo form_fieldset_close();
	}
	
	// login form
	echo form_open('login/check_point', array('id'=>'login_form'));
	
	echo "<table><tr><td>";
	echo form_label('Username: ','user_name');
	echo "</td><td>";
	echo form_label('Password: ', 'password');
	echo "</td></tr><tr><td>";
	
	echo form_input($this->mylib->set_input_attr('user_name','user_name','', 'Username or Email'));
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('password','password','','Password','password'));
	echo form_submit('login','LogIn');
	echo "</td></tr><tr><td>";
	
	echo form_checkbox('keep_logged_in','1', false);
	echo form_label('Keep me logged in', 'keep_logged_in');
	echo "</td><td>";
	echo "Forgot password";
	echo "</td></tr>";
	
	echo "</table>";
	
	echo form_close(); //login form ends
?>