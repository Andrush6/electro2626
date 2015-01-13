<?php

class db_connection {

  private static $_instance = null;
  private $_table;
  private $_conn;
  private $_order;
  private $_desc = false;
  private $_category;

  public static function init() {
	if (self::$_instance === null) {
	  self::$_instance = new db_connection();
	}
	return self::$_instance;
  }

  public function __construct() {
	$db_config = include 'config/db_config.php';
	$this->_conn = mysqli_connect($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);
	if (!$this->_conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	$this->_conn->set_charset("utf8"); 
	return $this;
  }

  public function products() {
	$this->_table = 'products';
	return $this;
  }
  
  public function categories(){
	$this->_category = null;
	$this->_table = 'categories';
	return $this;
  }

  public function users() {
	$this->_table = 'users';
	return $this;
  }

  public function carts() {
	$this->_table = 'carts';
	return $this;
  }

  public function order($field) {
	$this->_order = $field;
	return $this;
  }
  
  public function desc() {
	$this->_desc = true;
	return $this;
  }
  
  public function product_category($category) {
	$this->_category = $category;
	return $this;
  }
  
  public function get() {
	$sql = "SELECT * FROM " . $this->_table. " ";
	if($this->_category != null){
	  $sql .= "WHERE category_id = " .(int) $this->_category . " ";
	}
	if($this->_order != null){
	  $sql .= "ORDER BY ".$this->_order. " " . ($this->_desc ? "DESC " : "ASC ");
	}
	$result = $this->_conn->query($sql);
	$data = array();
	if ($result->num_rows > 0) {
	  while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	  }
	}
	return $data;
  }

  public function get_product_by_id($id) {
	$sql = "SELECT * FROM products WHERE id =".$id;
	$result = $this->_conn->query($sql);
	return $result->fetch_assoc();
  }
  
  public function insert_customer($customer_datas) {
	$sql = "INSERT INTO customers (name, email, address, tel) VALUES ('" . $customer_datas['name'] . "', '" . $customer_datas['email'] . "', '" . $customer_datas['address'] . "', '" . $customer_datas['tel'] . "' )";
	$this->_conn->query($sql);
	return $this->_conn->insert_id;
  }
  
  public function insert_order($customer_id, $product_datas){
	$sql = "INSERT INTO orders (customer_id, product_datas) VALUES (" . $customer_id . ", '" . $product_datas . "')";
	$this->_conn->query($sql);
  }
}
