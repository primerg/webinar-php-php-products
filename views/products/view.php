<div class="product-view">
    <div class="product-essential">
        <div class="row">
        	<div class="col-sm-4">
        		<div class="zoom-left">
					<img id="img_01" class="main-image" src="<?php echo $product->image ? url('/' . $product->image) : url('/public/img/products/1.jpg') ?>" data-zoom-image="<?php echo $product->image ? url('/' . $product->image) : url('/public/img/products/1.jpg') ?>" height="411" style="height: 411px !important;" />
					
				</div>

            </div>
            <div class="product-shop col-sm-6 col-sms-12">
                <div class="product-name">
                    <h1><?php echo strip_tags($product->name) ?></h1>
                </div> 
                <div class="price-box">
                    <span id="product-price-29" class="regular-price pull-left">
                        <span class="price"><?php echo strip_tags($product->sale_price) ?></span>
                    </span>
                    <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>

                    <div id="starType"></div>

                </div>

			    <form target="paypal" class="action-button" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="P6W26LCTRSQEY">
					<br/>
					<input type="hidden" name="currency_code" value="PHP">
					<input type="hidden" name="return" value="http://koodi.ph">

					<button class="btn-cart button" type="submit" ><span>Add to Cart</span></button>
					<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

					<br/>

                <div class="short-description">
		                <div class="std"><?php echo strip_tags($product->summary) ?></div>
		        </div>
            </div>

        </div>

		<div class="row full-description">
			<h2>Description</h2>
			<p><?php echo strip_tags($product->description) ?></p>
		</div> 
    </div>
</div>