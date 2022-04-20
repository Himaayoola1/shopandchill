<?php

     // constants
        include_once('constant.php');

    class Vendor{
        
    
    public $fullname;
    public $email;
    public $phonenumber;
    public $address;
    public $dbcon;

         //members method
        function __construct(){
            //to connect to database by initializing mysqli class
            $this->dbcon = new Mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME); 
        
            //check connection
            if($this->dbcon->connect_error){
                die("Connection Failed: ".$this->dbcon->connect_error);
            }else{
               //return true;
             }
            }


            function checkEmail($email){
                $sql="SELECT * FROM vendor where vendor_email = '$email'";
                $result= $this->dbcon->query($sql);
                if($result->num_rows==1){
                    return true;
                }else{
                    return false;
                }
            }
              

            function registerVendor($fullname,$email,$phone,$address,$pswd){
                    //hash password
                    $password=password_hash($pswd,PASSWORD_DEFAULT);

                    $images = $this->uploadvendorPicture();

                    if($images !=false){
                    //write your query
                    $sql = "INSERT INTO vendor SET  vendor_name ='$fullname',vendor_email='$email', vendor_phonenumber='$phone',vendor_address='$address',vendor_image='$images',vendor_password='$password' ";

                    //run query

                    $result= $this->dbcon->query($sql);
                            if($this->dbcon->affected_rows == 1){
                                return true;
                            }else{
                                return false;
                            }

                        }


                }

             

              public  function uploadvendorPicture(){
                            //Assign the file array into a variable
        //create variables to access the uploaded file data
              $filename = $_FILES['images']['name'];// original filename
              $filesize= $_FILES['images']['size'];
              $filetype = $_FILES['images']['type'];
              $tmp_name =$_FILES['images']['tmp_name'];
              $error =$_FILES['images']['error'];

                //check if file uploaded
                if($error > 0){
                    die("No File Uploaded");
                }


             //check file size
             if ( $filesize > 2097152){
                 die("Filesize should not exceed 2mb");
             }
             $extensions = array('jpg','png','jpeg','gif','svg');
            

             $file_ext = explode(".",$filename);
             
             $the_file_ext=end($file_ext);

             

              // To check if the file extension is allowed
              if(!in_array(strtolower($the_file_ext),$extensions)){
                  die("File type is not Allowed");
              }
              //destination folder
              $folder = "picturefolder/";
              $new_filename =rand().time().".".$the_file_ext;
              $destination = $folder.$new_filename;

              //move the file from temporary folder to destination
              if(move_uploaded_file($tmp_name, $destination)){
                  return $new_filename;
              }else{
                  return false;
              }

        }


        //Vendor Login Function Begin Here
         function vendorLogin($email,$pwd){
                       

                      $sql= "SELECT * from vendor WHERE vendor_email ='$email' ";
   
                        $password = password_hash($pwd,PASSWORD_DEFAULT);
                            $result =$this->dbcon->query($sql);

                    if($result->num_rows==1){
                        $row =$result->fetch_assoc();
                        //die(print_r($row));
                        $verify =password_verify($pwd,$row['vendor_password']);
                        if($verify){
                                       session_start();
                    $_SESSION['myuserid'] = $row['vendor_id'];
                    $_SESSION['mylastname'] = $row['vendor_name'];
                    $_SESSION['mylogcheker'] = 'Rt_0_0_cab';
                                    return true;
                        
                            
                    }else{
                                return false;


                }


            }
                    

               }     
            



  public function logout(){
                    session_start();
                    session_destroy();
                    //redirect to login
                    header("Location: vendorlogin.php");
                    exit;

                }
                //end login method


                //Update Password Method

                public function updatePassword($pwd){
                    
                    $sql= "UPDATE vendor SET vendor_password ='$pwd'";
                    $password = password_hash($pwd,PASSWORD_DEFAULT);
            
                    $result= $this->dbcon->query($sql);
                            if($this->dbcon->affected_rows == 1 || $this->dbcon->affected_rows == 0){
                                return true;
                            }else{
                                return false;
                            }

                        
                }
        }

    ?>