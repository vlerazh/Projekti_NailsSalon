<?php
    include_once "../controllers/UserController.php";

    $id=(isset($_GET['id'])) ? $_GET['id'] : null;
    $controller = new UserController();
    $user = $controller->getUserById($id);

    if (isset($_POST['submit'])) {
        $u_id = $_POST['id'];
        $emri = $_POST['name'];
        $mbiemri = $_POST['lastname'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
       
        if(!empty( $emri) && !empty( $mbiemri) && !empty($email) && !empty($pw) ){
            $controller->Update($u_id,$emri,$mbiemri,$email,$pw);
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

    <title>Edit User</title>
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
                <h3>Edit User</h3>
                <form action="editUserForm.php?id=<?php echo $_GET['id'] ?>" method="POST">

                    <?php
                    global $user;
                        echo '
                        <input type="hidden" name="id" value="'.$user['id'].'"><br>

                        <label for="name">Name</label>
                        <input type="text" name="name" value="'.$user['name'].'"><br>

                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" value="'.$user['lastname'].'"><br>

                        <label for="email">Email</label>
                        <input type="text" name="email" value="'.$user['email'].'"><br>

                        <label for="pw">Password</label>
                        <input type="password" name="pw" value="'.$user['password'].'"><br>
                        ';
                   
                    ?>

                    <input type="submit" value="Save" name="submit">
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