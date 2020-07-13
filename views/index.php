<?php 
  session_start();
  include_once '../controllers/UserController.php';
?>
<?php include_once '../controllers/UserController.php'?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/css/indexStyle.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />
   
    <title>The Nails Salon</title>
  </head>
  <body>
  <div class="wrapper">
    <?php
    if(isset($_SESSION['name'])){
        if($_SESSION['is_admin']== 1){
          echo '
          <div class="is_admin">
              <a href="adminForm.php">Administration</a>
          </div>';
        }    
      }
      ?>
      <div class="header">
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
        <div class="social_media">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-pinterest-p"></i>
        </div>
        <div class="welcome">
        <div class="slidercontainer">  
          <div class="showSlide fade">  
            <img src="../static/img/foto3.jpg" alt="nails" />
          </div> 

          <div class="showSlide fade">  
            <img src="../static/img/foto1.jpg" alt="nails" /> 
          </div>  

          <div class="showSlide fade">  
            <img src="../static/img/foto2.jpg" alt="nails" />  
          </div>  

          <div class="showSlide fade">  
            <img src="../static/img/foto4.jpg" alt="nails" />  
          </div>  

          <a class="left" onclick="nextSlide(-1)">❮</a>  
          <a class="right" onclick="nextSlide(1)">❯</a>  
        </div>  
          <div class="welcome_content">
            <h4>WELCOME TO</h4>
            <br />
            <h1>The Nails Salon</h1>
            <br />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
              fugit minus expedita, rerum minima libero quidem. Excepturi
              aliquid quibusdam, in mollitia incidunt voluptatibus numquam
              deserunt accusantium blanditiis alias modi error?
            </p>
          </div>
        </div>
      </div>
      <div class="treatments">
        <div class="treatments_content">
          <h3>OUR TREATMENS</h3>
          <div class="mani_pedi">
            <h1>
              Manicure / Pedicure
            </h1>

            <img src="../static/img/FINAL1.jpg" alt="foto" />
          </div>
          <div class="nail_polish">
            <h1>Nail Polish</h1>
            <img src="../static/img/FINAL2.jpg" alt="foto" />
          </div>
          <div class="nail_art">
            <h1>Nail Art</h1>
            <img src="../static/img/FINAL3.jpg" alt="foto" />
          </div>
        </div>
      </div>
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
    <script>
      var slide_index = 1;
      displaySlides(slide_index);
      function nextSlide(n) {
        displaySlides((slide_index += n));
      }
      function currentSlide(n) {
        displaySlides((slide_index = n));
      }
      function displaySlides(n) {
        var i;
        var slides = document.getElementsByClassName("showSlide");
        if (n > slides.length) {
          slide_index = 1;
        }
        if (n < 1) {
          slide_index = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slides[slide_index - 1].style.display = "block";
      }
    </script>
  </body>
</html>
