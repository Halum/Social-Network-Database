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
	<header><?php if(isset($header)) echo $header; ?></header>
    
<?php
	echo form_open('login/check_point');
	echo form_submit('logout','Logout');
	echo form_close();
?>