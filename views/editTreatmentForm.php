<?php
      include_once "../controllers/TreatmentController.php";

      $id=(isset($_GET['id'])) ? $_GET['id'] : null;
      $controller = new TreatmentController();
      $treatment = $controller->getTreatmentById($id);

      if (isset($_POST['submit'])) {
          $t_id=$_POST['id'];
          $name=$_POST['name'];
       
          if(!empty($name)){
            $controller->Update($t_id,$name);
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
    <link rel="stylesheet" href="../static/css/addTreatmentStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />

    <title>Edit Treatment</title>
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
                <h3>Edit Treatment</h3>
                <form action="editTreatmentForm.php" method="POST">
                    <?php
                    global $treatment;
                        echo '
                            <input type="hidden" name="id" value="'.$treatment['id'].'"><br>

                            <label for="name">Name</label>
                            <input type="text" name="name" value="'.$treatment['name'].'"><br>
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