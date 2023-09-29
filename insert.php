<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page</title>
</head>
 
<body>   
        <?php

$servername = "webdb.caur0oo07krb.ap-south-1.rds.amazonaws.com";
$username = "admin";
$password = "webdb321";
$dbname = "webdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

$first_name =  $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];      
$email = $_REQUEST['email'];

// Performing insert query execution
// here our table name is data
$sql = "INSERT INTO data(firstname,lastname,email) VALUES ('$first_name','$last_name','$email')";

if (mysqli_query($conn, $sql)) {
  echo "<b>Table data inserted successfully</b><br><br><br>";

     	$sql = "SELECT id, firstname, lastname, email FROM data";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
   	 // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
        echo "<b>ID:</b> " . $row["id"]. "<b> --- Name:</b> " . $row["firstname"]. " " . $row["lastname"]. " <b>---Email Address</b> " . $row["email"]. "<br>";
   	 }
	} else {
    		echo "0 results";
	}


} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
        ?>
    
</body>
 
</html>
	
