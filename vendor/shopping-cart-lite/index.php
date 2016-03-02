<!DOCTYPE html>
<html>
<head>
	<title>Sample Cart Index Page</title>
</head>
<body>

<?php
	require_once("lib/cart_session.php");
?>

<div>
Items in cart: <span id="cart_item_count">
	<?php $cartSessionData = getCartSessionData(); echo $cartSessionData["totalItems"]; ?>
</span>
</div>

<ul>
	<li>Item 1 - $1.99 - <a href="#" onclick="addToCart(1,this)">Add to Cart</a></li>
	<li>Item 2 - $2.99 - <a href="#" onclick="addToCart(2,this)">Add to Cart</a></li>
</ul>

<p>
 <a href="#" onclick="emptyCart();">Empty Cart</a>
</p>

<p>
 <!-- This can be done via AJAX call so you don't have to change pages -->
 <a href="cart.php">See cart and checkout</a>
</p>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/cart.js"></script>

</body>
</html>

