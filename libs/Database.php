<?php
namespace libs;

class Database extends \PDO
{

	private static $connection = null;
	public function __construct()
	{
		try {
			parent::__construct(
				DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME,
				DB_USER,
				DB_PASS,
				array(
					\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
					\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
				)


			);
			//	$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//	$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
		} catch (\PDOException $e) {
			echo "Не удалось создать соединение" . $e->getCode() . '|' . $e->getMessage();
			die();
		}
	}


	//public getInstance() returns existing or creates new connection public static 
	public static function getInstance()
	{
		// Create the connection if not already created 
		if (self::$connection == null) {
			self::$connection = new self();
			self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//включен обработчик ошибок для try catch
		}
		// And return a reference to that connection 
		return self::$connection;
	}

	protected function command($sql)
    {
        try {
			$con =  self::getInstance();
			$con->exec($sql);
            echo "\n<<--- {$sql} --->> successfully\n";
        } catch (\PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        return true;
    }
}
