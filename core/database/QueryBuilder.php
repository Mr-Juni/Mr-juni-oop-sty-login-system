<?php


session_start();

class QueryBuilder
{
	protected $pdo;
	protected $query;
	protected $result;
	protected $count;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectData($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}

	public function action($action, $table, $where = array())
	{
			
		if (count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field    = $where[0];
			$operator = $where[1];
			$value    = $where[2];

			if (empty($field) || empty($value)) {
				$query = "{$action} FROM {$table}";
			}else {
				if (in_array($operator, $operators)) {
					$query = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					//Bind the value to the query method above
				}
			}
					
				try {

						return $this->query($query, array($value));

					} catch (Exception $e) {

						die('1 Oops something when wrong');
					}

		}
	}


	public function query($sql, $params = array())
	{
		$this->query = $this->pdo->prepare($sql);
		//check for equaliy
		if ($this->query) {
			//count the params
			$x = 1;
			if (count($params)) {
				//loop thru and bind the values
				foreach ($params as $param) {
					//use the $x variable to locate the place hoder from the sql query
					$this->query->bindValue($x, $param);
					$x++;
				}
			}


			try {

				$this->query->execute();
				//Return the data's 
				$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
				//update the count property 
				$this->count = $this->query->rowCount();


			} catch (Exception $e) {

				die('2 Oops something when wrong');
			}
			
		}


		return $this->result();
	}

	public function result()
	{
		return $this->result;
	}

	public function getCount()
	{
		return $this->count;
	}
	
	public function updateData($table, $id, $id_name, $fields)
	{
		$set = "";
		$x = 1;
		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";

			if ($x < count($fields)) {
				$set .= " , ";
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE {$id_name} = {$id}";


		try {

				return $this->query($sql, $fields);

			} catch (Exception $e) {

				die('1 Oops something when wrong');
			}	
	
	}

	public function InsertData($table, $parameters)
	{
		//get the first array key from the array

		
		$sql = sprintf(

				'INSERT INTO %s (%s) VALUES (%s)',
				//first place holder	
				 $table,
				//Second place holder	
				 implode(',', array_keys($parameters)),
				//Third place holder
				 ':' . implode(', :', array_keys($parameters))
			);

		try {
			$statement = $this->pdo->prepare($sql);

		    $statement->execute($parameters);

		} catch (Exception $e) {
			die('Oops something when wrong');
		}
	
	}
}

?>