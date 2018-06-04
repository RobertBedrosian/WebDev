<!DOCTYPE html>
<html>
<head>
	<title>
		User Login
	</title>
	<meta charset="utf-8">

</head>
<body>
	<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	$query = "SELECT * from auth where username='" . $username ."'";
	if ( !( $database = mysqli_connect( "localhost",
            "webphp", "password" ) ) )                      
        die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db( $database, "finaldb" ) )
        die( "Could not open finaldb database </body></html>" );
    // query books database
    if ( !( $result = mysqli_query( $database,$query ) ) ) 
    {
        print( "<p>Could not execute query!</p>" );
        die( mysqli_error($database) . "</body></html>" );
    } // end if
    $actualpass = mysqli_fetch_row( $result );
    if (($password != $actualpass[2]))
    {
    	print ("<p> Incorrect username or password</p>");
    }
    else
    	print("<p> Welcome back ". $username . "! Login was successful.");
	?>
</body>
</html>