<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    include('config.php');
    $read = "SELECT * FROM `reel` ORDER BY `id` DESC";
    $sql = mysqli_query($con, $read);
    ?>
    <div class="app-reels">
        <?php while ($row = mysqli_fetch_array($sql)) : ?>
            <div class="reels">
                <video src="<?php echo $row['location'] ?>" class="reel-player"></video>
                <div class="footer">
                    <div class="text">
                        <h3>EL-BA4MOHANDES</h3>
                        <p class="title"><?php echo $row['title'] ?></p>
                        <div class="img-marq">
                            <a href="upload.php"><img src="images/upload.png" alt="upload pic" /></a>
                            <marquee> <?php echo $row['description'] ?></marquee>
                        </div>
                    </div>
                    <img src="images/play.png" alt="play pic" class="play-image" />
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const videos = document.querySelectorAll(".reel-player");

            videos.forEach((video) => {
                video.addEventListener("click", () => {
                    if (video.paused) {
                        video.play();
                    } else {
                        video.pause();
                    }
                });
            });
        });
    </script>
</body>

</html>