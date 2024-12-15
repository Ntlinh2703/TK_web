<?php 
    include_once('db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Webbie</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="webbie" name="keywords">
        <meta content="webbie" name="description">

        <!-- Favicon -->
        <link href="img/icon.png" rel="icon">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
        
        <!-- CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">       <!-- slick cho slider, hiển thị sp -->
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>    
    
    <?php
    include("include/topbar.php");
    include("include/slider.php");
    if(isset($_GET['quanly']))
        $quanly=$_GET['quanly'];
    else
        $quanly='';

    switch ($quanly) {
        case 'danhmuc':
            include("include/danhmuc.php");
            break;
        case 'chitietsp':
            include("include/chitietsp.php");
            break;
        case 'timkiem':
            include("include/timkiem.php");
            break;
        case 'giohang':
            include("giohang.php");
            break;
        default:
            include("include/home.php");
            break;
    }
    include("include/footer.php");
    ?>  

    <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <script src="js/main.js"></script>

    </body>
</html>
