<?php 
require_once('config/config.php');
require_once('class/database.php');

$db          = new Database();
$tblName     = 'product';
$redirectURL = '/';

if ( ! empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'add')
{
	$insert_data['product_sku']   = trim($_POST['sku']);
	$insert_data['product_name']  = trim($_POST['name']);
	$insert_data['product_price'] = trim($_POST['price']);
	$insert_data['product_type']  = trim($_POST['productType']);
	if ( ! empty($_POST['size']) && $_POST['size'] != '')     $insert_data['product_size']   = trim($_POST['size']);
	if ( ! empty($_POST['weight']) && $_POST['weight'] != '') $insert_data['product_weight'] = trim($_POST['weight']);
	if ( ! empty($_POST['height']) && $_POST['height'] != '') $insert_data['product_height'] = trim($_POST['height']);
	if ( ! empty($_POST['width']) && $_POST['width'] != '')   $insert_data['product_width']  = trim($_POST['width']);
	if ( ! empty($_POST['length']) && $_POST['length'] != '') $insert_data['product_length'] = trim($_POST['length']);

	$insert = $db->tbInsert($tblName, $insert_data);
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
