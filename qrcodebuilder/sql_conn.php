<?php
class SQLConnection{
	private $pConn;
	private $dbName;
	
	private $dbIp;
	private $dbUser;
	private $dbPwd;
	
	public function __construct($ip, $user, $pwd, $name){
		$this->pConn = mysqli_connect($ip, $user, $pwd, $name) or die('Error with MySQL connection');
		mysqli_set_charset($this->pConn, "UTF8");
		$this->dbName = $name;
		
		$this->dbIp = $ip;
		$this->dbUser = $user;
		$this->dbPwd = $pwd;
	}
	
	public function executeSQL($sql , $returnData = true){
		mysqli_select_db($this->pConn, $this->dbName);
		$result = mysqli_query( $this->pConn, $sql );
		if(!$result)
			throw new Exception('sql error : ' . $sql);
		
		$data = Array();
		if($returnData){
			$count = 0;
			while($row = mysqli_fetch_array($result)){
				$data[$count++] = $row;
			}
		}
		return $data;
	}
	
	public function createNewConnect(){
		$conn = new mysqli($this->dbIp, $this->dbUser, $this->dbPwd, $this->dbName);
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		mysqli_set_charset($conn, "utf8");
		
		return $conn;
	}
}
?>