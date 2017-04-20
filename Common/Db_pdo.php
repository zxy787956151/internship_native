<?php 
	trait Db_pdo{
		public function db_pdo($dbname){
			$db = array(
			    'dsn' => 'mysql:host=localhost;dbname='.$dbname.';port=3306;charset=utf8',
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

			try{
			    $pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
			}catch(PDOException $e){
			   	return 0;
			    // die('数据库连接失败:' . $e->getMessage());
			}	
			return $pdo;
		}

		public function p_select($table,$pdo,$where=null){
			if (isset($where)) {
				$key = array_keys($where);
				$condition = $key['0']."='".$where[$key['0']]."'";
				for ($i=1; $i <count($where) ; $i++) { 
					$condition .= " and ".$key['0']."='".$where[$key['0']]."'";
				}
				$sql = "SELECT * FROM ".$table." where(".$condition.");";
			}else{
				$sql = "SELECT * FROM ".$table.";";
			}

			$stmt = $pdo->prepare($sql);
			// $stmt->bindValue(1,'test');
			// $stmt->bindValue(2,22);
			$stmt->execute();  //执行一条预处理语句 .成功时返回 TRUE, 失败时返回 FALSE 
			$rows = $stmt->fetchAll();
			if ($stmt) {
				return $rows;
			}
			return 0;
		}

		public function p_update($table,$pdo,$data,$where,$issetImg=0){
			$key = array_keys($data);
			$condition = $key['0']."='".$data[$key['0']]."'";
			//update 修改字段间隔是逗号不是and
			for ($i=1; $i <count($data) ; $i++) { 
				if($key[$i] == 'photourl' && $issetImg == '0'){
					continue;
				}else if($key[$i] == 'photoname' && $issetImg == '0'){
					continue;
				}

				$condition .= ",".$key[$i]."='".$data[$key[$i]]."'";
			}

			$key = array_keys($where);
			$w_condition = $key['0']."='".$where[$key['0']]."'";
			for ($i=1; $i <count($where) ; $i++) { 
				$w_condition .= " and ".$key[$i]."='".$where[$key[$i]]."'";
			}
			$sql = "UPDATE ".$table." set ".$condition." where ".$w_condition.";";

			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			if ($stmt) {
				return 1;
			}
			return 0;
		}
	}
 ?>