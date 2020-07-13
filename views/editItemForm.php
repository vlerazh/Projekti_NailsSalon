<?php

include_once "../controllers/ItemController.php";
include_once '../controllers/TreatmentController.php';

    $id=(isset($_GET['id'])) ? $_GET['id'] : null;
    $controller = new ItemController();
    $item = $controller->getItemById($id);
    $one_treatment = $controller->treatmentName($item['treatment']);
    $tController = new TreatmentController();
    $treatments = $tController->GetAll();

    
    if (isset($_POST['submit'])) {
        $i_id = $_POST['id'];
        $emri = $_POST['name'];
        $cmimi = $_POST['time'];
        $koha = $_POST['price'];
        $t_id = $_POST['treatment'];

        if(!empty( $emri) && !empty( $cmimi) && !empty($koha) && $t_id != 0 && move_uploaded_file($_FILES['addPhoto']['tmp_name'],$file_target)){
            $controller->Update($i_id,$emri,$cmimi,$koha,$t_id);
            header("location: adminForm.php");
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
    <link rel="stylesheet" href="../static/css/addItemStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />

    <title>Edit Treatment Item</title>
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
                <h3>Edit Treatment Item</h3>
                <form action="addItem.php" method="POST" enctype= multipart/form-data>
                <?php
                global $item;
                global $one_treatment; 
                global $treatments;
                    echo '
                        <input type="hidden" name="id" value"'.$item['id'].'">

                        <label for="name">Name</label>
                        <input type="text" name="name" value="'.$item['name'].'"><br>

                        <label for="time">Time</label>
                        <input type="text" name="time" value="'.$item['time'].'"><br>

                        <label for="price">Price</label>
                        <input type="text" name="price" value="'.$item['price'].'"><br>

                        <label for="treatment">Treatment</label>
                        <select name="treatment" class="treatment-list" >
                            <option>'.$one_treatment.'</option>
                    ';    
                    foreach($treatments as $treatment){
                        echo '<option value='.$treatment['id'].'>'.$treatment['name'].'</option>';
                    }
                    echo '
                        </select><br>
                        
                        <label for="photo">Photo</label>
                        <input type="file" name="addPhoto" value="Upload" id="image" ><br>';
                ?>        
                    <input type="submit" value="Save" name="submit" id="saveBtn">
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