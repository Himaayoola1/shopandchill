<?php   
    $id= $_GET['id'];
    include_once('class/productclass.php');
    $obj= new Product;
    $delete = $obj->deleteProduct($id);
	if($delete==true){
		header("Location:vendorlistproduct.php");
	}else{
    header("Location:vendorlistproduct.php");
}
            ?>
		 