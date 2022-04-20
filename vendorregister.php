
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shopping website, Shop with ease, easy shopping, shop and chill">
    <meta name="author" content="Haishat Ibrahim">

    <title>Shop & Chill - Vendor Registration</title>

    <!-- Custom styles for this template-->
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link href="all.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
    <link href="./animate/animate.css" rel="stylesheet">

</head>
        
       <body class="bg-gradient-primary">

        <div class="container">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
  
                                    <h1 class="mb-4">Create an Account</h1>
                                    <h3 class="vendor text-center">Vendor Registration</h3>
                                    <?php 
       include_once('class/vendorclass.php');      
            
IF($_SERVER['REQUEST_METHOD']=='POST'){
 
  
  $myvendorreg= new Vendor;

  $fullname=strip_tags(trim($_POST['fullname']));
  $email=strip_tags(trim($_POST['email']));
  $phonenumber=strip_tags(trim($_POST['phone']));
  $address=strip_tags(trim($_POST['address']));
  $password=strip_tags(trim($_POST['password']));
 

    $errors = array();
    if(empty($fullname)){
                $errors['errfullname'] = "Fullname Field cannot Be Empty";
              }
    if(empty($email)){
                $errors['erremail'] = "Email  Field cannot Be Empty";
              }
    if(empty($phonenumber)){
                $errors['errphone'] = "Phone Field cannot Be Empty";
              }
    if(empty($address)){
                $errors['erraddress'] = "Address Field cannot Be Empty";
              }
    if(empty($_FILES['images'])){
                $errors['errimages'] = "Image Field cannot Be Empty";
              }
    if(empty($password)){
                $errors['errpassword'] = "Password Field cannot Be Empty";
              }

  if(empty($errors)){

        $check = $myvendorreg->checkEmail($email);
        if($check==true){
            echo "<div class='alert alert-danger'>Email Already Existing,Kindly Input a new Email Address</div>";
        }else{

        $output = $myvendorreg->registerVendor($fullname,$email,$phonenumber,$address,$password);
        
        if($output == true){
        $message = "1" ;
          header("Location:vendorredirect.php?msg=$message");
          exit;
        }else{
          echo"<div class='alert alert-danger'>Oop, Unable to Add Vendor Details</div>";
        }

    }

        }
}
                         ?>

                                </div>
                                <form class="user"  action="" method="post" enctype="multipart/form-data" name="vendorForm">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mt-4">
                                            <input type="text" class="form-control rounded-pill" id="myfullName"
                                                placeholder="Kindly input Your FullName"  name="fullname">
                                        </div>
                                              <?php
                                                  if(isset($errors['errfullname'])){
                                                      echo"<p class='text-danger'>".$errors['errfullname']."</p>";
                                                  }
                                                    ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-pill mt-4" id="myemail"
                                            placeholder="Email Address" name="email">
                                    </div>
                                          <?php
                                                  if(isset($errors['erremail'])){
                                                      echo"<p class='text-danger'>".$errors['erremail']."</p>";
                                                  }
                                                    ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-pill mt-4" id="myphone"
                                            placeholder="Phone Number" name="phone">
                                    </div>
                                          <?php
                                                  if(isset($errors['errphone'])){
                                                      echo"<p class='text-danger'>".$errors['errphone']."</p>";
                                                  }
                                                    ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-pill mt-4" id="myaddress"
                                            placeholder="Contact Address" name="address">
                                    </div>
                                          <?php
                                                  if(isset($errors['erraddress'])){
                                                      echo"<p class='text-danger'>".$errors['erraddress']."</p>";
                                                  }
                                                    ?>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label class="label">Vendor Image</label>
                                              <input type="file"  class="form-control rounded-pill" name='images' id="vendorImage" >
                                               
                                             </div>
                                            <?php
                                            if(isset($errors['errimages'])){
                                                  echo"<p class='alert alert-danger'>".$errors['errimages']."</p>";
                                              }

                                                ?>
                                                                        
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                            <input type="password" class="form-control rounded-pill"
                                                id="mypassword" placeholder="Password" name="password">
                                        </div>
                                              <?php
                                                  if(isset($errors['errpassword'])){
                                                      echo"<p class='text-danger'>".$errors['errpassword']."</p>";
                                                  }
                                                    ?>
                                        <div class="col-sm-6 mt-4">
                                            <input type="password" class="form-control rounded-pill"
                                                id="mypassword1" placeholder="Confirm Password" name="confirmpassword">
                                        </div>
                                    </div>
                                     <input type="submit" name="submit" class="btn btn-primary rounded-pill mt-4 animate__animated animate__bounce"
                                       value="Register Account"/>
                                    
                                    <hr>
                                </form>
                                <div class="text-center">
                                    Will You Like to Buy Products on Shop & Chill .
                                    <a class="small" href="customerregister.php">Customer Registration</a>
                                </div>
                        
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="vendorlogin.php">Already have an account?  Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    
         <!-- Bootstrap core JavaScript-->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/css/bootstrap.css"></script>

    <!-- Core plugin JavaScript-->
    <script src="jquery-easing/jquery.easing.min.js"></script>
        <!--Javascript-->
    <script type="text/javascript" language="javascript"></script>

    
    </body>
    </html>