<!DOCTYPE html>
<html>
<head>
	<title>
		User Signup
	</title>
	<style type="text/css">
		table, th, td,tr {border: 1px solid purple;}
	</style>
</head>
<body>
	<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	function showTable(&$database)
    {
    	print("<table><caption> All users first and last names</caption><th>FirstName</th><th>LastName</th>");
    	$allQuery= "SELECT firstName, lastName FROM auth";
    	if ( !( $result = mysqli_query( $database,$allQuery ) ) ) 
    {
        print( "<p>Could not execute query!</p>" );
        die( mysqli_error($database) . "</body></html>" );
    }
    	while ($row = mysqli_fetch_row($result))
    	{
    		print("<tr>");
    		foreach ($row as $value)
    			print("<td>$value</td>");
    		print("</tr>");
    	}
    	print("</table>");
    	
    }


	$query = "INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ('" . $username ."','". $password . "','". $firstname."','". $lastname ."','". $email ."','". $phone."')";
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
    }
    else
    	print("<p>you are registered now.");
    showTable($database);
    	?>
</body>
</html>