<?php include_once('nav.php'); 
include_once('class/customer.php');
  ?>
  <?php
$id=$_GET['id'];
$viewprofile = new Customer;
$myprofile = $viewprofile -> singleCustomer($id);
?>
<h2><i class="fa-solid fa-user"></i>My Profile</h2>
<div class="container">
	<div class="row ms-4 mt-5 mb-1">
<div class="card card me-5 " style="width: 18rem ;">
  <div class="card-body text-primary">
    <h5 class="card-title ">Name</h5>
    <p class="card-text"><span class="profile mt-2">  Firstname: <?php echo $myprofile['customer_firstname'];  ?></span> <br></p>
	<p class="card-text"><span class="profile mt-2">  Lastname:  <?php echo $myprofile['customer_lastname'];  ?></span> <br></p>
  </div>
</div>
<div class="card card me-5" style="width: 18rem;">
  <div class="card-body text-primary">
    <h5 class="card-title"><i class="fa-solid fa-envelope"></i>Email</h5>
    <p class="card-text"><span class="profile mt-2">  Email: <?php echo $myprofile['customer_email'];?></span> <br>
  </div>
</div>
<div class="card me-5" style="width: 18rem;">
  <div class="card-body text-primary">
    <h5 class="card-title"><i class="fa-solid fa-address-card"></i>Contact Me</h5>
    <p class="card-text"><span class="profile mt-2"> Contact Address: <?php echo $myprofile['customer_address'];?></span> <br>
					<span class="profile mt-2">Phone Number: <?php echo $myprofile['customer_phonenumber'];?></span> <br></p>
  </div>
</div>

	</div>
	
</div>








<?php include_once('footer.php');   ?>