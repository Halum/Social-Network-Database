<?php 
	backup_tables('localhost','root','','social');

	function backup_tables($host,$user,$pass,$dbname,$tables = '*'){
	//dumps the structure and content of a MySQL database($name) or some of its tables($tables)
	//original code taken from http://davidwalsh.name/backup-mysql-database-php
	//converted to mysqli
	//foreign key check disabled at the beginning and enabled at the end for avoiding inconsistencies while running the generated SQL later
	  
	  $link = mysqli_connect( $host, $user, $pass, $dbname );
	  
	  //get all of the tables
	  if($tables == '*')
	  {
		$tables = array();
		$result = mysqli_query($link, 'SHOW TABLES');
		while($row = mysqli_fetch_row($result))
		{
		  $tables[] = $row[0];
		}
	  }
	  else
	  {
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	  }
	  
	  //disable foreign key check
	  $return = "SET FOREIGN_KEY_CHECKS=0;\n\n";
	  
	  //cycle through
	  foreach( $tables as $table )
	  {
		$result = mysqli_query($link, 'SELECT * FROM ' . $table);
		$num_fields = mysqli_num_fields( $result );
		$return .= 'DROP TABLE IF EXISTS ' . $table . ';';
		$row2 = mysqli_fetch_row( mysqli_query( $link, 'SHOW CREATE TABLE ' . $table ) );
		$return .= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
		  while($row = mysqli_fetch_row($result))
		  {
			$return.= 'INSERT INTO '.$table.' VALUES(';
			for($j=0; $j<$num_fields; $j++) 
			{
			  $row[$j] = addslashes($row[$j]);
			  $row[$j] = str_replace("\n","\\n",$row[$j]);
			  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
			  if ($j<($num_fields-1)) { $return.= ','; }
			}
			$return.= ");\n";
		  }
		}
		$return .= "\n\n\n";
	  }
	  
	  //enable foreign key check
	  $return .= "SET FOREIGN_KEY_CHECKS=1;\n\n";
	  
	  //save file
	  $handle = fopen( 'data.sql', 'w+' );
	  fwrite( $handle, $return );
	  fclose( $handle );
	  
	  echo "Back up finished.";
	}
?>