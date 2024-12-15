<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tài khoản của bạn</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
       
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- css -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <?php
    include("include/topbar.php");
    if(isset($_GET['quanly']))
        $quanly=$_GET['quanly'];
    else
        $quanly='';

    switch ($quanly) {
        case 'danhmuc':
            include("include/danhmuc.php");
            break;
    }
    ?>  

        <!-- Breadcrumb -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                </ul>
            </div>
        </div>
        
        <!-- My Account -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"></i>Phương thức thanh toán</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"></i>Địa chỉ</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"></i>Thông tin tài khoản</a>
                            <a class="nav-link" href="index.php"></i>Đăng xuất</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Phương thức thanh toán </h4>
                                <p>
                                    Chọn phương thức
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Thông tin giao hàng</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Địa chỉ: 55, Nguyễn Hoàng, Nam Từ Liêm, Hà Nội</p>
                                        <p>Số điện thoại: 0123456789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Chi tiết tài khoản</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        include("include/footer.php");
        ?>
       
        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        
        <script src="js/main.js"></script>
    </body>
</html>
