<?php 
include_once('constant.php');


        class Product{

	            public $dbcon;

	            function __construct(){
              
                $this->dbcon = new Mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME); 
            
                //check connection
                if($this->dbcon->connect_error){
                    die("Connection Failed: ".$this->dbcon->connect_error);
                }else{
                      
                 }
                
	        }

            public function addProduct($productcat,$productname,$desc,$price,$vendor,$quantity){

                    //call upload file option
                    $pimage = $this->uploadPicture();

                     if($pimage !=false){
                    //process image Upload
                $sql="INSERT INTO product SET productcategory_id ='$productcat',product_name='$productname',product_description='$desc',product_price='$price',vendor_id='$vendor', product_image='$pimage',product_quantity ='$quantity'";
           
                    $result= $this->dbcon->query($sql);
                            if($this->dbcon->affected_rows == 1){
                                return true;

                            }else{
                                return false;
                            }

                        }
                }

                public  function uploadPicture(){
                            //Assign the file array into a variable
        //create variables to access the uploaded file data
              $filename = $_FILES['pimage']['name'];// original filename
              $filesize= $_FILES['pimage']['size'];
              $filetype = $_FILES['pimage']['type'];
              $tmp_name =$_FILES['pimage']['tmp_name'];
              $error =$_FILES['pimage']['error'];

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


// Function to get Vendor 
 function getVendor(){
                    $sql = "SELECT * FROM vendor";

                    //run the query 
                    $result=$this->dbcon->query($sql);

                    $records =array();
                    if($result->num_rows > 0){
                        //loop through result set and fetch all records
                        while($row = $result->fetch_assoc()){
                            $records[] =$row;
                        }
                        return $records;
                        
                    }else{
                        return $records;
                    }
                }
//Function to Fetch Product Category
function getProductcategory(){
                    $sql = "SELECT * FROM productcategory";

                    //run the query 
                    $result=$this->dbcon->query($sql);

                    $records =array();
                    if($result->num_rows > 0){
                        //loop through result set and fetsch all records
                        while($row = $result->fetch_assoc()){
                            $records[] =$row;
                        }
                        return $records;
                        
                    }else{
                        return $records;
                    }
                }

   
// Function To Get Product on Admin dashboard
function getProducts(){
                    $sql = "SELECT * FROM product";

                    //run the query 
                    $result=$this->dbcon->query($sql);

                    $records =array();
                    if($result->num_rows > 0){
                        //loop through result set and fetsch all records
                        while($row = $result->fetch_assoc()){
                            $records[] =$row;
                        }
                        return $records;
                        
                    }else{
                        return $records;
                    }
                }

//Function vendoraddProduct start
                public function vendoraddProduct($productcat,$productname,$desc,$price,$vendor,$quantity){

                    //call upload file option
                    $pimage = $this->uploadPicture();

                     if($pimage !=false){
                    //process image Upload
                $sql="INSERT INTO product SET productcategory_id ='$productcat',product_name='$productname',product_description='$desc',product_price='$price',vendor_id='$vendor', product_image='$pimage',product_quantity ='$quantity'";
           
                    $result= $this->dbcon->query($sql);
                            if($this->dbcon->affected_rows == 1){
                                return true;

                            }else{
                                return false;
                            }

                        }
                }


                //function vendoraddProduct ends

                // Function Vendor Get Product starts Here
                
                function getvendorProducts($vendor){
                    $sql = "SELECT * FROM product WHERE vendor_id ='$vendor'";
                    

                    //run the query 
                    $result=$this->dbcon->query($sql);

                    $records =array();
                    if($result->num_rows > 0){
                        //loop through result set and fetch all records
                        while($row = $result->fetch_assoc()){
                            $records[] =$row;
                        }
                        return $records;
                        
                    }else{
                        return $records;
                    }
                }
                //Function Vendor get Product ends Here


                //Function Update Product Starts Here
                 //begin Update Product

                 public function updateVendorProduct($productcat,$productname,$desc,$price,$vendor,$picimage,$quantity){

                    //call upload file option
                    if(isset($_FILES['error']) && $_FILES['error']==0){
                    $pimage = $this->uploadPicture();
                }else{
                    $pimage = $picimage;
                }
                     if($pimage !=false){
                    //process image Upload
                    $sql= "UPDATE product SET productcategory_id ='$productcat',product_name='$productname',product_description='$desc',  product_price='$price',vendor_id='$vendor',product_image='$pimage', product_quantity='$quantity' WHERE vendor_id='$vendor'";
            //var_dump($sql);
           // exit;
                    $result= $this->dbcon->query($sql);
                            if($this->dbcon->affected_rows == 1 || $this->dbcon->affected_rows == 0){
                                return true;
                            }else{
                                return false;
                            }

                        }
                }
                
                //Function Update Product  Ends Here
          
function getProductShirt(){
    $sql = "SELECT * FROM product WHERE product_name='shirt'";

    //run the query 
    $result=$this->dbcon->query($sql);

    $records =array();
    if($result->num_rows > 0){
        //loop through result set and fetsch all records
        while($row = $result->fetch_assoc()){
            $records[] =$row;
        }
        return $records;
        
    }else{
        return $records;
    }
}


//function Delete Product starts Here
public function deleteProduct($id){
    $sql="DELETE FROM product where product_id = '$id' ";
    $result= $this->dbcon->query($sql);
    if($this->dbcon->affected_rows == 1){
        echo "Product deleted Succesfully";
    }else{
        echo "Unable to Delete Product";
    }
}

//function Delete Product Ends Here
//function to get single product
    public function getSingleProduct($id){
            $sql="SELECT * FROM product where product_id ='$id'";
            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows==1){
                $row=$result->fetch_assoc();
                return $row;
            }else{
                return false;
            }
    }
//Function to display Product by Category while Randomizing it 
public function displayImgCat($id){
    $sql = "SELECT * FROM product where productcategory_id = '$id' order by rand() LIMIT 4";
        $result = $this->dbcon->query($sql);
    $records =array();
    if($result->num_rows > 0){
        //loop through result set and fetsch all records
        while($row = $result->fetch_assoc()){
            $records[] =$row;
        }
        return $records;
        
    }else{
        return $records;
    }
}

//Function to fetch a Single Product 
function selectSingleProduct($id){
    $sql="SELECT * FROM product WHERE product_id= '$id' ";
    $result=$this->dbcon->query($sql);
    $record=[];
    if ($this->dbcon->affected_rows > 0){
        while($row = $result -> fetch_assoc()){
            $record[]= $row;      
         }
         return $record;
    }else{
        return $record;
    }

}
// Function to display Products Based On There Categories
public function displayAllCat($id){
    $sql = "SELECT * FROM product where productcategory_id ='$id'";
        $result = $this->dbcon->query($sql);
    $records =array();
    if($result->num_rows > 0){
        //loop through result set and fetsch all records
        while($row = $result->fetch_assoc()){
            $records[] =$row;
        }
        return $records;
        
    }else{
        return $records;
    }
}

//Function to Insert All Cart Item into table Cart
 function insertCart($productid,$customerid,$quantity,$vendor){
     $sql= "INSERT INTO  cart SET product_id= '$productid',customer_id = '$customerid',quantity= '$quantity',vendor_id ='$vendor'";
     $result= $this->dbcon->query($sql);
     if($this->dbcon->affected_rows  == 1){
         return true;
     }else{
        return false;
     }
 }
//Function to fetch from table cart
 public function fetchAllfromcart($id){
    $sql = "SELECT * FROM cart  LEFT JOIN product ON cart.product_id=product.product_id WHERE customer_id= $id AND status = 'pending'";
    $result = $this->dbcon->query($sql);
    // var_dump($result);
    // exit;
    $row = [];
    if($this->dbcon->affected_rows > 0){
        while($rec= $result->fetch_assoc()){
            $row[] = $rec;
        }return $row;
    }else{
        return $row;
    }

}

// Function sum Price
function sumallPrice($id){
    $sql="SELECT SUM(product_price * quantity ) AS totalprice FROM cart LEFT JOIN product ON cart.product_id = product.product_id WHERE customer_id = '$id' AND status ='pending'";
    $result = $this->dbcon->query($sql);
    if($this->dbcon->affected_rows > 0){
        $row =$result->fetch_assoc();
        $total=$row['totalprice'];
        return $total;
    }else{
        return $total;
    }     
}
//Function to addup all Quantities
    function sumallQuantity($id){
 $sql= "SELECT SUM(quantity) AS totalquantity FROM cart WHERE customer_id = '$id' AND status ='pending'";
   $result=$this->dbcon->query($sql);
 if($this->dbcon->affected_rows > 0){
     $row= $result->fetch_assoc();
     $allquantity = $row['totalquantity'];
     return $allquantity;
 }else{
    return $allquantity;
 }

 }

//Function to Delete Product from cart
function deleteCart($id){
    $sql= " DELETE FROM `cart` WHERE `cart_id`= '$id'";
    $output=$this->dbcon->query($sql);
    if($this->dbcon->affected_rows == 1){
        return true;
    }else{
         return false;
    }
}


      #begin get user email
      public function getEmail($id){
        $sql="SELECT * FROM customer WHERE customer_id='$id' ";
        $result=$this->dbcon->query($sql);
        if($this->dbcon->affected_rows==1){
            $rows=$result->fetch_assoc();
            $email=$rows['customer_email'];
            return $email;
        }else{
            return $email;
        }
      }
      #end user email

     public function insertTransDetails($amount,$userid,$transref){

                    $sql= "INSERT INTO orders SET total_amount ='$amount',customer_id='$userid',order_status='pending',trans_reference ='$transref' ";
                    // var_dump($sql);
                    // exit;
                         $result=$this->dbcon->query($sql);
                            if($this->dbcon->affected_rows ==1){
                                return true;
                            }else{
                                return false;
                            }

                        }
                
                        //initialize paystack transaction  Begin Here

public function initializePaystack($amount,$email,$reference){
                        $url = "https://api.paystack.co/transaction/initialize";
                        $callbackurl ="http://localhost/shopandchill/paystackcallback.php";

                        $fields = [
                            'email' => $email,
                            'amount' => $amount * 100,
                            'reference' => $reference,
                            'callback_url'=>"$callbackurl"
                          ];

                          $fields_string = http_build_query($fields);

                          //step 1 : open connection
                          $ch = curl_init();

                          //step 2: set curl option
                        //set the url, number of POST vars, POST data
                        curl_setopt($ch,CURLOPT_URL, $url);
                        curl_setopt($ch,CURLOPT_POST, true);
                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                        curl_setopt($ch,CURLOPT_HTTPHEADER, array(
                            "Authorization: Bearer sk_test_5d58a940a079e488f3ceb08e65b80e2819abc622",
                            "Cache-Control: no-cache",
                        ));
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                            //step 3:execute key
                                            //step 3 Execute the curl_session
                                    $result = curl_exec($ch);

                                    //check if there ia any error
                                if(curl_error($ch)){
                                    var_dump(curl_error($ch));
                                }

                                    //close curl session
                                curl_close($ch);

                                    //step 5
                                    $response = json_decode($result,true);

                                    return $response;
                                        }   
                        //   initialize paystack transaction End Here

                //Insert cart Item into Customer_order Function starts

Function customerOrder($productid,$customerid,$quantity,$vendor){
                    $sql= "INSERT INTO customer_order SET product_id = '$productid',customer_id  = '$customerid',quantity= '$quantity',vendor_id ='$vendor'";
                    $result= $this->dbcon->query($sql);
                    if($this->dbcon->affected_rows == 1){
                        $id=$this->dbcon->insert_id;
                        $_SESSION['custid']=$id;
                        return true;
                    }else{
                        return false;
                    }
                }
                //Insert cart Items into customer_order Function  Ends


                        //Trans status function
              public function updateCustomerOrder($custid){
                $sql="UPDATE customer_order SET status='paid' where customer_id='$custid'";
                $result=$this->dbcon->query($sql);
                if($this->dbcon->affected_rows == 1){
                    return true;
                }else{
                    return false;
                }
              }          




              //Alternative Order Update table
                 //Transaction status function
                 public function updateOrder($transref){
                    $sql="UPDATE orders SET order_status='paid' WHERE trans_reference='$transref' ";
                    $result=$this->dbcon->query($sql);
                    if($this->dbcon->affected_rows == 1){
                        $id=$this->dbcon->insert_id;
                        return true;
                    }else{
                        return false;
                    }
                  }       
       
              //delete  cart
              function emptyCart($customerid){
             $sql="DELETE FROM cart WHERE customer_id='$customerid' ";
               $result=$this->dbcon->query($sql);
               if($this->dbcon->affected_rows > 0){
                   return true;
               }else{
                   return false;
               }   
              }

              
             //Begin get  Order Details List Function Starts Here
              function getAllOrderbyVendor($vendorid){
                  $sql="SELECT * FROM customer_order JOIN customer ON customer_order.customer_id =customer.customer_id JOIN product ON customer_order.product_id = product.product_id JOIN vendor ON customer_order.vendor_id = vendor.vendor_id WHERE vendor.vendor_id = '$vendorid'  AND status ='paid' ";
                $result = $this->dbcon->query($sql);
                $records =array();
                if($result->num_rows > 0){
                    //loop through result set and fetsch all records
                    while($row = $result->fetch_assoc()){
                        $records[] =$row;
                    }
                return $records;
                    
                }else{
                    return $records;
                }

              }
                       
             //vendor order details List Function Ends Here
 
             //Super Admin Order List
             function getVendorAllOrder(){
                 $sql="SELECT * FROM customer_order JOIN customer ON customer_order.customer_id =customer.customer_id JOIN product ON customer_order.product_id = product.product_id JOIN vendor ON customer_order.vendor_id = vendor.vendor_id  AND status ='paid'";
                 $result =$this->dbcon->query($sql);
                 $records = array();
                 if($result -> num_rows > 0){
                     while($rows = $result->fetch_assoc()){
                         $records[] = $rows;
                     }
                     return $records;
                 }else{
                     return $records;
                 }
             }
    }


 ?>