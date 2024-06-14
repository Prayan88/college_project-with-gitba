<form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value="<?php echo $total; ?>" name="tAmt" type="hidden">
    <input value="<?php echo $total; ?>" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="<?php echo $product_id ?>" name="pid" type="hidden">
    <input value="http://localhost/nepalicomm1/pages/esewa_success.php" type="hidden" name="su">
    <input value="http://localhost/nepalicomm1/pages/esewa_failure.php" type="hidden" name="fu">
    <a><button type="submit" name="submit" class="btn btn-success btn-round"><i class="now-ui-icons shopping_delivery-fast"></i> Pay with Esewa</button></a>
       
    
</form>   