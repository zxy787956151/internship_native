<?php 
	trait Db_mysql{
		public function db_mysql($db){
			@header("Content-Type: text/html; charset=utf-8") ;
			set_time_limit(0);
			error_reporting( E_ALL&~E_NOTICE );
			$con = mysql_connect("localhost","root","root");
			if (!$con) {  die('Could not connect: ' . mysql_error());  }
			else{
				mysql_select_db("$db", $con);
				// echo '连接成功!';
			}
			return $con;
		}

		public function add($table,$data,$con){
			$key = array_keys($data);
			$sql_k = $key['0'];
			$sql_v = "'".$data[$key['0']]."'";
			for ($i=1; $i <count($data) ; $i++) { 
				$sql_k .=",".$key["$i"];
				$sql_v .=",'".$data[$key["$i"]]."'";			
			}
			$sql = "INSERT INTO ".$table."(".$sql_k.")values(".$sql_v.")";
			//sql语句格式一定要严格对应sql语句包括INTO后有空格,User(里无''),values(里必有'')!
			$result = mysql_query($sql);
			mysql_close($con);
			return $result;
		}

		public function select($table,$con,$where=null){
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
			$result = mysql_query($sql);
			return $result;
			//直接返回result 不咋这里做mysql_fetch_array(),否则外面不能执行while!
		}
	}
 ?>