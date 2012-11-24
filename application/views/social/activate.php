<?php
	if(isset($_COOKIE['activation_error'])){
		echo form_fieldset('Activattion Error', array('id'=>'activation_error', 'class'=>'error'));
		echo '<p>'.$_COOKIE['activation_error']."</p>";
		setcookie('activation_error', '', time(), '/');
	}
	else{
		echo form_fieldset('Account Activation', array('id'=>'activation_error', 'class'=>'error'));
		echo "<p><strong>Please enter the following code</strong></p>";
	}
	
	$row = $res->row_array();
	//var_dump($row);
	
	echo $row['activation_key'] . '</br>';
	
	echo form_open('login/check_point', array('id'=>'activation_form'));
	
	echo form_label('','entered_key');
	echo form_input(array('id'=>'activate', 'type'=>'text', 'name'=>'entered_key'));
	
	echo form_hidden('user_id', $row['user_id']);
	
	echo form_submit('activate', 'Activate');
	
	echo form_close();
	
	echo form_fieldset_close();
?>