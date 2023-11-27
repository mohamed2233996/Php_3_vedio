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
    <title>Videotek upload</title>
    <?php
    include("./confing.php");

    $subject ='';
    $description ='';
    if(isset($_POST['subject'])){
        $subject=$_POST['subject'];
    };
    
    if(isset($_POST['description'])){
        $description=$_POST['description'];
    };
    
    if(isset($_POST["btn-upload"])){
        $maxsize= 5242880 ;
        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir.$_FILES['file']['name'];
        $location = "videos/".$_FILES['file']['name'];
        $uploadOk = 1;
        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extenstion_arr= array("mp4", "mpeg","avi","3gp");

    if (in_array($videoFileType, $extenstion_arr)) {
        if ($_FILES['file']['size'] >= $maxsize) {
            echo("<p class='text-danger p-fromphp'>حجم الملف كبير جدا يجب ان يكون حجم الملف اقل من 5 ميجا بايت</p>");
        }else{
            if (move_uploaded_file($_FILES['file']['tmp_name'],$target_file)) {
                $query= "INSERT INTO videos (Name,location,subject,title) VALUES ('".$name."','".$location ."','$subject' ,'$description')";
                mysqli_query($conn ,$query);
                echo("<h3 class='text-success fromphp'>تم الرفع بنجاح</h3>");
                };
            };
        }else{
            echo "<p class='text-danger p-fromphp'>رجاء قم بتحديد فديو</p>";
        };
    };


    ?>
</head>

<body>
    <div class="text-center logo">
        <img src="./imgs/download.png" alt="" width="20%">
    </div>
    <div class="container upload">
        <img src="./imgs/download.png" alt="">
        <form method="post" enctype="multipart/form-data">
            <input type="file" id="file" name="file" multiple accept=".mp4,.mkv,.avi,.mov,.
                wmv,.flv,.webm,.3gp,.mpeg,.ogg,.ogv,.ts,.flac,.aac" 
            required>
            <br />
            <input type="text" name="subject" id="subject" placeholder="عنوان الفديو" >
            <input type="text" name="description" id="description" placeholder="وصف للفيديو" >
            <button type="submit" class="btn btn-primary mt-5" name="btn-upload">رفع الفيديو</button>
        </form>
        <a href="./readvideos.php" class="linko">الرجوع للتطبيق</a>
    </div>
</body>

</html>