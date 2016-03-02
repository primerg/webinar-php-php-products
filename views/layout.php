<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo url('/public/') ?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo url('/public/') ?>css/style.css">

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>

<!-- HEADER-AREA-START -->
<header class="header-area">
  <div class="container">
    <!-- HEADER-CONTENT START-->
    <div class="header-content">
      <div id="logo" class="col-sm-6">
        <a href="index.html">
          <img src="<?php echo url('/public/') ?>img/logo.png" alt="" class="logo-defoult">
        </a>
      </div>

      <div class="user-menu col-sm-6" id="fix-user-menu">
        <ul class="list-inline pull-right" aria-labelledby="dLabel">
          <?php if(empty($_SESSION['Username'])): ?>
            <li><a href="<?php echo url('/login') ?>">Login</a></li> 
          <?php else: ?>
            <li><a href="<?php echo url('/account') ?>">My Account</a></li>
            <li><a href="<?php echo url('/logout') ?>">Logout</a></li>
          <?php endif; ?>
          <li><a href="<?php echo url('/') ?>">Checkout</a></li>
        </ul>
      </div>

    </div>
    <!-- HEADER-CONTENT END-->
  </div>
</header>

<!-- MAIN-MENU-AREA-START -->
<nav class="main-menu-area" id="sticker">
  <div class="container">
      <a class="mobile-menu hidden-md hidden-lg" href="#nav">MENU <span>&#9776</span></a>

      <ul class="list-inline">
        <li><a href="<?php echo url('/') ?>">Home</a></li>
        <li><a href="category-men.html">Mens</a></li>
        <li><a href="category-women.html">Womens</a></li>
        <li><a href="category-children.html">Children</a></li>
        <!-- <li><a class="typeform-share" href="https://rachel288.typeform.com/to/UM3TWH" data-mode="1" target="_blank">Poll</a></li> -->
      </ul>
      
  </div>
</nav>

<!-- MAIN-MENU-AREA-START -->
<section id="main-content">
  <div class="container">

    <?php echo $global_content; ?>
    
  </div>
</section>

<!-- FOOTER-AREA-START -->
<footer>
  <div class="container">
    <div class="col-sm-4">
      <div class="single-footer-menu">
        <div class="footer-title">
          <h2>Company Info</h2>
        </div>
        <div class="footer-menu">
          <ul class="list-unstyled">
            <li><a href="<?php echo url('/about') ?>">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">terms of use</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="single-footer-menu">
        <div class="footer-title">
          <h2>CUSTOMER SERVICE</h2>
        </div>
        <div class="footer-menu">
          <ul class="list-unstyled">
            <li><a href="#">shipping policy</a></li>
            <li><a href="#">Compensation Fist</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Return Policy</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--script>(function(t,e,n,c){var o,s,a;t.SMCX=t.SMCX||[],e.getElementById(c)||(o=e.getElementsByTagName(n),s=o[o.length-1],a=e.createElement(n),a.type="text/javascript",a.async=!0,a.id=c,a.src=["https:"===location.protocol?"https://":"http://","widget.surveymonkey.com/collect/website/js/hkX2nqGc1dc2_2Bn9nDmaLmSzzjla9CE_2FaRRtMhXPAYU1_2F954qUWBV4qqWuHbXqOCQ.js"].join(""),s.parentNode.insertBefore(a,s))})(window,document,"script","smcx-sdk");</script-->

<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'share.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}id=id+'_';if(!gi.call(d,id)){qs=ce.call(d,'link');qs.rel='stylesheet';qs.id=id;qs.href=b+'share-button.css';s=gt.call(d,'head')[0];s.appendChild(qs,s)}})()</script>


</body>
</html>