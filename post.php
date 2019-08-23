<?php
  require('config/config.php');
  require('config/db.php');

  //Check submit
   if(isset($_POST['delete'])){
    //Get Form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
      $age = mysqli_real_escape_string($conn, $_POST['age']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
   
     //Query
     $query = "DELETE FROM users WHERE id = {$delete_id}";

     if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
     } else {
      echo 'ERROR:'.mysqli_error($conn);
     }
   }

  #Get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  #Create Query
  $query = 'SELECT * FROM users WHERE id = '.$id;
  #Get result
  $result = mysqli_query($conn, $query);
  #Fetch data
  $user = mysqli_fetch_assoc($result);
  #Free result
  mysqli_free_result($result);
  #Close connection
  mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
  <div class="jumbotron">
    <h1 style="font-family: 'Impact'">USERS</h1>
      <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="container" style="background-color: green; text-align: center">
        <h3 style="color:orange">Username: <?php echo $user['username']; ?></h3>
        <h4 style="color:white"><span style="color:darkblue">User's Details: </span>
          <?php echo $user['first_name']; ?>
          <?php echo $user['last_name']; ?><br>
          <?php echo $user['age']; ?><br>
          <?php echo $user['email']; ?><br>
          <?php echo $user['password']; ?>
        </h4>
        <small>Created On <?php echo $user['created_at']; ?></small>
        <br>
      
          <input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
          <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo ROOT_URL; ?>index.php" class="btn btn-secondary">Back</a>
        <hr class="my-4"> 
      </div>
    </form>
  </div>
<?php include('inc/footer.php'); ?>





