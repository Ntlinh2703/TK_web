
<?php
if(isset($_POST['btnsearch']))
    $tukhoa=$_POST['txtsearch'];
    
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item">Kết quả tìm kiếm</li>            
        </ul>
    </div>
</div>
        
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    <?php
                    if(isset($_GET['sapxep'])) // ktra t.so
                        $sapxep=$_GET['sapxep'];
                    else
                        $sapxep='';
                    switch ($sapxep){
                        default:
                            $sql="SELECT *FROM product WHERE productname like '%$tukhoa%' ORDER BY productid DESC"; //dùng hàm sql để truy vấn theo id sp
                            break;
                    }
                    
                    $result=$con->query($sql);
                    
                        if($result->num_rows>0)
                        while($row=$result->fetch_assoc())
                        { 
                    ?> 
                    <div class="col-md-4">
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
                                <h3><?php echo $row['price']?></h3>
                                <a class="btn" href="">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>           
        </div>
    </div>
</div>
