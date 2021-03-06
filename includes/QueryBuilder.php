<?php

class QueryBuilder {
	
	static $connetion;
	private $dbHost     = '127.0.0.1';
	private $dbName     =  'boldleads';
	private $dbUser     =  'root';
	private $dbPassword =  '';

	
	private $table     = null;
	private $where     = null;
	private $columns   = null;
	private $statement = null;
	private $orderBy = null;

	function __construct() {
		$this->initDB();
	}

	private function initDB() {

		if (isset(self::$connetion)) {
			return self::$connetion;
		}
		try {
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
		if (empty($array)) {
			exit("Query not found");
		}
		$this->makeInsertStatement($array);
		
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
		$this->makeUpdateStatement($array);
		$statement = self::$connetion->prepare($this->statement);
		return $statement->execute();
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
		
		if (!empty($this->where)) {
			$this->statement .= ' where ' . $this->where;
		}
		return $this;
	}

	public function get($columns = []) {
		if (empty($columns)) {
			$this->columns = ' * ';
		} else {
			$this->columns = implode(", ", $columns);
		}
		return $this->executeSelectStatement();
	}

	private function executeSelectStatement() {
		$this->statement = 'select '. $this->columns . ' from ' . $this->table;
		if (!empty($this->where)) {
			$this->statement .= ' where ' . $this->where;
		}
		if (!empty($this->orderBy)) {
			$this->statement .=  $this->orderBy;
		}
		
		$statement = self::$connetion->prepare($this->statement);
		$statement->execute();
		return  $statement->fetchAll();
	}

	public function orderBy($column = '', $order = 'asc') {
		if (!empty($column)) {
			$this->orderBy = ' order by '. $column . " ". $order;
		}
		return $this;
	}

	public function getById($id = 0) {
		
		$this->where = 'id = ' . $id;
		$this->statement = 'select * from '. $this->table;
		$this->statement .= ' where ' . $this->where;
		
		$statement = self::$connetion->prepare($this->statement);
		$statement->execute();
		return  $statement->fetch();
	}
}