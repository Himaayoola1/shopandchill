<?php
    include_once('adminnav.php');

    
    include_once('class/productclass.php');
    // object of class product
    $productex = new Product;
    			?>
<!-- Page Content -->
<div class="container-fluid">

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">
  <small>Add Product</small>
</h1>
<div style='text-align:left;'>
  <a class='btn btn-primary mb-4' href="productlist.php">View Product List</a>
  
  </div>
<?php   
if($_SERVER['REQUEST_METHOD']== 'POST'){

  $productcategory=strip_tags(trim($_POST['productcat']));
  $productname=strip_tags(trim($_POST['productname']));
  $productdescription=strip_tags(trim($_POST['desc']));
  $productprice=strip_tags(trim($_POST['price']));
  $vendor=strip_tags(trim($_POST['vendor']));
  $productquantity=strip_tags(trim($_POST['quantity']));
   
    //validation
    $errors = array();
    if(empty($productcategory)){
        $errors['errproductcat']="Product Category Field is Required";
    }
    if(empty($productname)){
        $errors['errproductname']="Product Name Field is Required";
    }
    if(empty($productdescription)){
        $errors['errdesc']="Product Description Field is Required";
    }
    if(empty($productprice)){
        $errors['errprice']="Product Price Field is Required";
    }
    if(empty($_POST['vendor'])){
        $errors['errvendor']="Product Vendor Field is Required";
    }
    if(empty($_FILES['pimage'])){
        $errors['errpimage']="Product Image Field is Required";
    }
    if(empty($productquantity)){
        $errors['errquantity']="Product Quantity is Required";
    }



    //insert into product 
    if(empty($errors)){
        $output = $productex->addProduct($productcategory, $productname,$productdescription,$productprice,$_POST['vendor'],$productquantity);
          
        if($output == true){
        	
          //redirect to list product.php
          $message = "1";
          header("Location: productlist.php?msg=$message");
          exit;
        }else{
          echo"<div class='alert alert-danger'>Oops, could not add Product details </div>";
        }

    }
}

?>


<div class="row">
  <div class="col-lg-8 mb-4">

    <form name="productform" id="productform" action='' method="post" enctype="multipart/form-data">
      <div class="control-group form-group">
        <div class="controls">
          <label class="label"> Product Category:</label>
          <select class="form-control" id='category' name='productcat'>
          <option value="">Select Category</option>
                <?php
                //make reference to getProductCategory()
                $category = $productex->getProductcategory();
                    foreach ($category as $key => $value) {
                        $categoryid = $value['productcategory_id'];
                        $categoryname =$value['productcategory_name'];
                        echo"<option value='$categoryid'>$categoryname</option>";
                    }

                   ?>

          </select>
          	<?php
        if(isset($errors['errproductcat'])){
              echo"<p class='alert alert-danger'>".$errors['errproductcat']."</p>";
          }

            ?>
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label class="label">Product Name:</label>
          <input type="text" class="form-control" id="name" name='productname' 
          value='<?php if(isset($_POST['productname'])){echo $_POST['productname'];
          }?>'>
          <?php
          if(isset($errors['errproductname'])){
              echo"<p class='alert alert-danger'>".$errors['errproductname']."</p>";
          }

            ?>
        </div>
        
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label class="label">Product description:</label>
          <textarea class="form-control" id="productdesc" name="desc" value='<?php if(isset($_POST['desc'])){echo $_POST['desc'];}?>'></textarea>
        </div>
        <?php
        if(isset($errors['errdesc'])){
              echo"<p class='alert alert-danger'>".$errors['errdesc']."</p>";
          }

            ?>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label class="label">Product Price:</label>
          <select class="form-control" id="productprice" name='price'>
              <option value="">Select Price</option>
                <?php
                    for($prices =1000; $prices<=10000; $prices+=1000){
                        ?>
                       <option value='<?php echo $prices;?>'<?php if(isset($_POST['price'])
                       && $_POST['price'] == $prices){echo"selected";}  ?>><?php echo $prices; ?></option>";
                       <?php
                    }

                    ?>

          </select>
        </div>
        
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label class="label"> Product Vendor:</label>
          <select class="form-control" id='productvendor' name='vendor'>
          <option value="">Select Vendor</option>
                <?php
                //make reference to getVendor()
                $vendors = $productex->getVendor();
                    foreach ($vendors as $key => $value) {
                        $vendorid = $value['vendor_id'];
                        $vendorname =$value['vendor_name'];
                        echo"<option value='$vendorid'>$vendorname</option>";
                    }

                   ?>

          </select>
          	<?php
        if(isset($errors['errvendor'])){
              echo"<p class='alert alert-danger'>".$errors['errvendor']."</p>";
          }
            ?>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label class="label">Product Image</label>
          <input type="file"  class="form-control" name='pimage' id="productImage">
        </div>
        <?php
        if(isset($errors['errpimage'])){
              echo"<p class='alert alert-danger'>".$errors['errpimage']."</p>";
          }
            ?>
      </div>
      <div class="controls">
          <label class="label">Product Quantity:</label>
          <select class="form-control" id="productquantity" name='quantity'>
              <option value="">Select Quantity</option>
                <?php
                    for($quantities =1; $quantities<=20; $quantities+=1){
                        ?>
                       <option value='<?php echo $quantities;?>'<?php if(isset($_POST['quantity'])
                       && $_POST['quantity'] == $quantities){echo"selected";}  ?>><?php echo $quantities; ?></option>";
                       <?php
                    }

                    ?>

         <input type="submit" class="btn btn-primary mt-2" id="productButton" value="Add Product">

          </select>
        </div>
       
      
    </form>
  </div>


</div>
<!-- /.container -->
<?php
    include_once('adminfooter.php');
    ?>