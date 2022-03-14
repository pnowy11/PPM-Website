<?php
include "config.php";

if(isset($_POST['Logout'])){
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sample HTML Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button">Video Streamers</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#projects" class="w3-bar-item w3-button">Live Stream</a>
      <a href="#about" class="w3-bar-item w3-button">About US</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact Us</a>
        <?php
        if(!empty($_SESSION["USERNAME"]))
        {
           echo '
                <form action="" method="post">
                <input type="submit" name="Logout" class="w3-bar-item w3-button" value="Logout">
                </form>';

        }
        else
        {
            echo '<a href="login.php" class="w3-bar-item w3-button">Login</a>';
        }
        ?>


    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image-small" src="playvideo.png" alt="Video" width="100%" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Play</b></span> <span class="w3-hide-small w3-text-light-grey">Video</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>This Webpage is a sample for our Project, of Video Streaming services. howevr, with progress of the project and its implemtnation, the exact design and flow will be given.
    </p>
  </div>

  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="person.png" alt="Bader" style="width:100%">
      <h3>Bader Almutairi</h3>
      <p class="w3-opacity">Team Manager</p>
      <p>Bader is Team Manager and will manage team during Project execution.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="person.png" alt="Sahil" style="width:100%">
      <h3>Sahil Shahzad</h3>
      <p class="w3-opacity">Developer</p>
      <p>Sahil is Developer and help in developing design for website.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="person.png" alt="Bilal" style="width:100%">
      <h3>Bilal Ejaz</h3>
      <p class="w3-opacity">Developer</p>
      <p>Bilal is dveloper and help in developing the back end coding of website.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="person.png" alt="Patryck" style="width:100%">
      <h3>Patryk Novac</h3>
      <p class="w3-opacity">Developer</p>
      <p>Patryk is developer and help in integrating and testing of website.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Feel free to contact us.</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>


<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">B-Almutairi</a></p>
</footer>

</body>
</html>
