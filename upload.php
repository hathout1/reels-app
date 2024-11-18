<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
    <?php
    include('config.php');
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (isset($_POST['desc'])) {
        $desc = $_POST['desc'];
    }
    if (isset($_POST['upload'])) {
        $maxsize = 5242880;
        $name = $_FILES['vid']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . $name;
        $video_exten = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $exten_arr = ["mp4", "avi", "mpeg"];
        if (in_array($video_exten, $exten_arr)) {
            if (($_FILES['vid']['size'] >= $maxsize) || ($_FILES['vid']['size'] == 0)) {
                echo "<center><h3 class = 'fail'> Upload Failed : Video Must Be Less Than 5MB </h3></center>";
            } else {
                move_uploaded_file($_FILES['vid']['tmp_name'], $target_file);
                $insert = "INSERT INTO `reel`(`name`,`location`,`title`,`description`) VALUES('$name','$target_file','$title','$desc')";
                $sql = mysqli_query($con, $insert);
                echo "<center><h3 class = 'success'> Successful Upload</h3></center>";
            }
        }
    }
    ?>
</head>

<body>

    <div class="container">
        <center>
            <img src="images/logo.png" alt="logo">
        </center>
        <div class="form">
            <form method="POST" enctype="multipart/form-data">
                <label for="title">Video's Title</label>
                <input type="text" name="title" id="title">
                <label for="desc">Video's Description</label>
                <input type="text" name="desc" id="desc">
                <label for="vid" class="upload-label">Locate The Video</label>
                <input type="file" name="vid" id="vid" style="display: none;">
                <input type="submit" value="Upload" name="upload">
                <a href="interface.php">Home</a>
            </form>
        </div>
    </div>
</body>

</html>