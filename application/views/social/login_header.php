<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<?php 
foreach($javascript as $script){
	echo "<script src=\"" . base_url() . "script/social/" . $script . "\"></script>\n";		
}

foreach($css as $style){
	echo "<link rel=\"stylesheet\" href=\"" . base_url() . "css/social/" . $style . "\">\n";		
}

?>
</head>

<body>
<?php
function setInput($name='', $id='', $class='', $type='text'){
		return array('name'=>$name, 'id'=>$id, 'type'=>$type, 'class'=>$class);
	}

	// login form
	echo form_open('main/checkPoint');
	
	echo "<table><tr><td>";
	echo form_label('Username: ','username');
	echo "</td><td>";
	echo form_label('Password: ', 'password');
	echo "</td></tr><tr><td>";
	
	echo form_input(setInput('username','username',''));
	echo "</td><td>";
	echo form_input(setInput('password','password','','password'));
	echo form_submit('login','LogIn');
	echo "</td></tr><tr><td>";
	
	echo form_checkbox('keeplogged','1', false);
	echo form_label('Keep me logged in', 'keeplogged');
	echo "</td><td>";
	echo "Forgot password";
	echo "</td></tr>";
	
	echo "</table>";
	
	echo form_close(); //login form ends


?>