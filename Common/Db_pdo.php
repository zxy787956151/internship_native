<?php 
	trait Db_mysqli{
		public function db_pdo(){
			$db = array(
			    'dsn' => 'mysql:host=localhost;dbname=internship_native;port=3306;charset=utf8',
			    'host' => 'localhost',
			    'port' => '3306',
			    'dbname' => 'test',
			    'username' => 'root',
			    'password' => 'root',
			    'charset' => 'utf8',
			);

			//连接
			$options = array(
			    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
			);					
		}
	}
 ?>