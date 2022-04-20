<?php
     // constants
        include_once('constant.php');

    class Customer{
        
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

                              // customer login method
    //function to validate existing email                          
function validateEmail($email){
    $sql="SELECT * FROM customer where customer_email = '$email'";
     $outcome= $this->dbcon->query($sql);
     if($outcome->num_rows==1){
           return true; 
     }else{
        return false ;
     } 
}
            function register($fname,$lname,$email,$address,$phone,$pswd){
                    //hash password
                    $password=password_hash($pswd,PASSWORD_DEFAULT);
                    
                    //write your query
                    $sql = "INSERT INTO customer SET  customer_firstname ='$fname',customer_lastname ='$lname', customer_email='$email', customer_address='$address', customer_phonenumber='$phone', customer_password='$password' ";



                    //run query

                    $result= $this->dbcon->query($sql);

                    //check if there is error
                    $msg = array();

                    if($this->dbcon->error){
                        $msg ['error']= "Could not add customer".$this->dbconnect_error;
                    }else{
                        $msg['success'] = "Customer has been Succesfully Added";
                        
                    }
                    return $msg;
             }

  


  function customerLogin($email,$pwd){
                        //write query
                 $sql= "SELECT * from customer WHERE customer_email ='$email' ";
                        
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
                        $verify =password_verify($pwd,$row['customer_password']);
                        if($verify){

                              session_start();
                    $_SESSION['myuserid'] = $row['customer_id'];
                    $_SESSION['mylastname'] = $row['customer_firstname'];
                    $_SESSION['myfirstname'] = $row['customer_lastname'];
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
                    header("Location: ordinaryhome.php");
                    exit;

                }
                //end login method
//to fetch all customer's details
public function showAllCustomers($cid){
    $sql="SELECT customer_firstname, customer_lastname,customer_email,customer_address, customer_phonenumber FROM customer WHERE customer_id = '$cid' ";
    $result= $this->dbcon->query($sql);
    $record=[];
    if($this->dbcon->affected_rows > 0){
      while( $row= $result->fetch_assoc()){
          $record[] = $row;
      }
        return $record;
    }else{
        return $record;
    }
}

     // function to edit user profile  
 public function updateCustomer($customerfname,$customerlname,$customeremail,$customeraddress,$customerphone,$cid){
   $sql="UPDATE customer SET customer_firstname='$customerfname',customer_lastname='$customerlname',customer_email='$customeremail',customer_address='$customeraddress', customer_phonenumber='$customerphone' WHERE customer_id = '$cid' ";
     // var_dump($sql);
     // exit;
    $result= $this->dbcon->query($sql);
    if($this->dbcon->affected_rows == 1){
        return true;
    }else{
        return false;
    }


    }
     // Function to  Show a Single customer detail
   
     public function singleCustomer($id){
        $sql= "SELECT * FROM customer WHERE customer_id = '$id'";
        $result=$this->dbcon->query($sql);
        if($this->dbcon->affected_rows ==1){
            $row=$result->fetch_assoc();
            return $row;
        }else{
            return false;
        }
    }    


}


            ?>