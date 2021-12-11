<?php
require_once('config/config.php');
require_once('class/database.php');
require_once('class/product.php');

$db                   = new Database();
$dvd                  = new DVD($db);
$book                 = new Book($db);
$furniture            = new Furniture($db);
$product['DVD']       = $dvd->showProduct();
$product['Book']      = $book->showProduct();
$product['Furniture'] = $furniture->showProduct();

$productList = array_merge($product['DVD'], $product['Book'], $product['Furniture']);
$columns     = array_column($productList, 'ID');
array_multisort($columns, SORT_ASC, $productList);


$page_title = 'Product List';
$head_data  = array(
	'<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">',
	'<link href="assets/css/style.css" rel="stylesheet">',
);
require_once('view/include/head.php');


require_once('view/layout/index.php');


$footer_data = array(
	'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>',
	'<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>',
);
require_once('view/include/footer.php');
