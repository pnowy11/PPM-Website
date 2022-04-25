<?php
session_start();
include "config.php";

// Check user login or not
if(!isset($_SESSION['USERNAME'])){
    header('Location: index.php');
}

if (isset($_POST['post_comment'])) {

    $video_id = $_GET['id'];
    $name = $_SESSION['USERNAME'];
    $message = $_POST['message'];

    $sql = "INSERT INTO comment (video_id, username, comment)
		VALUES ('$video_id', '$name', '$message')";
    if ($con->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Comment System PHP | National Coding</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #222222;
            min-height: 100vh;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
        }

        .wrapper {
            background: white;
            border-radius: 10px;
            width: 500px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .wrapper .form input {
            background: #222222;
            color: white;
            font-size: 15px;
            width: 450px;
            border-radius: 20px;
            padding: 10px;
            border: none;
            outline: none;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .wrapper .form textarea {
            background: #222222;
            color: white;
            font-size: 15px;
            width: 450px;
            border-radius: 20px;
            padding: 10px;
            border: none;
            outline: none;
            resize: none;
        }

        .wrapper .form .btn {
            background: #222222;
            color: white;
            font-size: 15px;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px;
            width: 200px;
            border-radius: 20px;
            margin: 0 auto;
            display: block;
            margin-top: 5px;
            margin-bottom: 20px;
            opacity: 0.8;
            transition: 0.3s all ease;
        }

        .wrapper .form .btn:hover {
            opacity: 1;
        }

        .content {
            text-align: center;
            background: royalblue;
            color: white;
            padding: 10px;
            width: 500px;
            height: auto;
            border-radius: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .content p {
            margin-bottom: 15px;
            width: 450px;
        }</style>
</head>
<body>
<?php
$video_id = $_GET['id'];
$fetchVideos = mysqli_query($con, "SELECT * FROM videos where video_Id = '$video_id'");
while($row = mysqli_fetch_assoc($fetchVideos)){
    $location = $row['video_Path'];
    $name = $row['video_Name'];
    echo "
          <div style='margin-top: 1%'>
          <video src='".$location."' controls width='500px' height='200px' ></video>     
          <br>          
          <h2 style='text-align: center; color: white; margin-bottom: 5%; margin-top: auto;'>".$name."</h2>
           </div>
    ";
}?>
<div class="wrapper">

    <form action="" method="post" class="form">
<!--        <input type="text" class="name" name="name" placeholder="Name" disabled>-->
        <br>
        <textarea name="message" cols="30" rows="3" class="message" placeholder="Message"></textarea>
        <br>
        <button type="submit" class="btn" name="post_comment">Post Comment</button>
    </form>
</div>

<div class="content">
    <?php
    $sql = "SELECT * FROM comment where video_id = '$video_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>
            <i><u><h4 style=""><?php echo $row['username']; ?></h4></u></i>
            <div style="float:right;">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </div>
            <input type="text" disabled value="<?php echo $row['comment']; ?>" style="width: 80%; height: auto; "></input>
            <br><br>
            <?php

        } } ?>
</div>
</body>
</html>