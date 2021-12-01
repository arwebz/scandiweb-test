	<form method="post" action="action-product.php?action_type=add" class="needs-validation" name="product_form" id="product_form" novalidate>
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<h3><?php echo $page_title; ?></h3>
		
		<div class="col-md-3 text-end">
			<button type="submit" class="btn btn-success" form="product_form" name="btn_submit" id="btn_submit">
				Save
			</button>
			<button type="button" class="btn btn-warning" form="product_form" name="btn_cancel" id="btn_cancel" onclick="window.location.href='index.php';">
				Cancel
			</button>
		</div>
	</header>

	<div class="row row-cols-2 g-2">
		<div class="col">
			<div class="row mb-3">
				<label for="sku" class="col-sm-4 col-form-label">SKU</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="sku" id="sku" required>
					<div class="invalid-feedback">
						Please, submit required data
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label for="name" class="col-sm-4 col-form-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="name" id="name" required>
					<div class="invalid-feedback">
						Please, submit required data
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label for="price" class="col-sm-4 col-form-label">Price ($)</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" name="price" id="price" required>
					<div class="invalid-feedback">
						Please, submit required data
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<label for="productType" class="col-sm-4 col-form-label">Type Switcher</label>
				<div class="col-sm-8">
					<select class="form-select" name="productType" id="productType" required>
						<option selected disabled value="">Type Switcher</option>
						<option value="1">DVD</option>
						<option value="2">Book</option>
						<option value="3">Furniture</option>
					</select>
					<div class="invalid-feedback">
						Please, submit required data
					</div>
				</div>
			</div>
			
			<div class="hidBox attr_1">
				<div class="row mb-3">
					<label for="size" class="col-sm-4 col-form-label">Size (MB)</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="size" id="size" required>
						<div class="invalid-feedback">
							Please, provide the data of indicated type
						</div>
						<div id="sizeHelp" class="form-text">Please, provide size</div>
					</div>
				</div>
			</div>
			
			<div class="hidBox attr_2">
				<div class="row mb-3">
					<label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="weight" id="weight" required>
						<div class="invalid-feedback">
							Please, provide the data of indicated type
						</div>
						<div id="weightHelp" class="form-text">Please, provide weight</div>
					</div>
				</div>
			</div>
			
			<div class="hidBox attr_3">
				<div class="row mb-3">
					<label for="height" class="col-sm-4 col-form-label">Height (CM)</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="height" id="height" required>
						<div class="invalid-feedback">
							Please, provide the data of indicated type
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label for="width" class="col-sm-4 col-form-label">Width (CM)</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="width" id="width" required>
						<div class="invalid-feedback">
							Please, provide the data of indicated type
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label for="length" class="col-sm-4 col-form-label">Lenght (CM)</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="length" id="length" required>
						<div class="invalid-feedback">
							Please, provide the data of indicated type
						</div>
						<div id="dimensionHelp" class="form-text">Please, provide dimensions</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	