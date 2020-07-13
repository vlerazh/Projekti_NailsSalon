<?php 
include_once '../controllers/TreatmentController.php';
if (isset($_POST['submit'])) {
    $emri = $_POST['name'];

    if(!empty($emri)){
        $controller = new TreatmentController();
        $response = $controller->Insert($emri);
        header("location: adminForm.php");
        echo '<script>alert("U insertuan")</script>';
    }
    }else{
        echo '<script>alert("Ploteso te gjitha te dhenat")</script>';
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/addTreatmentStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />

    <title>Add Treatment</title>
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
                <h3>Add Treatment</h3>
                <form action="addTreatments.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Treatment name"><br>

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