<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Secure Coding</title>
  </head>
  <?php 
 include_once('connection.php');
    session_start();
    $id=$_SESSION['id'];
    $stmt = $mysqli->prepare( "SELECT username,email FROM users where id=?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->bind_result($username,$email);
    $rs= $stmt->fetch ();
    $_SESSION['username']=$username;
    $_SESSION['email']=$email;
  ?>

<body>
<div class="container py-2">
    <div class="jumbotron">
        <h1>User Profile</h1>
        <form method="POST" action="profile.php" >
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>"/>
            <div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <button name="logout" class="btn btn-danger">Log out</button>
            </div>
        </form>
    <div>
<div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
      <?php
include_once('connection.php');

        if(isset($_POST['submit']))
        {
	
            $username = $_POST['username'];
            $email = $_POST['email'];
	        $stmt = $mysqli -> prepare('UPDATE users SET username = ? , email=? WHERE id = ? LIMIT 1');
	        $stmt -> bind_param('ssi', $username, $email,$id);
	        $stmt -> execute();
	    //$stmt -> affected_rows === 1


            
        }  
        if(isset($_POST['logout']))
        {
            unset($_SESSION['id']);
            session_destroy();
            header("Location: index.php");
        }            
?>