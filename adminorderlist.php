<?php include_once('adminnav.php'); ?>
<?php  include_once('class/productclass.php'); 

?>
<div class="container-fluid text-light"  style='min-height:500px;' >
  <h2> All vendor Order List</h2>

  <div>
    <table class="table table-striped table-hover text-light">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Customer FirstName</th>
                <th>Customer LastName</th>
                <th>Vendor FullName</th>
                <th>Payment status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $vlist = new Product;
            $alist = $vlist->getVendorAllOrder();
            foreach ($alist as $key => $value){

               ?>
               <tr>
            <td> <img src='picturefolder/<?php echo $value['product_image'];?>' alt='picture' style="width:45px;"></td>
                   <td><?php echo $value['product_name']; ?> </td>
                   <td><?php echo $value['product_price']; ?> </td>
                   <td><?php echo $value['quantity']; ?> </td>
                   <td><?php echo $value['customer_firstname']; ?> </td>
                   <td><?php echo $value['customer_lastname']; ?> </td>
                   <td><?php echo $value['vendor_name']; ?> </td>
                   <td><?php echo $value['status']; ?> </td>
                   
               </tr>
               <?php } ?>
        </tbody>

    </table>
  </div>
</div>
<?php include_once('adminfooter.php'); ?>
 
