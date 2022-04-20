<?php
  session_start();
  $userid=$_SESSION['myuserid'];
  $ref=$_GET['reference'];
  // $custid=$_SESSION['custid'];
  include_once('class/productclass.php');

  $obj= new Product;
  $outcome=$obj->updateCustomerOrder($userid);
  $secondupdate=$obj->updateOrder($ref);
  $delete=$obj->emptyCart($userid);
  if($delete==true){
    header("Location: home.php");
  }else{
    header("Location: cart.php");
  }
?>