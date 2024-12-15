<?php
    $sql_slider="SELECT * FROM slider ";
    $result=$con->query($sql_slider);
?>
<div class="header">
    <div class="container-fluid">
        <div class="row">                    
            <div class="col-md-8">
                <div class="header-slider normal-slider">
                    <?php
                        if($result->num_rows>0)
                        while($row_slider=$result->fetch_assoc())
                    { 
                    ?>
                    <div class="header-slider-item">
                        <img src="img/<?php echo $row_slider['sliderimage']?>" alt="Slider Image" style="width: 100%; height: 400px;" />
                        <div class="header-slider-caption">
                            <p><?php echo $row_slider['slidercaption'] ?></p>
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