
<!-- brand -->
<?php
include("include/brand.php");
?>

<!-- dich vu -->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Thanh toán nhanh chóng</h2>                    
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Giao hàng mọi nơi</h2>                    
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>Đổi trả dễ đàng</h2>                    
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>Giải đáp thắc mắc </h2>                    
                </div>
            </div>
        </div>
    </div>
</div>     

<?php
$sql="SELECT *FROM product  ORDER BY productid DESC";
$result=$con->query($sql);
?>

<!-- feature -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Sản phẩm nổi bật</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">   
             <?php                           
                // đk: có sản phẩm
                if($result->num_rows>0)
                while($row=$result->fetch_assoc())  // có thể giảm bớt phần truy vấn echo theo từng hàng(id, name,...)
                { 
            ?>          
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">                                        
                        <a href="?quanly=chitietsp&id=<?php echo $row['productid'] ?>"><?php echo $row['productname'] ?></a>
                    </div>
                    <div class="product-image">
                        <a href="?quanly=chitietsp&id=<?php echo $row['productid']?>">
                            <img src="img/<?php echo $row['images'] ?>" alt="Product Image">
                        </a>
                    </div>
                    <div class="product-price">
                        <h3><?php echo $row['price']?><span>vnđ</span></h3>
                        <form action="giohang.php" method="POST" >
                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row ['productname'] ?>">
                        <input type="hidden" name ="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row ['price'] ?>">
                        <input type="hidden" name="images" value="<?php echo $row ['images'] ?>"/>                                            
                        <input type="submit" class="btn" value="Thêm vào giỏ hàng"/>
                    </fieldset>
                    </form>  
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<?php
    $sql="SELECT *FROM product  ORDER BY productid ASC";
    $result=$con->query($sql);
?>

<!-- recent -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
             <h1>Sản phẩm gần đây</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">   
            <?php                           
                if($result->num_rows>0)
                while($row=$result->fetch_assoc())
                { 
            ?>          
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">                                        
                        <a href="?quanly=chitietsp&id=<?php echo $row['productid'] ?>"><?php echo $row['productname'] ?></a>
                    </div>
                    <div class="product-image">
                        <a href="?quanly=chitietsp&id=<?php echo $row['productid']?>">
                            <img src="img/<?php echo $row['images'] ?>" alt="Product Image">
                        </a>
                    </div>
                    <div class="product-price">
                        <h3><?php echo $row['price']?><span>vnđ</span></h3>
                     <div class="action">                                            
                    <form action="giohang.php" method="POST" >
                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row ['productname'] ?>">
                        <input type="hidden" name ="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row ['price'] ?>">
                        <input type="hidden" name="images" value="<?php echo $row ['images'] ?>"/>                                            
                        <input type="submit" class="btn" value="Thêm vào giỏ hàng"/>
                    </fieldset>
                    </form>                           
                    </div>                                       
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- giới thiệu -->
 <div class="gioithieu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Giới thiệu về Webbie</h1>
                <p><b><i>Chào mừng bạn đến với Webbie - địa điểm mua sắm trực tuyến hoàn hảo dành cho bạn!</i></b></p>
                <p>Webbie được xây dựng với sứ mệnh mang đến trải nghiệm mua sắm tiện lợi, nhanh chóng và chất lượng. Chúng tôi cung cấp đa dạng các sản phẩm, từ thời trang, mỹ phẩm, đồ gia dụng, đến các thiết bị công nghệ hiện đại, giúp bạn dễ dàng tìm thấy mọi thứ mình cần.</p>
                <ul>
                    <li><b>Sản phẩm chất lượng:</b> Mọi sản phẩm đều được chọn lọc kỹ lưỡng từ các nhà cung cấp uy tín.</li>
                    <li><b>Thanh toán thuận tiện:</b> Khách hàng có thể dễ dàng lựa chọn hình thức thanh toán dễ dàng và nhanh chóng.</li>
                    <li><b>Dịch vụ tận tâm:</b> Đội ngũ hỗ trợ luôn sẵn sàng giải đáp mọi thắc mắc và hỗ trợ bạn 24/7.</li>
                    <li><b>Giao hàng mọi nơi:</b> Chúng tôi giao hàng mọi nơi và giao tận tay khách hàng.</li>
                </ul>
            </div>
        </div>
    </div>
 </div>

 <!-- dki mail -->
<div class="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Đăng kí nhận thông báo mới</h1>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <input type="email" value="Nhập email của bạn">
                    <button style=" padding: 5pt;" >Nhận!</button>
                </div>
            </div>
        </div>
    </div>
</div>
