<?php
if(isset($_GET['id'])) 
    $id=$_GET['id'];
else $id='';

$sql="select * from category a join minicategory b on a.categoryid=b.categoryid where miniid='$id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
?>

<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item"><?php echo $row['categoryname']?></li>
            <li class="breadcrumb-item active"><?php echo $row['mininame']?></li>
        </ul>
    </div>
</div>

<?php
    if (!isset ($_GET["page"]) ) {
        $page = 1;
    } 
    else {
        $page = $_GET["page"];
    }
        $fields = 3; // số lượng sản phẩm trên 1 trang
        $x=($page-1)*$fields;    
        
        //truy vấn sql để lấy dữ liệu
        $sql="SELECT *FROM product a JOIN minicategory b 
                        ON a.miniid = b.miniid 
                        WHERE a.miniid ='$id' 
                        ORDER BY productid DESC"; //sắp xếp theo id tăng dần
        
        $result=$con->query($sql);            
        $num=ceil($result ->num_rows/$fields);
        
        // truy vấn sql để lấy dữ liệu
        $sql="SELECT *FROM product a JOIN minicategory b 
                        ON a.miniid = b.miniid 
                        WHERE a.miniid='$id' 
                        ORDER BY productid 
                        DESC LIMIT $fields  OFFSET $x"; //sắp xếp theo id tăng dần

        $result=$con ->query($sql);     
 ?>

<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">                                   
                    <?php                           
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
                                <h3><?php echo $row['price']?><span>vnđ</span></h3>
                                <form action="giohang.php" method="POST" >

                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row ['productname'] ?>">
                        <input type="hidden" name="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                        <input type="hidden" name="images" value="<?php echo $row['images'] ?>"/>                                            
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
                
                <!-- hiển thị phân trang -->
                <div class="col-md-12" style="margin-bottom: 0pt;">
                    <nav aria-label="Page navigation example">                        
                        <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Trước</a>
                            </li>
                        <?php 
                            $i=1;
                            while($i<=$num) {
                        ?>
                        <li class="page-item "><a class="page-link" href="?quanly=danhmuc&id=<?php echo $id ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                            $i=$i+1;
                            }
                        ?>
                        <li class="page-item">
                                <a class="page-link" href="#">Tiếp theo</a>
                            </li>
                        </ul>  
                    </nav>
                </div>
            </div>           
        <?php
        include('include/sidebar.php');
        ?>   
        </div>
    </div>
</div>
