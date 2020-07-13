<?php
include_once "../controllers/ItemController.php";
include_once "../controllers/TreatmentController.php";
include_once '../controllers/UserController.php';
session_start();
$tController = new TreatmentController();
$treatments=$tController->GetAll();

$iController = new ItemController();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/css/treatmentsStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      defer
    ></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <title>Treatments</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
      <!-- <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label> -->
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="treatments.php">TREATMENTS</a></li>
          <li><a href="aboutUs.php">ABOUT US</a></li>
          <li><a href="#footer">CONTACT US</a></li>
        </ul>
        <div class="login">
          <?php
             if(isset($_SESSION['name'])){
              echo '
              <i class="far fa-user"></i><span class="name">'.$_SESSION['name'].'</span>
              <span><a href="logout.php">LOGOUT</a></span>';
            }else{
              echo '<i class="far fa-user"></i><span><a href="loginForm.php">LOGIN</a></span>';
            }
          ?>
        </div>
      </div>
      <div class="main">
        <div class="main">
            <div class="social_media">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-pinterest-p"></i>
            </div>
        <fieldset>
          <legend>
            Book Online
          </legend>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit
            ipsam explicabo itaque a laudantium quae iusto eaque odio
            voluptatibus iste dignissimos, sed voluptatum laborum officia
            repellendus minus. Odio, alias eveniet.
          </p>
        </fieldset>
      </div>
      <div class="treatments">
        <ul>
        <?php
          global $treatments;
          foreach($treatments as $treatment){
            echo ' <li><a class="t" href="treatments.php?treatmentID='.$treatment['id'].' #treatmentItem" style="color: inherit; text-decoration:none;">'.$treatment['name'].'</a></li>';
          };
        ?>
        </ul>
        <div class="line"></div>
      </div>
      <div class="treatment-items">
<?php 
    global $iController;
    $items;
    if(isset($_GET['treatmentID'])){
        $items = $iController->getItemByTreatmentId($_GET['treatmentID']); 
    }else{
        $items = $iController->getItemByTreatmentId(4); 
    }
    foreach($items as $item){

        echo '
        <div class="col-30 items">
          <div>
            <img src="'.$item['img_url'].'" alt="'.$item['name'].'" />
            <h3>'.$item['name'].'</h3>
            <p>'.$item['time'].' min</p>
            <p>'.$item['price'].'$</p>
            <a class="bookBtn" href="bookItem.php?itemID='.$item['id'].'"><button>BOOK IT</button></a>   
          </div>
        </div>
        ';
    }
?>
      <div class="footer" id="footer">
        <div class="adress">
          <h5>ADDRESS</h5>
          <p>
            500 Terry Francois Street <br />
            San Francisco, CA 94158
          </p>
        </div>
        <div class="vertical_line"></div>
        <div class="contact">
          <h5>CONTACT</h5>
          <p>
            Tel: 123-456-7890 <br />

            Fax: 123-456-7890 <br />

            Email: info@mysite.com
          </p>
        </div>
        <div class="vertical_line"></div>
        <div class="opening">
          <h5>OPENING HOURS</h5>
          <p>
            Mon-Thurs: 9:00am-8:00pm <br />

            Fri: 9:00am-8:00pm <br />

            Sunday - 9:00am-3:00pm
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
      