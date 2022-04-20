<?php
            include_once("class/productclass.php");
            //create object of marketplace
           
              session_start();
            $id=$_SESSION['myuserid'];
            $amount=$_POST['total_amount'];
            $transref=$_POST['transref'];
            $email=$_POST['email'];
            
               $obj= new Product;
            $result=$obj->insertTransDetails($amount,$id,$transref);   
            $output = $obj->initializePaystack($amount,$email,$transref);

            // echo"<pre>";
            // print_r($output);
            // echo"</pre>";

            $redirecturl = $output['data']['authorization_url'];
            header("Location: $redirecturl");
            exit;


            ?>