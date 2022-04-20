<?php
    include_once('adminnav.php');
        ?>
<div class="container-fluid text-light" style='min-height:500px'>

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Admin Dashboard
  <small>All Products</small>
</h1>


<!-- Content Row -->
<div class="row">
 
      <!-- Content Column -->
    <div class="col-lg-12 mb-4">
    <div style='text-align:right;'>
        <a class='btn btn-primary mb-4' href="addproduct.php">Add New Product</a>
      
    </div>
      <div id="maindiv">
          <table class="table table-striped table table-hover text-light">
        <thead>
                <tr>
                  
                  <th scope="col">Product Category</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Vendor</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Quantity</th>
                  <th scope="col">Action</th>

                </tr>
      </thead>
        <tbody>
          <?php
        include_once("class/productclass.php");
        //create instance of a product class
        $obj = new Product;
        //reference getProducts
        $kounter = 1;
        $products= $obj->getProducts();
      
            

        foreach ($products as $key => $value) {
            $id= $value['product_id'];
        ?>
        <tr>
            <td><?php echo$value['productcategory_id']?></td>
            <td><?php echo $value['product_name']?></td>
            <td><?php echo $value['product_description']?></td>
            <td><?php echo $value['product_price']?></td>
            <td><?php echo $value['vendor_id']?></td>
            <td>
              <img src='picturefolder/<?php echo $value['product_image'];?>' alt='picture' style="width:45px;">

            </td>
            <td><?php echo $value['product_quantity']?></td>
            <td>
          <a href= "#?id=<?php echo $id;?>" class="btn btn-primary btn-sm">
              <i class ='fa fa-edit' ></i>Edit</a>
          <a href= "#?id=<?php echo $id;?>" class="btn btn-primary btn-sm">
              <i class ='fa fa-trash' ></i>Delete</a>
          </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    </div>

      </div>
    </div>
    <!-- /.row -->

    </div>
<?php
    include_once('adminfooter.php');
        ?>
