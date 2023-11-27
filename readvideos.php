<?php
include("./confing.php")



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Kaushan+Script&family=Marhey:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;0,700;0,800;1,400;1,600;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;700&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Tajawal:wght@200;300;400;500;700;800;900&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <title>Videotek الصفحة الرئسية</title>
</head>

<body>
    <div class="text-center logo">
        <img src="./imgs/download.png" alt="" width="20%">
    </div>
    <div class="container">
        <div class="video-app">
            <?php
            $fatchallvideos = "SELECT * FROM videos ORDER BY ID DESC";
            $result = mysqli_query($conn, $fatchallvideos);
            while ($row = mysqli_fetch_assoc($result)) {
                $location = $row['location'];
                $supject = $row['subject'];
                $description = $row['title'];
                echo "
            <div class='video'>
                <video class='video-player' src='$location' />
                <div class='video-footer'>
                    <div class='footer-text col-8'>
                        <h2 class='video-h'>$supject</h2>
                        <p class='video-p'>$description</p>
                    </div>
                    <img src='./imgs/music.png' width='50px' alt='' class='img-play'>
                </div>
                <a href='upload.php' class='img-mark'>
                    <img src='./imgs/uplode.png' width='40px' alt=''>
                </a>
            </div>
            ";
            };
            ?>
        </div>
    </div>

    <script>
        function playPauseVideo() {
            const videos = document.querySelectorAll('video');
            for (const video of videos) {
                video.addEventListener('click', function() {
                    if (video.paused) {
                        this.play();
                    } else {
                        this.pause();
                    }
                })
            }
        }
        playPauseVideo();
        // let videos = document.querySelectorAll('video');
        // let videoviewport= document.querySelectorAll('.video-app');
        // for (const video of videos) {
        //     const observerOptions = {
        //         root: null, // or the specific element you want to observe
        //         rootMargin:'-20px 0px -20px 0px',
        //         threshold: 0.0 // default is 0.0
        //     };
        //     const callback = (entries) => {
        //         entries.forEach((entry) => {
        //             if (entry.isIntersecting) {
        //                 entry.target.play();
        //             } else {
        //                 entry.target.pause();
        //             }
        //         }, observerOptions);
        //     };
        //     const observer = new IntersectionObserver(callback);
        //     observer.observe(video);
        // }
    </script>
</body>

</html>