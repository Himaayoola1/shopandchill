<?php
include_once('nav.php');

?>
<?php
include_once('class/productclass.php');
      ?>
<div class="container">
<h3><b>Cart Content</b></h3>
<hr>
<div class="row">
<div class="col-md">Products</div>
<div class="col-md">Quantity</div>
<div class="col-md">Price</div>
<div class="col-md">Check</div>
</div>

<?php

if (!empty($_SESSION["myuserid"])){      
        $id=$_SESSION["myuserid"];
        
        //var_dump($userid);
      }
      $cartitem = new Product;
$cartitems = $cartitem->fetchAllfromcart($id);

// echo '<pre>';
// print_r($cartitems);
// echo '</pre>';  
?>
<div class="row wrapper">
<?php
foreach ($cartitems as $key => $value) {
      $cartid=$value['cart_id'];
?>
<div class="col-md-3">
<img src="picturefolder/<?php echo $value['product_image']; ?>" class="img-small" style="height:100px; width:100px">
<h5 style="color: gold;"><?php echo $value['product_name']?></h5>

</div>
<div class="col-md-3">
<input type="number" name="qty" id="quantity" value="<?php echo $value['quantity'];?>" class="mt-5 qty" readonly >
</div>
<div class="col-md-3">
<input type="text" name="price" class="mt-5 price" value="<?php echo $value['product_price']?>" readonly>
</div>
<div class="col-md-3 mt-5" name="totalprice">
<?php
$price= $value['product_price'];
$quantity= $value['quantity'];
$sum=$price*$quantity;
echo $sum;
$transref="CH".rand().time();

?>
</div>
<div class='row'>
     <div class="col">
     <a href="customerdeletecart.php?id=<?php echo $cartid;?>" class="btn btn-danger btn-sm">
          <i class ='fa fa-trash' ></i>Delete</a>
     </div>
</div>
<hr>
<?php }?>
</div>
<?php $cartitem = new Product;
$cartsums = $cartitem->sumallPrice($id);   
$cartquantity = $cartitem->sumallQuantity($id);
$email=$cartitem->getEmail($id);
?>
      <p> Total Quantity = <?php echo $cartquantity;  ?></p>
      <div class="alert alert-dark text-center" style="font-weight:bold;"> Total Price = <?php echo $cartsums; ?></div>


<div class='row'>
      <div class='col'>

       <form action="paystacktransaction.php" method="post">
    <input type="hidden" name="total_amount" value="<?php echo $cartsums; ?>">
    <input type="hidden" name="userid" value="<?php echo $id; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="vendor_id" value="<?php echo $vendor; ?>">
    <input type="hidden" name="transref" value="<?php echo $transref; ?>">
 <button type="submit"   name="submit" class="btn btn-primary mb-2">Order Products Now</button>
</form>
      </div>
</div>
</div>

<?php
include_once('footer.php');
      ?>