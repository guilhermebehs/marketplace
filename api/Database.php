<?php
  class Database{

	private $servername = "localhost";
	private $db_name = "aulacloud";
	private $username = "root";
	private $password = "210393";
	 
	public function getConexao(){

     $conn = null;		 
	  try 
	  {
	      $conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db_name, $this->username, $this->password);
	      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
     catch(Exception $e){
     	echo "Erro de conexão: ".$e->getMessage();
     }
     
     return $conn; 	

	} 
	}

?>
