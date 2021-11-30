<?php 
require_once('config/config.php');
require_once('class/database.php');

$db          = new Database();
$tblName     = 'product';
$redirectURL = 'index.php';

if ( ! empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'add')
{
	$product_sku   = trim($_POST['sku']);
	$product_name  = trim($_POST['name']);
	$product_price = trim($_POST['price']);
	$product_type  = trim($_POST['productType']);

	switch ($product_type)
	{
		case '1' : 
			$product_attribute = $_POST['size'];
			break;
		case '2' : 
			$product_attribute = $_POST['weight'];
			break;
		case '3' : 
			$product_attribute = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['lenght'];
			break;
	}

	$productData = array(
		'product_sku'       => $product_sku, 
		'product_name'      => $product_name, 
		'product_price'     => $product_price, 
		'product_type'      => $product_type, 
		'product_attribute' => $product_attribute, 
	); 
	$insert = $db->tbInsert($tblName, $productData); 
}
else if ( ! empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && ! empty($_GET['ID']))
{
	$conditions = array('ID' => $_GET['ID']);
	$delete     = $db->tbDelete($tblName, $conditions);
}
else if ( ! empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete_multi' && ! empty($_POST['product_chk']))
{
	$product_IDs = $_POST['product_chk'];
	
	foreach ($product_IDs as $val)
	{
		$conditions = array('ID' => $val);
		$delete     = $db->tbDelete($tblName, $conditions);
	}
}

header("Location: $redirectURL");
exit;
