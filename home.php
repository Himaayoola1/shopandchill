<?php
include_once('nav.php');
        ?>
<?php include_once('class/productclass.php');

?>
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Shop at Your Comfort Zone</p>
                </div>
            </div>
</header>
     
<div class="row">
        <h2>Wears </h2>   
           <?php
      $cat = new Product;
      $result= $cat->displayImgCat(1);
      if(!empty($result)){ ?>
    <div class="row">
<?php foreach($result as $key =>$value){ 
    $id=$value['product_id'];
 ?>
    <div class="col-sm-12   col-md-3 mt-2 mb-3">
    <div class="card" style="width:16rem;">
    <?php $image =$value['product_image'];
            echo "<img src='picturefolder/$image' alt='$image'  style='width:!6rem; height:12rem; class='img-fluid' '>";?>
            <div class="card-body">
                <?php $productname = $value['product_name']; 
                      $productprice = $value['product_price']; 
                ?>
                <span><?php  echo $value['product_name'];  ?></span><br>
                <span><?php  echo $value['product_price']  ?></span><br>

                
                <button type='submit'  id='catone'  name='submit' class='btn btn-primary text-light'><a href="product.php?id=<?php echo $id; ?>" style='color:white; text-decoration: none;'> View Details</a></button>
                <button type='submit'  id='allbutton'  name='submit' class='btn btn-secondary text-light'><a href="category.php?id=1" style='color:white; text-decoration: none;'> View All</a></button>

            </div>
    </div>
</div>   
      <?php }   ?>
</div>
   <?php  } ?>

<!-- Category Two Starts Here--->
       <div class="row">
        <h2>House Hold Items</h2>   
           <?php
      $cat = new Product;
      $result= $cat->displayImgCat(2);
      if(!empty($result)){ ?>
    <div class="row">
<?php foreach($result as $key =>$value){
     $id=$value['product_id'];
    ?>
    <div class="col-sm-12   col-md-3 mt-2 mb-3">
    <div class="card" style="width:16rem;">
    <?php $image =$value['product_image'];
            echo "<img src='picturefolder/$image' alt='$image'  style='width:!6rem; height:12rem; class='img-fluid' '>";?>
            <div class="card-body">
                <?php $productname = $value['product_name']; 
                      $productprice = $value['product_price']; 
                ?>
                 <span><?php  echo $value['product_name'];  ?></span><br>
                <span><?php  echo $value['product_price']  ?></span><br>

                <button type='submit'  id='cattwo'  name='submit' class='btn btn-primary text-light'><a href="product.php?id=<?php echo $id; ?>" style='color:white; text-decoration: none;'> View Details</a></button>
                <button type='submit'  id='allbutton'  name='submit' class='btn btn-secondary text-light'><a href="category.php?id=2" style='color:white; text-decoration: none;'> View All</a></button>

            </div>
    </div>
</div>   
      <?php }   ?>
</div>
   <?php  } ?>

   <!-- Category Three Starts Here-->

       <div class="row">
        <h2>Gift Ideas</h2>   
           <?php
      $cat = new Product;
      $result= $cat->displayImgCat(3);
      if(!empty($result)){
          ?>
    <div class="row">
<?php foreach($result as $key =>$value){ 
     $id=$value['product_id']; ?>
    <div class="col-sm-12   col-md-3 mt-2 mb-3">
    <div class="card" style="width:16rem;">
    <?php $image =$value['product_image'];
            echo "<img src='picturefolder/$image' alt='$image'  style='width:!6rem; height:12rem; class='img-fluid' '>";?>
            <div class="card-body">
                <?php $productname = $value['product_name']; 
                
                      $productprice = $value['product_price']; 
                ?>
                <span><?php  echo $value['product_name'];  ?></span><br>
                <span><?php  echo $value['product_price']  ?></span><br>

                <button type='submit'  id='catthree'  name='submit' class='btn btn-primary text-light'><a href="product.php?id=<?php echo $id; ?>" style='color:white; text-decoration: none;'> View Details</a></button>
                <button type='submit'  id='allbutton'  name='submit' class='btn btn-secondary text-light'><a href="category.php?id=3" style='color:white; text-decoration: none;'> View All</a></button>

            </div>
    </div>
</div>   
      <?php }   ?>
</div>
   <?php  } ?>
<?php
include_once('footer.php');
        ?>