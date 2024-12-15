<?php 
    include_once('db/connect.php');
?>

<?php
include("include/menu.php");
?>
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <!-- logo, gắn link vào logo -->
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo.jpg" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <!-- thanh tìm kiếm, icon -->
                <div class="search"> 
                    <form action="index.php?quanly=timkiem" method='POST'>
                        <input type="text" name="txtsearch"placeholder="Tìm kiếm tại đây... " required >
                        <button name="btnsearch" ><i class="fa fa-search" ></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <!-- giỏ hàng, icon  -->
                <div class="user">
                    <a href="giohang.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>