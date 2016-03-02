<div class="row">


<div id="left-content" class="col-md-9 col-md-push-3">
	<div id="grid" class="tab-pane">
		<?php foreach ($products as $product) { ?>
		<div class="col-sm-4 col-lg-3 col-md-3">
			<!-- SINGLE-PRODUCT-START -->
			<div class="single-product">
				<div class="product-img">
					<a href="<?php echo url('/product?id=' . $product->id) ?>">
						<img alt="" src="<?php echo $product->image ? url('/' . $product->image) : url('/public/img/products/1.jpg') ?>" class="primary-image">
					</a>
					<div class="action-button-area">
						<div class="action-button">
							<a class="cart-button" href="#">Add to Cart</a>
						</div>
					</div>
				</div>
				<div class="product-des">
					<h2 class="product-name">
						<a href="<?php echo url('/product?id=' . $product->id) ?>"><?php echo strip_tags($product->name) ?></a>
					</h2>
					<div class="price-box">
						<span class="old-price"><strike>PHP <?php echo $product->list_price ?></strike></span>
						<span class="special-price">PHP <?php echo $product->sale_price ?></span>
					</div>
				</div>
			</div>
			<!-- SINGLE-PRODUCT-END -->
		</div>
		<?php } ?>
	</div>
</div>

<div id="sidebar" class="col-md-3 col-md-pull-9">
	<div class="categories">
		<h2 class="title">Categories</h2>
		<ul class="list-unstyled">
			<li><a href="#">Creative (2)</a></li>
			<li><a href="#">Fashion (1)</a></li>
			<li><a href="#">Image (1)</a></li>
			<li><a href="#">Photography (1)</a></li>
			<li><a href="#">Travel (4)</a></li>
			<li><a href="#">Videos (2)</a></li>
			<li><a href="#">WordPress (4)</a></li>
		</ul>
	</div>

</div>
</div>

<div class="clear"></div>