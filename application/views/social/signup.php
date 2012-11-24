<hr />
<?php
$img_dir = base_url() . "image/social";

$url = base_url();
	if(isset($_COOKIE['signup_error'])){
		echo form_fieldset('Signup Error', array('id'=>'signup_error', 'class'=>'error'));
		echo '<p>'.$_COOKIE['signup_error']."</p>";
		setcookie('signup_error', '', time(), '/');
		echo form_fieldset_close();
	}
	//sign up form_signup
	echo form_open('login/check_point', array('id'=>'signup_form'));
	
	echo "<table>";
	
	echo "<tr><td>";
	echo form_label('Username: ','new_user_name');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_user_name','new_user_name','','Username'));
	echo "</td></tr><tr><td>";
		
	echo form_label('Full Name: ','new_name');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_name','new_name','','Full Name'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Your Email: ','new_email');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_email','new_email','','Email','email'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Re-enter Email: ','new_re_email');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_re_email','new_re_email','','Re-enter Email','email'));
	echo '<span id="new_re_email_error" style="display:none" >'. "<img src=\"$img_dir/alert.png\" />" .
	'Email doesn\'t match</span>';
	echo "</td></tr><tr><td>";
	
	echo form_label('Password: ','new_password');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_password','new_password','','Password','password'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Re-enter Password: ','new_re_password');
	echo "</td><td>";
	echo form_input($this->mylib->set_input_attr('new_re_password','new_re_password','','Re-enter Password','password'));
	echo '<span id="new_re_password_error" style="display:none" >'."<img src=\"$img_dir/alert.png\" />".'Password doesn\'t match</span>';
	echo "</td></tr><tr><td>";
	
	echo form_label('I am: ','new_sex');
	echo "</td><td>";
	echo form_dropdown('new_sex', array('select'=>'Select Sex:','male'=>'Male', 'female'=>'Female'), 'select');
	echo "</td></tr><tr><td>";
	
	//creating dob dropdown
	$day = array('select'=>'Day: ');
	$month = array('select'=>'Month: ', 1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec',);
	$year = array('select'=>'Year: ');
	
	for($i=1; $i<=31; ++$i) $day[$i] = ''.$i;
	for($i=2000; $i>=1900; --$i) $year[$i] = ''.$i;
	
	
	echo form_label('Birthday: ','new_birthday');
	echo "</td><td>";
	echo form_dropdown('new_year', $year, 'select');
	echo form_dropdown('new_month', $month, 'select');
	echo form_dropdown('new_day', $day, 'select');
	echo "</td></tr>";
	
	echo "</table>";
	
	echo form_submit('signup','Signup');
	
	echo form_close();//sign up form ends
?>