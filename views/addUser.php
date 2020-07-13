<?php 
include_once '../controllers/UserController.php';
if (isset($_POST['submit'])) {
    $emri = $_POST['name'];
    $mbiemri = $_POST['lastname'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
   
    if(!empty( $emri) && !empty( $mbiemri) && !empty($email) && !empty($pw) ){
        $controller = new UserController();
        $response = $controller->Insert($emri, $mbiemri, $email,$pw);
        header("location: adminForm.php");
        echo '<script>alert("U insertuan")</script>';
    }else{
        echo '<script>alert("Ploteso te gjitha te dhenat")</script>';
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/addUserStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />

    <title>Add User</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>The Nails Salon</h1>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">LogOut</a></li>
            </ul>
        </div>
        <div class="main">
            <div class="left-side">
                <ul>
                    <li class="users">Users</li>
                    <li class="treatments">Treatments</li>
                    <li class="item">Treatments Item</li>
                  </ul>
            </div>
            <div class="right-side">
                <h3>Add User</h3>
                <form action="addUser.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Your name"><br>

                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" placeholder="Your lastname"><br>

                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Your email"><br>

                    <label for="pw">Password</label>
                    <input type="password" name="pw" placeholder="Your password"><br>

                    <input type="submit" value="Add" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
    <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    defer
  ></script>
  <script src="../static/js/script.js" defer></script>
</body>
</html>