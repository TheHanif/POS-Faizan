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
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->where('inv_barcode',$barcode);
		}

		$this->from($this->table_name);


		return $result = $this->all_results();
		


	} // end of get


} // end of class


 ?>