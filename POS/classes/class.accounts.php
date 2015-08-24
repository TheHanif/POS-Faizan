<?php 
/**
* INVENTORY MAIN CLASS
*/
class accounts extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'accounts';
		$this->general_ledger = 'accounts_general_ledger';
		$this->sales = 'accounts_sales';
		$this->profitloss = 'accounts_profitloss';	
		$this->payable_receviable = 'accounts_payable_receviable';	
		$this->purchases = 'accounts_purchases';	
	}


	/**
     * General Ledger Entry Insert
     * @param  Float $amount	type Float
     * @param  varchar $type Debit / Credit
     * @param  varchar $account Purchase, Bank, Supplier etc etc
     * @param  varchar $account_type General Purchase, Bank Name etc etc
     * @param  varchar $Date
     * @return Result True / False
     */
	public function create_general_ledger($amount, $type, $account, $account_type, $date)
	{
		$data = array();
		$data['gl_amount'] = $amount;
		$data['gl_type'] = $type;
		$data['gl_account'] = $account;
		$data['gl_account_type'] = $account_type;
		$data['gl_date'] = $date;

		$this->insert($this->general_ledger, $data);
		return $this->row_count();
	} // end of General Ledger Entry Insert


	/**
     * Sales Insert
     * @param  Int $product_id
     * @param  Float $cost
     * @param  Float $price
     * @param  Int $quantity
     * @param  Float $total
     * @param  varchar $date
     * @return Result True / False
     */
	public function create_sales($product_id, $cost, $price, $quantity, $total, $date)
	{
		$data = array();
		$data['sales_product_id'] = $product_id;
		$data['sales_cost'] = $cost;
		$data['sales_price'] = $price;
		$data['sales_quantity'] = $quantity;
		$data['sales_total'] = $total;
		$data['sales_date'] = $date;
		$this->insert($this->sales, $data);
		return $this->row_count();
	} // end of Sales Insert


	// Get Sales Report
	public function get_sales($product_id = NULL, $to_date = NULL, $from_date = NULL)
	{
		if (isset($product_id)) {
			// $this->where('sales_product_id',$product_id);
		}
		if (isset($to_date)) {
			$this->where('sales_timestamp', array($to_date,$from_date), 'BETWEEN');
		}
		$this->from($this->sales);
		return $this->all_results();
	} // End of Sales Report


	/**
     * Profit / Loss Insert
     * @param  Int $product_id
     * @param  Float $cost
     * @param  Float $price
     * @param  Int $quantity
     * @param  Float $profit
     * @param  varchar $date
     * @return Result True / False
     */
	public function create_profitloss($product_id, $cost, $price, $quantity, $profit, $date)
	{
		$data = array();
		$data['pl_product_id'] = $product_id;
		$data['pl_cost'] = $cost;
		$data['pl_price'] = $price;
		$data['pl_quantity'] = $quantity;
		$data['pl_profit'] = $profit;
		$data['pl_date'] = $date;
		$this->insert($this->profitloss, $data);
		return $this->row_count();
	} // end of Profit / Loss Insert


	/**
     * Payable / Receviable Insert
     * @param  Float $amount
     * @param  varchar $account
     * @param  varchar $person
     * @param  varchar $date
     * @param  varchar $due_date
     * @param  varchar $type (Payable / Receviable)
     * @param  int 	   $status
     * @return Result True / False
     */
	public function create_payable_receviable($amount, $account, $account_type, $date, $due_date, $type, $status)
	{
		$data = array();
		$data['pr_amount'] = $amount;
		$data['pr_account'] = $account;
		$data['pr_account_type'] = $account_type;
		$data['pr_date'] = $date;
		$data['pr_due_date'] = $due_date;
		$data['pr_type'] = $type;
		$data['pr_status'] = $status;
		$this->insert($this->payable_receviable, $data);
		return $this->row_count();
	} // End of Payable / Receviable Insert


	/**
     * Create Purchase Insert
     * @param  varchar	$product
     * @param  float 	$cost
     * @param  int 		$quantity
     * @param  varchar	$date
     * @param  varchar 	$account
     * @param  varchar 	$account_type
     * @return Result True / False
     */
	public function create_purchase($product, $cost, $quantity, $date, $account, $account_type)
	{
		$data = array();
		$data['purchase_product'] = $product;
		$data['purchase_cost'] = $cost;
		$data['purchase_quantity'] = $quantity;
		$data['purchase_date'] = $date;
		$data['purchase_account'] = $account;
		$data['purchase_account_type'] = $account_type;
		$this->insert($this->purchases, $data);
		return $this->row_count();
	} // End of Create Purchase Insert

} // end of class


 ?>