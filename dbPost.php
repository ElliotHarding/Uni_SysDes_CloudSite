<?php
	$serverName = "den1.mssql7.gear.host"; 
	$uid = "smdatabase";   
	$pwd = "Jj80-f1I!M3c";  
	$databaseName = "smdatabase"; 
 
	$conn = sqlsrv_connect($serverName, array( "UID"=>$uid, "PWD"=>$pwd, "Database"=>$databaseName));  

	$tsql = $_POST['request'];

	$stmt = sqlsrv_query($conn, $tsql);  
	if ( $stmt )  
	{  
		/* Iterate through the result set printing a row of data upon each iteration.*/ 
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))  
		{  
			$output[]=$row;
		}
		echo str_replace('"', '', json_encode($output));
	}   
	else   
	{  
		 echo "Error \n";  
		 die( print_r( sqlsrv_errors(), true));  
	}  
	
	/* Free statement and connection resources. */  
	sqlsrv_free_stmt( $stmt);  
	sqlsrv_close( $conn);  
?>