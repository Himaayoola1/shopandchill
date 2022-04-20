<?php
        include_once('nav.php');
        include_once('class/productclass.php');
        if(isset ($_SESSION['myuserid'])){
          $userid=$_SESSION['myuserid'];
        }
            ?>
               <?php
      $productid = $_GET['id'];
      $prod = new Product;
      $result= $prod->selectSingleProduct($productid);
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(!empty($_POST['quantity'])){
      $sendOrders=$prod->customerOrder($_POST['productid'],$_POST['custid'],$_POST['quantity'], $_POST['vendor']);
      $results= $prod->insertCart($_POST['productid'],$_POST['custid'],$_POST['quantity'],$_POST['vendor']);
      if($result==true){
          echo"<div class='alert alert-success'>Item Added to Cart Successfully</div>";
      }
      
    }else{ 
        echo"<div class='alert alert-danger'>Kindly Input A Quantity</div>";
      }
      }
            ?>
    <div class="row">
<?php foreach($result as $key =>$value){  ?>
    <div class="col-md-6 col-xl-3 mt-2 mb-3">
    <div class="card" style="width:16rem;">
    <?php $image =$value['product_image'];
            echo "<img src='picturefolder/$image' alt='$image'  style='width:!6rem; height:12rem; class='img-fluid' '>";?>
            <div class="card-body">
              
                <?php $productname = $value['product_name']; 
                      $productprice = $value['product_price'];
                      $productdesc=$value['product_description'];
                      $vendor = $value['vendor_id'];
                ?>
                <form action="" method="post">
                 <span><?php echo $productname  ?></span><br>
                <span><?php echo $productprice  ?></span><br>
                <span><?php echo $productdesc  ?></span><br>
                 <input type="hidden" name="price" value="<?php echo $value['product_price']?>">
                <input type="hidden" name="productid" value="<?php echo $value['product_id'] ?>">
                <input type="hidden" name="vendor" value="<?php echo $value['vendor_id'] ?>">
                <input type="hidden" name="custid" value="<?php echo $userid;?>">
                <button type="button" class="btn btn-danger" onclick="decrement(this)">-</button>
                <input type="number" name="quantity" min=0 style="width:80px;">
                <button type="button" class="btn btn-primary" onclick="increment(this)">+</button>

               <button type='submit'  class="btnAddCartItem btn btn-primary">Add to Cart</button>
                </form>
            </div>
    </div>
</div>  
 
      <?php }   ?>
</div>
  

<script src="jquery/jquery.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" language="javascript">



    function increment(element){
        element.previousElementSibling.stepUp();
    }
    function decrement(element){
        element.nextElementSibling.stepDown();
    }
            //     $('.btnAddCartItem').click(function(){
            //         var prdid =$(this).attr('data-productid');
            //         var price =$(this).attr('data-productprice');
            //         var name =$(this).attr('data-productname');
            //         alert(price);
            //     });

            // });



</script>
 <?php
        include_once('footer.php');
   ?>