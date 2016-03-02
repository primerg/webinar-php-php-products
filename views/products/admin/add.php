<h1>Add product</h1>
 
<?php if (isset($message_type)): ?>
<div class="<?php echo $message_type ?>">
<?php echo $message ?>
</div>
<?php endif; ?>


<form method="post" action="<?php url('/admin/products/add') ?>" name="registerform" id="registerform" enctype="multipart/form-data">
<fieldset>
	<div class="form-group">
		<label for="product_name">Name</label>
		<input type="text" class="form-control" id="product_name" name="name" placeholder="Product name">
	</div>

	<div class="form-group">
		<label for="product_summary">Summary (short description)</label>
		<textarea name="summary" class="form-control" id="product_summary"></textarea>
	</div>

	<div class="form-group">
		<label for="product_description">Description</label>
		<textarea name="description" class="form-control" id="product_description"></textarea>
	</div>

	<div class="form-group">
		<label for="list_price">List Price</label>
		<input type="text" class="form-control" id="list_price" name="list_price" placeholder="List price">
	</div>

	<div class="form-group">
		<label for="sale_price">Sale Price</label>
		<input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Sale price">
	</div>

	<div class="form-group">
		<label for="stock">Stock</label>
		<input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
	</div>

	<div class="form-group">
		<label for="product_name">Image</label>
		<input type="file" class="form-control" id="image" name="image" placeholder="Product name">
	</div>

	<div class="form-group">
		<label for="stock">Status</label>
		<select name="status">
			<option value="0">Not available</option>
			<option value="1">Available</option>
		</select>
	</div>

    <input type="submit" name="save" id="save" value="Save" />
</fieldset>
</form>