<?php
	require('config/config.php');
	require('config/db.php');
	
	//Check submit
	 if(isset($_POST['submit'])){
	 	//Get Form data
	 	$username = mysqli_real_escape_string($conn, $_POST['username']);
	 	$password = mysqli_real_escape_string($conn, $_POST['password']);
	 	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	 	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	 	$age = mysqli_real_escape_string($conn, $_POST['age']);
	 	$email = mysqli_real_escape_string($conn, $_POST['email']);
	 
		 //Query
		 $query = "INSERT INTO users(username, password, first_name, last_name, age, email) VALUES('$username','$password', '$first_name', '$last_name', 'age', 'email')";

		 if(mysqli_query($conn, $query)){
		 	header('Location: '.ROOT_URL.'');
		 } else {
		 	echo 'ERROR:'.mysqli_error($conn);
		 }
	 }
?>
	<?php include('inc/header.php'); ?>
	<div class="jumbotron">
		<h1 style="font-family: 'Roboto'">Add User</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group"> 
				<label>Password</label>
				<input type="text" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" class="form-control">
			</div>
			<div class="form-group"> 
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control">
			</div>
			<div class="form-group"> 
				<label>Age</label>
				<input type="text" name="age" class="form-control">
			</div>
			<div class="form-group"> 
				<label>Email</label>
				<input type="text" name="email" class="form-control">
			</div>
			<br>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>





