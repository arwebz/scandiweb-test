<?php
require_once('config/config.php');


$page_title = 'Product Add';
$head_data  = array(
	'<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">',
	'<link href="assets/css/style.css" rel="stylesheet">',
);
require_once('view/include/head.php');


require_once('view/layout/add-product.php');


$footer_data = array(
	'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>',
	'<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>',
	'<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>',
	'<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>',
	'<script>
	$(document).ready(function(){
		$("#productType").change(function(){
			$(this).find("option:selected").each(function(){
				var optionValue = $(this).attr("value");
				if(optionValue){
					$(".hidBox").not(".attr_" + optionValue).hide();
					$(".attr_" + optionValue).show();
				} else {
					$(".hidBox").hide();
				}
			});
		}).change();
		
		$("#product_form").validate();
	});
	</script>',
);
require_once('view/include/footer.php');
