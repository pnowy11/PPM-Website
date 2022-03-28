<?php
session_start();
include "config.php";
if(!isset($_SESSION['USERNAME'])){
    header('Location: index.php');
}
if(isset($_POST['submit'])){
    $videoname = $_POST['filename'];
    $videodesc = $_POST['description'];
    $userid = $_SESSION['ID'];
    $maxsize = 5242880; // 5MB
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4","avi","mov","mpeg");

        // Check extension
        if( in_array($extension,$extensions_arr) ){

            // Check file size
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "File too large. File must be less than 5MB.";
            }else{
                // Upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "INSERT INTO videos(user_id,video_Name,video_Desc,video_Path) VALUES('".$userid."','".$videoname."','".$videodesc."','".$target_file."')";
                    mysqli_query($con,$query);
                    $_SESSION['message'] = "Upload successfully.";
                }
            }

        }else{
            $_SESSION['message'] = "Invalid file extension.";
        }
    }else{
        $_SESSION['message'] = "Please select a file.";
    }
    header('location: upload.php');
    exit;
}
?>








<html>
<head>
    <title>Upload a Video</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

</head>
<body>
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<div class="py-20 h-screen bg-gray-300 px-2">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <form class="w-full px-4 py-6" method="post" action="upload.php" enctype='multipart/form-data'>
            <div class="w-full px-4 py-6 ">
                <div class="mb-1"> <span class="text-sm">Full name</span> <input  required type="text" name="filename" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                <div class="mb-1"> <span class="text-sm">Description</span> <textarea rtype="text" name="description" class="h-24 py-1 px-3 w-full border-2 border-blue-400 rounded focus:outline-none focus:border-blue-600 resize-none"></textarea> </div>
                <div class="mb-1"> <span class="text-sm text-gray-400">You will be able to edit this information later</span> </div>
                <div class="mb-1"> <span>Attachments</span>
                    <div class="relative border-dotted h-32 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                        <div class="absolute">
                            <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-3x text-blue-700"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> </div>
                        </div> <input type="file" class="h-full w-full opacity-0" name="file" id="file">
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <input type="reset" class="ml-2 h-10 w-32 bg-red-600 rounded text-white hover:bg-red-700">
                    <input type="submit" name="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700"></div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
    document.getElementById("file").addEventListener("change", function () {
        var file = this.files[0];

        if (file) {
            var mbSize = file.size / 10245 / 10245;
            var fileIsMp4 = (file.type === "video/mp4");

            if (mbSize > 1) {
                alert("failure");
            }
            else if (!fileIsMp4)
            {
                alert("Invalid File Type Please upload MP4 File");
            }
            else{
                    alert("success");
                }
        }
    });
</script>