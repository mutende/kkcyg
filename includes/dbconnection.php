<?php
class dbconnection{

	private $DB_SERVER;
	private $DB_USERNAME;
	private $DB_PASSWORD;
	private $DB_DATABASE;
	private $DB_PORT;
	private $CHARSET;

	protected function connectDb(){

        //authenticate database access
		$this->DB_SERVER='remotemysql.com';
		$this->DB_USERNAME='oUSePYjrvG';
		$this->DB_DATABASE='oUSePYjrvG';
		$this->DB_PASSWORD='5SNyAIT6l0';
		$this->DB_PORT='3306';
		$this->CHARSET='utf8mb4';

		 try {
        		//dynamic source data.. used for PDO connections
                //$dsn= "mysql:host".$this->DB_SERVER."port".$this->DB_PORT.";dbname".$this->DB_DATABASE.";charset".$this->CHARSET;

                //create a PDO connection
                $connect= new PDO("mysql:host=$this->DB_SERVER;port=3306;dbname=oUSePYjrvG", $this->DB_USERNAME, $this->DB_PASSWORD);

                //call to Attribute method which has static PDO parameters for showing errors
                $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


				//return connection ... either true or false
                return $connect;

        }
        //catch block
        catch (PDOException $e) {
        	//get connection error messages.
            echo "Connection Failed: ". $e->getMessage();

        }
	}

}
