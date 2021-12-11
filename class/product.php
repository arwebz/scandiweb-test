<?php
class Product
{
	public $db;

	public function __construct($_db)
	{
		$this->db = $_db;
	}
}


class DVD extends Product
{
	public function showProduct()
	{
		$conditions  = array(
			'select' => 'ID, product_sku, product_name, product_price, product_type, product_size',
			'where' => array(
				'product_type' => '1'
			)
		);
		$rows = $this->db->tbSelect('product', $conditions);

		foreach ($rows as $key => $row) {
			$rows[$key]['product_attribute'] = 'Size (MB) : ' . $row['product_size'];
		}

		return $rows;
	}
}


class Book extends Product
{
	public function showProduct()
	{
		$conditions  = array(
			'select' => 'ID, product_sku, product_name, product_price, product_type, product_weight',
			'where' => array(
				'product_type' => '2'
			)
		);
		$rows = $this->db->tbSelect('product', $conditions);

		foreach ($rows as $key => $row) {
			$rows[$key]['product_attribute'] = 'Weight (KG) : ' . $row['product_weight'];
		}

		return $rows;
	}
}


class Furniture extends Product
{
	public function showProduct()
	{
		$conditions  = array(
			'select' => 'ID, product_sku, product_name, product_price, product_type, product_height, product_width, product_length',
			'where'  => array(
				'product_type' => '3'
			)
		);
		$rows = $this->db->tbSelect('product', $conditions);

		foreach ($rows as $key => $row) {
			$rows[$key]['product_attribute'] = 'Dimension (CM) : ' . $row['product_height'] . 'x' . $row['product_width'] . 'x' . $row['product_length'];
		}

		return $rows;
	}
}
