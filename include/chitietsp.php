<?php
if(isset($_GET['id'])) 
    $id=$_GET['id'];
else $id='';
$sql="SELECT *FROM product WHERE productid = '$id' ";
$result=$con->query($sql);
$row=$result->fetch_assoc()
?>

<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</a></li>
            <li class="breadcrumb-item active"><?php echo $row['productname']?></a></li>
        </ul>
    </div>
</div>
        
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="img/<?php echo $row['images'] ?>" alt="Product Image">                                   
                            </div>
                            <div class="product-slider-single-nav normal-slider">
                                <div class="slider-nav-img"><img src="img/<?php echo $row['images'] ?>" alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2><?php echo $row['productname']?></h2>
                                </div>
                                <div class="price">
                                    <h4>Giá:</h4>
                                    <p>
                                        <?php echo $row['price'] ?>
                                    </p>
                                </div>
                                <div class="quantity">
                                    <h4>Số lượng:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>                                        
                                    <div class="p-color">
                                        <h4>Màu sắc:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">Trắng </button>
                                            <button type="button" class="btn">Đen</button>
                                            <button type="button" class="btn">Đỏ</button>
                                        </div> 
                                    </div>
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
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                            </ul>

                            <div class="tab-content">
                                <div id="descriptions" class="container tab-pane active">
                                    <h4>Mô tả sản phẩm</h4>
                                    <p>
                                        <?php echo $row['descriptions'] ?>
                                    </p>
                                </div>                                  
                            </div>
                        </div>
                    </div>
                </div>  
                <?php
                include('include/sidebar.php');
                ?>                     
            </div>
        </div>
    </div>
</div>
