<?php	
	//sign up form
	echo form_open('main/checkPoint');
	
	echo "<table>";
	
	echo "<tr><td>";
	echo form_label('Username: ','newusername');
	echo "</td><td>";
	echo form_input(setInput('newusername','newusername',''));
	echo "</td></tr><tr><td>";
		
	echo form_label('Full Name: ','newname');
	echo "</td><td>";
	echo form_input(setInput('newname','newname',''));
	echo "</td></tr><tr><td>";
	
	echo form_label('Your Email: ','newemail');
	echo "</td><td>";
	echo form_input(setInput('newemail','newemail','','email'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Re-enter Email: ','newreemail');
	echo "</td><td>";
	echo form_input(setInput('newreemail','newreemail','','email'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Password: ','newpassword');
	echo "</td><td>";
	echo form_input(setInput('newpassword','newpassword','','password'));
	echo "</td></tr><tr><td>";
	
	echo form_label('Re-enter Password: ','newrepassword');
	echo "</td><td>";
	echo form_input(setInput('newrepassword','newrepassword','','password'));
	echo "</td></tr><tr><td>";
	
	echo form_label('I am: ','newsex');
	echo "</td><td>";
	echo form_dropdown('newsex', array('select'=>'Select Sex:','male'=>'Male', 'female'=>'Female'), 'select');
	echo "</td></tr><tr><td>";
	
	//creating dob dropdown
	$day = array('select'=>'Day: ');
	$month = array('select'=>'Month: ', 1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec',);
	$year = array('select'=>'Year: ');
	
	for($i=1; $i<=31; ++$i) $day[$i] = ''.$i;
	for($i=2000; $i>=1900; --$i) $year[$i] = ''.$i;
	
	
	echo form_label('Birthday: ','newbirthday');
	echo "</td><td>";
	echo form_dropdown('newday', $day, 'select');
	echo form_dropdown('newmonth', $month, 'select');
	echo form_dropdown('newyear', $year, 'select');
	echo "</td></tr>";
	
	echo "</table>";
	
	echo form_submit('signup','Signup');
	
	echo form_close();//sign up form ends
	
	
?>
