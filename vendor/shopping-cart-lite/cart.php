<!DOCTYPE html>
<html>
<head>
	<title>Review Cart</title>
</head>
<body>
<?php
require_once("lib/cart_session.php");
require_once("vendor/autoload.php");
require_once("lib/braintree.php");

if(isset($_COOKIE["cart"]))
{
	$cartSessionData = getCartSessionData();	
	$cartToPrint = $cartSessionData["cartToPrint"];
	$total = $cartSessionData["total"];
    $totalItems = $cartSessionData["totalItems"];
    
    echo "$totalItems items in cart<br/>";
    echo "<b>Total:</b> $total<br/>";

    foreach( $cartToPrint as $cartItem )
    {
    	$title = $cartItem["title"];
    	$cost = $cartItem["cost"];
    	$quantity = $cartItem["quantity"];

    	echo "<b>$title</b> - $quantity items @ \$$cost<br/>";
    }
}
?>
<p>
	<!-- Ref: https://developers.braintreepayments.com/javascript+php/start/hello-client -->
	<form id="checkout" method="post" action="checkout.php">
	  <div id="dropin"></div>
	  <input type="submit" value="Pay <?= $total ?>">
	</form>
</p>

<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
<script type="text/javascript">
	braintree.setup("<?= Braintree_ClientToken::generate() ?>", 'dropin', {
  container: 'dropin'
});
</script>


</body>
</html>

