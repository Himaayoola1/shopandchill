<?php   
     $id= $_GET['id'];

    
    include_once('class/productclass.php');
    $out= new Product;
    $deleteproduct = $out->deleteCart($id);
	if($deleteproduct==true){
		header("Location: cart.php");
        exit;
	
}

            ?>

