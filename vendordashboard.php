 <?php
  include_once('vendornav.php');
      ?>
   <!-- Icon Cards-->
   <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card o-hidden h-100">
              <div class="card-body">
                <div>
                 
                  <i class="fa fa-shopping-bag " style='font-size:48px; color:red;'></i>
                </div>
                <div class="mr-5">Edit and Delete Products</div>
              </div>
              <a class="card-footer text-dark clearfix small z-1" href="vendorlistproduct.php">
                <span class="float-left">Adjust Product</span>
                <span class="float-right">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-dark o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-shopping-bag " style='font-size:48px; color:blue;'></i>
                </div>
                <div class="mr-5">Add Products</div>
              </div>
              <a class="card-footer  text-dark clearfix small z-1" href="vendoraddproduct.php">
                <span class="float-left">Click to Add Products</span>
                <span class="float-right">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-dark o-hidden h-100">
              <div class="card-body">
                <div>
                  
                  <i class="fa fa-shopping-bag " style='font-size:48px; color:orange;'></i>
                </div>
                <div class="mr-5">List of Available Product</div>
              </div>
              <a class="card-footer text-dark clearfix small z-1" href="vendorproductlist.php">
                <span class="float-left">Product List</span>
                <span class="float-right">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-dark o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-shopping-bag " style='font-size:48px; color:black;'></i>
                </div>
                <div class="mr-5">All Orders</div>
              </div>
              <a class="card-footer text-dark clearfix small z-1" href="vendororderlist.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
	<!-- /.row -->
</div>
</div>
</div>
</div>

<?php
include_once('footer.php');
  ?>
