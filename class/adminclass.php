<?php 

include_once('constant.php');
		
		class Admin{

    public $firstname;
    public $lastname;
    public $email;
    public $phone;
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



  function adminLogin($email,$pwd){
                       
                        //write query
                 $sql= "SELECT * from admin WHERE admin_email ='$email' ";
   
                        $password = password_hash($pwd,PASSWORD_DEFAULT);
                        // var_dump($password);
                        // exit;
                            $result =$this->dbcon->query($sql);
                            // var_dump($result);
                        //die(print_r($result->num_rows,1));
                            // exit;

                    if($result->num_rows==1){
                        $row =$result->fetch_assoc();
                        //die(print_r($row));
                        $verify =password_verify($pwd,$row['admin_password']);
                        if($verify){
                        	           session_start();
                    $_SESSION['myuserid'] = $row['user_id'];
                    $_SESSION['mylastname'] = $row['lastname'];
                    $_SESSION['myfirstname'] = $row['firstname'];
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
                    header("Location:adminlogin.php");
                    exit;

                }
                //end login method   
            

            }



 ?>