	<form method="post" action="action-product.php?action_type=delete_multi" name="product_delete" id="product_delete">
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<h3>Product List</h3>
		
		<div class="col-md-3 text-end">
			<button type="button" class="btn btn-primary" onclick="window.location.href='add-product.php';">
				ADD
			</button>
			<button type="submit" class="btn btn-danger" form="product_delete" name="delete-product-btn" id="delete-product-btn">
				MASS DELETE
			</button>
		</div>
	</header>

	<?php if ( ! empty($product)) { ?>
	
	<div class="row row-cols-4 g-4">
		<?php foreach ($product as $row) { ?>
		
		<div class="col">
			<div class="card text-center">
				<div class="card-body">
					<label class="w-100">
						<div class="text-start">
							<input type="checkbox" class="form-check-input flex-shrink-0 delete-checkbox" name="product_chk[<?php echo $row['ID']; ?>]" id="product_chk_<?php echo $row['ID']; ?>" value="<?php echo $row['ID']; ?>">
						</div>
						
						<h5 class="card-title"><?php echo $row['product_sku']; ?></h5>
						<p class="card-text">
							<?php echo $row['product_name']; ?><br />
							<?php echo $row['product_price']; ?> $<br />
							<?php
							switch($row['product_type'])
							{
								case '1' : 
									echo 'Size (MB) : ' . $row['product_attribute'];
									break;
								case '2' : 
									echo 'Weight (KG) : ' . $row['product_attribute'];
									break;
								case '3' : 
									echo 'Dimension (CM) : ' . $row['product_attribute'];
									break;
							}
							?>
							
						</p>
					</label>
				</div>
			</div>
		</div>
		<?php } ?>

	</div>
	</form>
	<?php } ?>
	