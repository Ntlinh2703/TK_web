
<?php
    $sql_category="SELECT *FROM category ORDER BY categoryid DESC";
    $result=$con->query($sql_category);
?>                        
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                    
                    <?php
                        if($result->num_rows>0)
                        while($row_category=$result->fetch_assoc())
                        { 
                            $sql_minicategory="SELECT *FROM minicategory WHERE categoryid = '" .$row_category['categoryid']."'";
                            $result2=$con->query($sql_minicategory);                 
                    ?> 

                            <div class="navbar-nav ml-auto">
                                <div class="nav-item dropdown">  

                                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $row_category['categoryname'] ?></a>
                                        <div class="dropdown-menu">
                                            <?php                                                                                       
                                                while($row_minicategory=$result2->fetch_assoc())
                                                { 
                                            ?>
                                                <a href="?quanly=danhmuc&id=<?php echo $row_minicategory['miniid']?>" class="dropdown-item"><?php echo $row_minicategory['mininame'] ?></a>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                </div>
                            </div>
                    <?php 
                        }
                    ?>
                    </div>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Tài khoản</a>
                        <div class="dropdown-menu">
                            <a href="login.php" class="dropdown-item">Đăng nhập</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>                       