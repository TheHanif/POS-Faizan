<?php 
/**
* INVENTORY MAIN CLASS
*/
class inventory extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'inventory';
	}

	public function inv_insert($form)
	{

		$data = array();

		$data['inv_name'] = $form['inv_name'];
		$data['inv_pid'] = $form['inv_id'];
		$data['inv_cost'] = $form['inv_cost'];
		$data['inv_price'] = $form['inv_price'];
		$data['inv_quantity'] = $form['inv_quantity'];
		$data['inv_barcode'] = $form['inv_barcode'];

		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function inv_update($form, $id)
	{
		$data = array();

		$data['inv_name'] = $form['inv_name'];
		$data['inv_cost'] = $form['inv_cost'];
		$data['inv_price'] = $form['inv_price'];
		$data['inv_quantity'] = $form['inv_quantity'];
		$data['inv_barcode'] = $form['inv_barcode'];

		$this->where('inv_id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update

	public function inv_get($ID)
	{
		$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
		$this->where('inv_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get
 

	public function get_int($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->where('inv_id',$ID);
		}

		$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
		$this->from($this->table_name);

		return $this->all_results();
	} // end of get

	public function get_product($barcode)
	{
		if (isset($barcode)) {
			
			$this->select(array(

				'd.id'=>'d_id', 
				'o.id'=>'o_id', 

				));


			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->left_join('discount', 'd', 'd.product_id = p.p_id');
			$this->left_join('offers', 'o', 'o.promotion_id = d.id');
			$this->where('o.status',1);
			$this->where('inv_barcode',$barcode);
		}
		$this->from($this->table_name);
		return $result = $this->all_results();
	} // end of get

} // end of class

//  [inv_id] => 4
// [inv_name] => Pepsi Bottle 1Ltr
// [inv_pid] => 3
// [inv_cost] => 25
// [inv_price] => 30
// [inv_quantity] => 70
// [inv_barcode] => 159753825
// [inv_ts] => 2015-08-15 15:08:07
// [p_id] => 3
// [p_name] => Pepsi Bottle 1Ltr
// [p_supplier] => 2
// [p_cost] => 45
// [p_price] => 55
// [p_gst] => 10
// [p_vat] => 123
// [p_barcode] => 159753825
// [p_volumetype] => piece
// [p_volumevalue] => Peace(s)
// [p_skucrate] => 6
// [p_skucarton] => 144
// [p_skubag] => 864
// [p_datetime] => 2015-08-12 13:05:49
// [id] => 39
// [product_id] => 1
// [discount_type] => 
// [discount_amount] => 0
// [min_purchase_qty] => 10
// [type] => offer
// [status] => 1
// [datetime] => 2015-08-19 15:17:52
// [promotion_id] => 16
// [product_quantity] => 2
//         )


// $this->from($this->table_name);
// 		$product = array();
// 		$product['product'] = $this->result();

// 		$this->where('promotion_id', $product['product'])
?>