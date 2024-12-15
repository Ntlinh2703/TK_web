<!-- brand -->
<div class="brand">
    <div class="container-fluid">
        <h2>Một số thương hiệu liên kết</h2>
        <?php
            $sql="SELECT * FROM brand  ORDER BY brandid DESC";
            $result=$con->query($sql);
            if($result->num_rows>0)
            while($row=$result->fetch_assoc())
            { 
        ?>
        <div class="brand-item"><img src="img\<?php echo $row['brandimage']?>" alt="Brand Image"></div>
        <?php
            }
        ?>
    </div>
</div>