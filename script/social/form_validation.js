
$(window).load(function(){
	check_login();
	check_signup();
});

function check_login(){
	$('#login_form').submit(function() {
		if($('#user_name').val()!='' && $('#password').val()!='') return true;
		else return false;
    });
}

function check_signup(){
	$('#signup_form').submit(function() {
        if($('#new_user_name').val()=='' || $('#new_name').val()=='' || $('#new_email').val()=='' || $('#new_re_email').val()=='' || $('#new_password').val()=='' || $('#new_re_password').val()=='') return false;
		
		//alert('Passed phase 1');
		
		if($('select[name="new_sex"]').val()=='select' || $('select[name="new_year"]').val()=='select' || $('select[name="new_month"]').val()=='select' || $('select[name="new_day"]').val()=='select')return false;
		//alert('Passed phase 2');
		if($('#new_email').val() != $('#new_re_email').val() || $('#new_password').val() != $('#new_re_password').val()) return false;
		//alert('Passed phase 3');
		//return true;
    });
	
	
	$('#new_re_email').keyup(function() {
        if($('#new_email').val() != $('#new_re_email').val()){//alert('go');
			$('#new_re_email_error').show('slow');
		}else $('#new_re_email_error').hide('slow');
    });
	
	$('#new_re_email').blur(function() {
        if($('#new_email').val() != $('#new_re_email').val()){//alert('go');
			$('#new_re_email_error').show('slow');
		}else $('#new_re_email_error').hide('slow');
    });
	
	$('#new_re_password').keyup(function() {
        if($('#new_password').val() != $('#new_re_password').val()){//{alert('yo');
			$('#new_re_password_error').show('slow');
		}else $('#new_re_password_error').hide('slow');
    });
	
	$('#new_email').keyup(function() {
		if($('#new_re_email').val().length > 0){
			if($('#new_email').val() != $('#new_re_email').val()){//alert('go');
				$('#new_re_email_error').show('slow');
			}else $('#new_re_email_error').hide('slow');
		}
		
    });
	
	$('#new_password').keyup(function() {
		$('#new_re_password').val("");
    });
}