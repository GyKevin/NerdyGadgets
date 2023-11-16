<?php 
unset($_COOKIE['product_id']);
setcookie('product_id', "", time()-3600);
?>