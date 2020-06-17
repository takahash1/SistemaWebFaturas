<?php

require_once "config.php";

class Database extends PDO {
    public $pdo;
    public function __construct()
	{
		try {
            $this->pdo = parent::__construct("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASSWORD);
            
		} catch (PDOException $e) {
			var_dump($e);
        }
    }
    
    public function execute($sql)
	{
		try {
            $sth = $this->pdo->execute($sql);
            if(!$sth) {
                var_dump($sth->errorInfo());
                return $sth;

            } else {
                return $sth;

            }
            
		} catch (PDOException $e) {
			var_dump($e);
		}
	}
}


