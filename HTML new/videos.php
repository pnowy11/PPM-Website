<?php
include("config.php");
?>
<!doctype html>
<html>
<head>
    <title>Vidoes from database</title>
</head>
<body>
<div>

    <?php
    $fetchVideos = mysqli_query($con, "SELECT * FROM videos ORDER BY video_id DESC");
    while($row = mysqli_fetch_assoc($fetchVideos)){
        $location = $row['video_Path'];
        $name = $row['video_Name'];
        echo "<div style='float: left; margin-right: 5px;'>
          <video src='".$location."' controls width='320px' height='320px' ></video>     
          <br>
          <span>".$name."</span>
       </div>";
    }
    ?>

</div>

</body>
</html>