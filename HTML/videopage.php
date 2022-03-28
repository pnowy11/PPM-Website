<?php
session_start();
include "config.php";
if(isset($_GET['Logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<html>
<title>Student Hub</title>
<link rel="stylesheet" type="text/css" href="style2.css"><!--brings in the style sheet although thats pretty obvious-->
<meta name="viewport" content="width=device-width, initial-scale=1"> <!--important for media queries-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<head>
<div class="header">

        <!-- LOGO CONTAINER -->
        <div class="container_logo">
            <img src="images/thumbnail.png" alt="zoom glass" height="60px" width="250px">
        </div>

        <!-- SEARCH BAR CONTAINER -->
        <div class="container_search">

            <div class="search_bar">
                <div class="search_img">
                    <img src="images/search.png" alt="zoom glass" height="40px">
                </div>

                <input type="text" placeholder="Search for an item..." name="search">
            </div>
        </div>

        <!--User details CONTAINER -->
        <div class="container_user">
            <P>Welcome, <?php if(isset($_SESSION['USERNAME'])){echo $_SESSION['USERNAME'];}
            else echo "User"?></P>

            <div class="user_img">
                <img src="images/user.png" alt="user icon" height="60px">
            </div>
        </div>


    </div>

    <!-- NAV BAR -->
    <div class="nav">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Liked</a></li>
                <li><a href="">catagories</a></li>
				<?php
                if(!empty($_SESSION["USERNAME"]))
                {
                    echo '<li><a href="index.php?Logout=" name="Logout" id="Logout">Logout</a></li>';

                }
                else
                {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
  </head>
<body>



<h1>*Video Title*</h1>

<div>
<video width="1000" height="600" controls>

  <source src="movie.mp4" type="video/mp4">
  
</video>
</div>

<h1>
Comments
</h1>
<br>
<div class="comments">
<p>Write a comment if you like the content!
<br>
<?php
                if(!empty($_SESSION["USERNAME"]))
                {
                    echo '<textarea style="height:170px;width:500px;font-size:14pt; id="COMMENTID" name="COMMENTS">Write a comment</textarea>';

                }
                else
                {
                    echo '<p>Please login to leave a comment!';
                }
                ?>
				<br>
<input style="height:30px;width:100px;" type="submit" value="Comment">
</div>

<h1>
Recommended
</h1>
<br>
<div class="styling">
<input type="image" id="img" height="110" width="190"  src="slideshow/img1.png" onclick="" onmouseover="mouseOver()">
<input type="image" id="img" height="110" width="190"  src="slideshow/img2.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img3.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img4.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img5.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img6.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img7.png" onclick="">
<input type="image" id="img" height="110" width="190"  src="slideshow/img8.png" onclick="">
</div>
<div class="content"></div>

</body>

<footer>
<p>Student Hub © 2022 All Rights Reserved
</footer>

</html>
