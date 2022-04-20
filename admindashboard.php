

<?php 

include_once('adminnav.php');

     
 ?>
 <div style='text-align:left;'>  
  </div>
 	<div class="container-fluid">
 		<div class="row">
 		<!--card begin here	-->
  <div class="col-md-5 ms-2 mt-30">
    <div class="card">
      <div class="card-body">
      <div> <i class="fa fa-shopping-bag" style="font-size:48px;color:red"></i></div>
        <h5 class="card-title mt-2"> Product Category</h5>
        <p class="card-text">Four Categories are Presently Available</p>
        <a href="#" class="btn btn-primary"> Edit Product Category</a>
      </div>
    </div>
  </div>
  <div class="col-md-5 ms-2 mt-30">
    <div class="card">
      <div class="card-body">
      <div> <i class="fa fa-shopping-bag" style="font-size:48px;color:blue"></i></div>
        <h5 class="card-title mt-2">Product Details</h5>
        <p class="card-text"> Product Details Can be Reviewed Below</p>
        <a href="addproduct.php" class="btn btn-primary">Add Product Details</a>
      </div>
    </div>
  </div>
  	<!--card ends here	-->
</div>
<div class="row">
 		<!--card begin here	-->
  <div class="col-md-5 ms-2 mt-5 mb-3">
    <div class="card">
      <div class="card-body">
      <div> <i class="fa fa-shopping-bag" style="font-size:48px;color:black"></i></div>
        <h5 class="card-title mt-2"> Order Details</h5>
        <p class="card-text">All Order Details can be viewed Below</p>
        <a href="adminorderlist.php" class="btn btn-primary">View Order Details</a>
      </div>
    </div>
  </div>
  <div class="col-md-5 ms-2 mt-5 mb-3 ">
    <div class="card">
      <div class="card-body">
      <div><i class="fa fa-shopping-bag" style="font-size:48px;color:orange"></i></div>
        <h5 class="card-title mt-2">Payment</h5>
        <p class="card-text"> Payment Details can be adjusted below</p>
        <a href="#" class="btn btn-primary"> Edit Payment Details</a>
      </div>
    </div>
  </div>
  	<!--card ends here -->
</div>

 	</div>

 	<?php 
 	include_once('adminfooter.php');
 	 ?>