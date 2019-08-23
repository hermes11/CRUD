<?php 
    #create connection
   # $conn = mysqli_connect('localhost', 'root', '12345', 'user_account');
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	#check connection
    if(mysqli_connect_errno()){
        echo ' Failed to connect to Mysql'. mysqli_connect_errno();
    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>