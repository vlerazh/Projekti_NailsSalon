<?php 
include_once '../controllers/UserController.php';
if (isset($_POST['register'])) {
    $emri = $_POST['name'];
    $mbiemri = $_POST['lname'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $controller = new UserController();

       
    if(!empty( $emri) && !empty( $mbiemri) && !empty($email) && !empty($pw) ){
      $controller = new UserController();
      $response = $controller->Insert($emri, $mbiemri, $email,$pw);
      header("location: adminForm.php");
      echo '<script>alert("U insertuan")</script>';
    }else{
      echo '<script>alert("Ploteso te gjitha te dhenat")</script>';
    }
    
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['pasw'];
  $controller = new UserController();
  $sucess = $controller->GetUserForLogIn($username,$password);
  if(!empty( $username) && !empty( $password)){
    if($sucess){
    header("location: index.php");
    }else{
      echo '<script>alert("Te dhenat nuk jane te sakta")</script>';
    }
  }else{
    echo '<script>alert("Ploteso te gjitha te dhenat")</script>';
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/css/loginStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      defer
    ></script>
    <script src="../static/js/script.js" defer></script>
    <title>Login</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="img">
        <img src="../static/img/login_background.jpg" alt="logo_bg" />
      </div>
      <div class="main">
        <ul>
          <li><a class="login" href="#">LogIn</a></li>
          <li><a class="register" href="#">Register</a></li>
        </ul>
        <div class="login_form">
          <form action="loginForm.php" onsubmit="return validations_Login()" method="POST"> 
            <label for="username">Username</label>
            <input type="text" name="username" id="username" /><br />
            <label for="pasw">Password</label>
            <input type="password" name="pasw" id="pasw" /><br />
            <input type="submit" name="login" value="LogIn">
          </form>
          <?php
          global $success;
          if(isset($success)){
            echo '
                <span style="">Password and email are wrong!</span>
              ';
			    }
	    	  ?>
        </div>
        <div class="register_form"> 
          <form action="loginForm.php" onsubmit="return validations_Register()" method="POST">
            <label for="name">Firstname</label>
            <input type="text" name="name" id="name" /><br />
            <label for="lname">Lastname</label>
            <input type="text" name="lname" id="lname" /><br />
            <label for="email">Email</label>
            <input type="text" name="email" id="email" /><br />
            <label for="pw">Password</label>
            <input type="password" name="pw" id="pw" /><br />
            <input type="submit" name="register" value="Register">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
