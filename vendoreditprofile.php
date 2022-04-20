<?php  include_once('nav.php');  ?>
        <div class="container">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
  
                    <h3 class="mb-4">Edit Profile</h3>
                                    <?php 
       include_once('class/customer.php');
       
  $myedit = new Customer;
       

$customer= $_SESSION['myfirstname']. " ".$_SESSION['mylastname'];
$cid=$_GET['id'];
$cusedit = $myedit->showAllCustomers($cid);


            
IF($_SERVER['REQUEST_METHOD']=='POST'){
 
  

  $firstname=strip_tags(trim($_POST['fname']));
  $lastname=strip_tags(trim($_POST['lname']));
  $email=strip_tags(trim($_POST['email']));
  $address=strip_tags(trim($_POST['address']));
  $phonenumber=strip_tags(trim($_POST['phone']));
  
  if(empty($firstname)|| empty($lastname)|| empty($email) || empty($address) || empty($phonenumber)){
    echo("please complete the fields");
  }else{
        $result= $myedit->updateCustomer($firstname,$lastname,$email,$address,$phonenumber,$cid); 
          if($result==true){
           // $message = "1";
            // header("Location: customerprofile.php");
            // exit;
          echo  "<div class='alert alert-success'>";
                echo "Profile updated successfully";
          echo   "</div>";
          }else{
            echo"<div class='alert alert-danger'>Oops, could not Update Profile details </div>";
          }
  }
              
    


    }

                         ?>

                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                            <input type="text" class="form-control rounded-pill" id="myFirstName"
                                                placeholder="FullName" name="fname" value='<?php if(isset($cusedit['customer_fname'])){echo $cusedit['customer_fname'];}?>'>
                                                           
                                        </div>
                                                  <?php
                                                  if(isset($errors['errfname'])){
                                                      echo"<p class='text-danger'>".$errors['errfname']."</p>";
                                                  }
                                                    ?>
                                        <div class="col-sm-6 mt-4">
                                            <input type="text" class="form-control rounded-pill" id="myLastName"
                                                placeholder="Last Name"  name="lname" value='<?php if(isset($customer['customer_lastname'])){echo $customer['customer_lastname']; }?>'>
                                        </div>
                                              <?php
                                                  if(isset($errors['errlname'])){
                                                      echo"<p class='text-danger'>".$errors['errlname']."</p>";
                                                  }
                                                    ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-pill mt-4" id="myemail"
                                            placeholder="Email Address" name="email" value='<?php if(isset($customer['customer_email'])){echo $customer['customer_email']; }?>'>
                                    </div>
                                          <?php
                                                  if(isset($errors['erremail'])){
                                                      echo"<p class='text-danger'>".$errors['erremail']."</p>";
                                                  }
                                                    ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-pill mt-4" id="myaddress"
                                            placeholder="Contact Address" name="address" value='<?php if(isset($customer['customer_address'])){echo $customer['customer_address']; }?>'>
                                    </div>
                                          <?php
                                                  if(isset($errors['erraddress'])){
                                                      echo"<p class='text-danger'>".$errors['erraddress']."</p>";
                                                  }
                                            ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-pill mt-4" id="myphone"
                                            placeholder="Phone Number" name="phone" value='<?php if(isset($customer['customer_phonenumber'])){echo $customer['customer_phonenumber']; }?>'>
                                    </div>
                                          <?php
                                                  if(isset($errors['errphone'])){
                                                      echo"<p class='text-danger'>".$errors['errphone']."</p>";
                                                  }
                                            ?>
                                    
                                    </div>
                                <input type="submit" name="submit" class="btn btn-primary rounded-pill mt-4 animate__animated animate__bounce"
                                       value="Save Changes"/>
                                    
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    
      <?php
include_once('footer.php');
           ?>
    