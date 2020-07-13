<?php 
include_once '../controllers/ItemController.php';
include_once '../controllers/TreatmentController.php';

if (isset($_POST['submit'])) {
    
    $info = pathinfo($_FILES['addPhoto']['name']);
    $ext = $info['extension'];
    $name = $_FILES['addPhoto']['name'];
    if(empty($ext)){
        $ext = ".png";
    }

    $randomId = bin2hex(random_bytes(10));
    $file_target = "images/".$name.'.'.$ext;

    $emri = $_POST['name'];
    $cmimi = $_POST['time'];
    $koha = $_POST['price'];
    $t_id = $_POST['treatment'];

    
    if(!empty( $emri) && !empty( $cmimi) && !empty($koha) && $t_id != 0 && move_uploaded_file($_FILES['addPhoto']['tmp_name'],$file_target)){
        $controller = new ItemController();
        $response = $controller->Insert($emri, $cmimi, $koha,$t_id,$file_target);
        header("location: adminForm.php");
    }else{
        echo '<script>alert("Ploteso te gjitha te dhenat")</script>';
    }
}


$tController = new TreatmentController();
$treatments = $tController->GetAll();


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
                <h3>Add Treatment Item</h3>
                <form action="addItem.php" method="POST" enctype= multipart/form-data>
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Item name"><br>

                    <label for="time">Time</label>
                    <input type="text" name="time" placeholder="Item time"><br>

                    <label for="price">Price</label>
                    <input type="text" name="price" placeholder="Item price"><br>

                    <label for="treatment">Treatment</label>
                    <select name="treatment" class="treatment-list" >
                        <option>Select a treatment</option>
                    <?php 
                        global $treatments ; 
                        foreach($treatments as $treatment){
                            echo '<option value='.$treatment['id'].'>'.$treatment['name'].'</option>';
                        }
                    ?>
                    </select><br>
                    
                    <label for="photo">Photo</label>
                    <input type="file" name="addPhoto" value="Upload" id="image" ><br>

                    <input type="submit" value="Add" name="submit" id="addBtn">
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