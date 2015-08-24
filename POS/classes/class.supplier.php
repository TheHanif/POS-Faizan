 <?php 
/**
* USER MAIN CLASS
*/
class supplier extends database
{	
	
	private $table_name;

	function __construct(){
		parent::__construct();

		$this->table_name = 'supplier';
	}


	public function add_supplier($add_supplier)
	{	
		$data = array();

		$data['sup_name'] = $add_supplier['sname'];
		$data['sup_email'] = $add_supplier['email'];
		$data['sup_phone'] = $add_supplier['phone'];
		$data['sup_address'] = $add_supplier['address'];
		$data['sup_city'] = $add_supplier['city'];

		$this->insert($this->table_name, $data);

		return $this->row_count();
	} // end of do_register()


	public function update_supplier($add_supplier, $id)
	{
		
		$data = array();
			$data['sup_name'] = $add_supplier['sname'];
			$data['sup_email'] = $add_supplier['email'];
			$data['sup_phone'] = $add_supplier['phone'];
			$data['sup_address'] = $add_supplier['address'];
			$data['sup_city'] = $add_supplier['city'];
		
		$this->where('sup_id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update


	public function add_purchase($add_supplier)
	{	
		$data = array();

		$data['sup_name'] = $add_supplier['sname'];
		$data['sup_email'] = $add_supplier['email'];
		$data['sup_phone'] = $add_supplier['phone'];
		$data['sup_address'] = $add_supplier['address'];
		$data['sup_city'] = $add_supplier['city'];

		print_f($data);
		die();
		$this->insert($this->table_name, $data);

		return $this->row_count();
	} // end of do_register()

	public function get_supplier($ID)
	{
		$this->where('sup_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get

	public function get_suppliers($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('id',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get

	public function session_destroy(){
		unset($_SESSION['user']);
		session_destroy();
	}

}
 ?>