


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shopping website, Shop with ease, easy shopping, shop and chill">
    <meta name="author" content="Haishat Ibrahim">

    <title>Shop & Chill -Admin Login</title>

    <!-- Custom styles for this template-->
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link href="all.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link href="./animate/animate.css" rel="stylesheet">

</head>


<body class= "bg-gradient-primary">
  <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">

          <div class="col-xl-10 col-lg-12 col-md-9">
              <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                      <!-- Nested Row within Card Body -->
                      <div class="row">
                          <div class="col-lg-6 d-none d-lg-block bg-image"></div>
                          <div class="col-lg-6">
                              <div class="p-5">
                                  <div class="text-center">
                                      <h1 class="mb-5">Admin Login</h1>
                                  </div>

                                   <?php
        if($_SERVER['REQUEST_METHOD'] =='POST'){
              //validate
             $email = strip_tags(trim($_POST['email']));
             $password=  strip_tags(trim($_POST['pswd']));
             if(empty($email) || empty($password)){
              echo"<div class='alert alert-danger'>Incorrect Email or Password</div>";
             }else{
              include_once('class/adminclass.php');
      
          $myadmin= new Admin;

            //to access login method
            $message =$myadmin->adminLogin($email,$password);
            
            if($message == true){
              header("Location: admindashboard.php");
              exit;
            }else{
              echo "<div class='alert alert-danger'>Invalid email and password</div>";
            }
             }
      

          }
       
            ?>

                                  <form id="loginform" action="" method="post" name="adminloginform">
                                      <div>
                                          <input type="email" class="form-control mt-4 rounded-pill"
                                              id="myeemail" name="email"  placeholder="Enter Email Address..."/>
                                      </div>
                                      <div>
                                          <input type="password" class="form-control mt-4 rounded-pill"
                                              id="mypassword"  name="pswd" placeholder="Password">
                                      </div>
                                     <input type="submit" class="btn btn-info rounded-pill animate__animated animate__bounce mt-2" value="Login"/>
                                      
                                  </form>
                                  <hr>
                              </div>
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

