shopping-cart-lite
==================

A lightweight JavaScript/PHP Shopping Cart

```
index.php --> cart.php --> checkout.php
```

There is no basic shopping cart and [Braintree](http://braintreepayments.com/) example code out on the Internet.  This project aims to fill that void providing an example using PHP and Javascript.

Files and their purpose
=======================
- ```index.php``` : Minimalistic cart display and interaction
- ```cart.php``` : Displays cart details and checkout page using Braintree
- ```checkout.php``` : Processes the transaction
- ```lib/braintree.php``` : Add your Braintree configuration info here
- ```lib/cart_session.php``` : Helper code that grabs cart cookie data
- ```js/cart.js``` : Helper Javascript methods for adding and remove items from the cart


Third-Party libraries used
==========================
- [jQuery 2.1.1](http://jquery.com/)
- [jQuery Cookie](http://plugins.jquery.com/cookie/)


Screenshots
===========
###Index Page
![Index Page](/screenshots/index.png?raw=true "Index Page")

###Index Page After Adding Items
![Index Page After Adding Items](/screenshots/index_cart_add.png?raw=true "Index Page After Adding Items")

###Shopping Cart
![Shopping Cart](/screenshots/cart.png?raw=true "Shopping Cart")

###Shopping Cart - Paying with PayPal
![Shopping Cart - Paying with PayPal](/screenshots/cart-pp.png?raw=true "Shopping Cart - Paying with PayPal")

###Shopping Cart - Paying with Credit Card
![Shopping Cart - Paying with Credit Card](/screenshots/cart-cc.png?raw=true "Shopping Cart - Paying with Credit Card")

###Checkout
![Checkout](/screenshots/checkout.png?raw=true "Checkout")