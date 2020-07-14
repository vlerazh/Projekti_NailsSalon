<?php 
  include_once '../controllers/UserController.php';
  include_once '../controllers/TreatmentController.php';
  include_once '../controllers/ItemController.php';
  include_once '../controllers/BookedItemController.php';

  $controller =  new UserController();
  $users = $controller->GetAll();
 
  $tController = new TreatmentController();
  $treatments = $tController->GetAll();

  $iController = new ItemController();
  $items =$iController->GetAll();

  $bController = new BookedItemController();
  $booked_items =$bController->GetAll();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/css/adminStyle.css" />
        <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      defer
    ></script>
    <script src="https://kit.fontawesome.com/abfb6f6c69.js" crossorigin="anonymous"></script>
    <script src="../static/js/script.js" defer></script>
    <title>Admin Form</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <h1>The Nails Salon</h1>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="logout.php">LogOut</a></li>
        </ul>
      </div>
      <div class="main">
        <div class="left-side">
          <ul>
            <li class="users">Users</li>
            <li class="treatments">Treatments</li>
            <li class="item">Treatments Item</li>
            <li class="booked">Booked Items</li>
          </ul>
        </div>
        <div class="right-side">
          <div class="users_div">
            <a href="addUser.php"><button class="add">Add</button></a>
            <table>
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Buttons</th>
              </thead>
              <tbody>
                <?php 
                  global $users;
                  $controller->ShowAllUsers($users);
                  ?>
              </tbody>
            </table>
          </div>

          <div class="treatments_div">
            <a href="addTreatments.php"><button class="add">Add</button></a>
            <table>
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Updated by</th>
                <th>Buttons</th>
              </thead>
              <tbody>
              <?php 
                  global $treatments;
                  $tController->ShowAllTreatments($treatments);
                 
                  ?>
              
              </tbody>
            </table>
          </div>

          <div class="item_div">
            <a href="addItem.php"><button class="add">Add</button></a>
            <table>
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Time</th>
                <th>Price</th>
                <th>Treatment</th>
                <th>Image</th>
                <th>Buttons</th>
              </thead>
              <tbody>
              <?php 
                  global $items;
                  $iController->ShowAllItems($items);
                 
                  ?>
              
              </tbody>
            </table>
          </div>
          <div class="booked_div">
            <table>
              <thead>
                <th>Id </th>
                <th>User Name</th>
                <th>User Lastname</th>
                <th>Treatment Name</th>
                <th>Date</th>
              </thead>
              <tbody>
              <?php 
                  global $booked_items;
                  $bController->ShowAll($booked_items);
                 
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="popUp-box">
              <div class="box-content">
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <h2>Are you sure?</h2>
                <p>You won't be able to revert this!</p>
                <a id="yes"><button class="yesBtn" >Yes</button></a>
                <button class="noBtn" id="cancel">Cancel</button>
        </div>
      </div>
      </div>
    </div>
    <script
    src="../static/js/script.js"
    defer
  ></script>
  </body>
</html>
