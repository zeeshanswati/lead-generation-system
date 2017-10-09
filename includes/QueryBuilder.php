<?php

class QueryBuilder {
	
	static $connetion;
	private $dbHost     = '127.0.0.1';
	private $dbName     =  'boldleads'; //null;
	private $dbUser     =  'root'; //null;
	private $dbPassword =  ''; //null;

	
	private $table     = null;
	private $where     = null;
	private $columns   = null;
	private $statement = null;

	function __construct() {
		$this->initDB();
	}

	private function initDB() {

		if (isset(self::$connetion)) {
			return self::$connetion;
		}

		try {
			print_r(self::$connetion);
			$dsn = 'mysql:host=' .$this->dbHost. ';dbname=' .$this->dbName;
		    return self::$connetion = new PDO($dsn, $this->dbUser, $this->dbPassword);
		} catch (PDOException $e) {
		    die( 'Connection failed: ' . $e->getMessage());
		}
	}

	public function table($table = '') {
		$this->table = $table;
		return $this;
	}

	public function where($column = '', $operator = '=', $value = '') {
		if (!empty($this->where)) {
			$this->where .= " and " . $column .' ' .$operator . "'" .$value ."'";
			return $this;
		}
		$this->where = $column .' ' .$operator . "'" .$value ."'";
		return $this;
	}

	public function insert($array = []) {
		// print_r($array);
		// exit;
		if (empty($array)) {
			exit("Query not found");
		}
		$this->makeInsertStatement($array);
		
		//exit;
		$statement = self::$connetion->prepare($this->statement);
		$statement->execute();
		return self::$connetion->lastInsertId();
	}

	private function makeInsertStatement($array) {

		foreach ($array as $key => $val) {
			$array[$key] = "'".$val."'";
		}
		$array["created_at"] = "'".date("Y-m-d H:i:s")."'";
		$array["updated_at"] = "'".date("Y-m-d H:i:s")."'";
		
		$this->statement = 'insert into '. $this->table . " (". implode(", ", array_keys($array)) . ") VALUES (" .implode(", ", array_values($array)) . ")";
		return $this;
	}

	public function update($array = []) {
		//echo "UPDATE";
		$this->makeUpdateStatement($array);
		//echo $this->statement;
		$statement = self::$connetion->prepare($this->statement);
		return $statement->execute();
		// return self::$connetion->lastInsertId();
	}

	private function makeUpdateStatement($array) {
		$setColumnsValues = '';
		if ($array) {
			foreach ($array as $key => $val) {
				$setColumnsValues  .= $key ." = '" . $val . "', ";
			}
		}
		$setColumnsValues .= " updated_at = '" . date("Y-m-d H:i:s") . "' ";
		
		$this->statement = 'update '. $this->table . " set ". $setColumnsValues ;
		//echo $this->statement;exit;
		if (!empty($this->where)) {
			$this->statement .= ' where ' . $this->where;
		}
		return $this;
	}
}