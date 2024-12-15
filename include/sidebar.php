<?php
    $sql_category="select * from category  order by categoryid desc";
    $result1=$con->query($sql_category);
?>    
<div class="col-lg-4 sidebar">
    <div class="sidebar-widget category">        
        <nav class="navbar bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav-item ">
                        <h2 class="title">Danh mục sản phẩm</h2>
                    </div>                                  
                </li>
                <?php
                        if($result1->num_rows>0)
                        while($row_category=$result1->fetch_assoc())
                        { 
                            $sql_minicategory="select * from minicategory  where categoryid='" .$row_category['categoryid'] ."'";
                            $result2=$con->query($sql_minicategory);                 
                ?>
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a href=<?php echo '"?quanly=danhmuc&id=' .$row_category['categoryid'] .'.php"'?> class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $row_category['categoryname'] ?></a>
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
                </li>
                <?php
                    }
                ?>                               
            </ul>
        </nav>
    </div>  
     <?php
            $sql="select * from minicategory";
            $result=$con->query($sql);
        ?> 
    <div class="sidebar-widget widget-slider">
        <div class="sidebar-slider normal-slider">
        <?php
            
            if($result->num_rows>0)
            while($row=$result->fetch_assoc())
        { 
        ?> 
            <div class="product-item">
                <div class="product-title">
                    <a href="?quanly=danhmuc&id=<?php echo $row['miniid']?>"><?php echo $row['mininame']?></a>
                </div>
                <div class="product-image">
                    <a href="?quanly=danhmuc&id=<?php echo $row['miniid']?>">
                        <img src="img/<?php echo $row['miniimage'] ?>" alt="Mini Category Image">
                    </a>
                    <div class="product-action">                        
                        <a class="btn" style=" width: 75pt;" href="?quanly=danhmuc&id=<?php echo $row['miniid']?>">Xem thêm</a>
                    </div>
                </div>                
            </div> 
         <?php                            
        }
        ?>                                
        </div>
    </div>
</div>
