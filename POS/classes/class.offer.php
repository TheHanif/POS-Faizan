<?php 
/**
* INVENTORY MAIN CLASS
*/
class offer extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name 	= 'discount';
		$this->table_offer	= 'offers';
	}

	public function insert_offer($form)
	{
		$data = array();
		$data['product_id']			= $form['product_id'];
		$data['min_purchase_qty']	= $form['min_purchase'];
		$data['type'] 				= $form['type'];
		$data['status']				= $form['status'];
		
		// Offer Insert in Discount Table
		$this->insert($this->table_name, $data);
		if($this->row_count() > 0){
			$offer_id = $this->last_id();
		}
		else {
			return false;
		}

		// Offer Products Insert in Offer Table
		if($offer_id){
			foreach ($form['offer']['product_id'] as $key => $product_id) {
				$offer = array();
				$offer['promotion_id']		= $offer_id;
				$offer['product_id']		= $product_id;
				$offer['product_quantity']	= $form['offer']['qty'][$key];
				$offer['status']			= 1;
				$this->insert('offers', $offer);
			}
			return true;
		}
		else{
			return false;
		}

	} // end of insert

	public function update_offer($form, $id)
	{
		
	
		$data = array();
		$data['product_id']			= $form['product_id'];
		$data['min_purchase_qty']	= $form['min_purchase'];
		$data['type'] 				= $form['type'];
		$data['status']				= $form['status'];
		
		// Offer Update in Discount Table
		$this->where('id', $id);
		$this->update($this->table_name, $data);

		// Offer Products Delete Only Latest Product for Offer Table
		$this->where('promotion_id', $id);
		$this->where('status', 1);
		$this->delete($this->table_offer, $num_rows = NULL);

		// Offer Products Insert in Offer Table
		if($form['offer']['product_id']){
			foreach ($form['offer']['product_id'] as $key => $product_id) {
				$offer = array();
				$offer['promotion_id']		= $id;
				$offer['product_id']		= $product_id;
				$offer['product_quantity']	= $form['offer']['qty'][$key];
				$offer['status']			= 1;
				$this->insert('offers', $offer);
			}
			return true;
		}
		else{
			return false;
		}
	
	} // end of update

	public function get_products($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = discount.product_id');
			$this->where('discount.id',$ID);
			$this->where('discount.type','offer');
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			// $this->where('id',$ID);
			$this->inner_join('products', 'p', 'p.p_id = discount.product_id');
			$this->where('type','offer');
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get

	public function get_offers($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'pro', 'pro.p_id = offers.product_id');
			$this->where('offers.promotion_id',$ID);
			$this->where('offers.status',1);
			$this->from($this->table_offer);
			return $this->all_results();
		}
	} // end of get

} // end of class


 ?>