<?php
	run_sql_file("data.sql","localhost","root","","social");
	function startsWith($haystack, $needle)
	{
		return !strncmp($haystack, $needle, strlen($needle));
	}
	function run_sql_file($location, $host, $user, $pass, $dbname){
		//load file
		$commands = file_get_contents($location);
	
		//delete comments
		$lines = explode("\n",$commands);
		$commands = '';
		foreach($lines as $line){
			$line = trim($line);
			if( $line && !startsWith($line,'--') ){
				$commands .= $line . "\n";
			}
		}
	
		//convert to array
		$commands = explode(";", $commands);
		
		$link = mysqli_connect($host, $user, $pass, $dbname);

		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	
		//run commands
		$total = $success = 0;
		foreach($commands as $command){
			if(trim($command)){
				$success += ( mysqli_query($link, $command) == false ? 0 : 1 );
				//echo $success . "\n" . $command . "\n";
				$total += 1;
			}
		}
		echo $success . "/" . $total . " query(s) successful.\n";
	}
?>