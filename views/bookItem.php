<?php 
 session_start();
include_once "../controllers/ItemController.php";
include_once "../controllers/BookedItemController.php";
$iController = new ItemController();

$controller = new BookedItemController();
if (isset($_POST['submit'])) {
    if(isset($_SESSION['name'])){
        $user_id = $_SESSION['id'];
        $item_id = $_GET['itemID'];
        if(!empty( $_POST['date'])){
            $date = $_POST['date'];
            $controller->Insert($user_id,$item_id,$date);
            header('location:treatments.php');
        }else{
            echo '<script>alert("Pick a date")</script>';
        }
    }
}

if(isset($_POST['cancel'])){
    header('location:treatments.php');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Item</title>
    <link rel="stylesheet" href="../static/css/bookItemStyle.css">
</head>
<body>
<div class="bookDetails">
        <div class="details">
          <?php
          global $iController;
          $itemm;
          if(isset($_GET['itemID'])){
            $itemm = $iController->getItemById($_GET['itemID']); 
          }
          echo'
            <h1>Book your treatment</h1>
            <p>Treatment Name : '.$itemm['name'].'</p>
            <p>Treatment Time :'.$itemm['time'].' </p>
            <p>Treatment Price : '.$itemm['price'].'</p>
            ';
          ?>  
              <form action="" method="POST">
              <label for="date">Choose your date:</label>
              <input type="date" for="date" name="date"><br>
              <input type="submit" value="Cancel" id="cancel" name="cancel">
              <input type="submit" value="Book Now" name="submit">
          </form>
        </div>
</div>
</body>
</html>