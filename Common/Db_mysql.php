<?php 
	trait Db_mysql{
		public function db_mysql($db){
			@header("Content-Type: text/html; charset=utf-8") ;
			set_time_limit(0);
			error_reporting( E_ALL&~E_NOTICE );
			$con = mysql_connect("localhost","root","root");
			if (!$con) {  die('噢 not connect: ' . mysql_error());  }
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

		public function update($table,$con,$data,$where,$issetImg){
			//修改的条件不能为空
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
			// var_dump($sql);
			// die();
			$result = mysql_query($sql);
			return $result;
		}

		public function delete($table,$con,$where,$manyCond=null){
			if ($manyCond) {
				foreach ($manyCond as $mk => $mv) {
					$condition = $mv."='".$where['manyCond']["$mv"]['0']."'";
					foreach($where['manyCond'] as $wk => $wv){
						if ($wk == $mv) {
							foreach ($wv as $k => $v) {
								if ($k == 0) {
									continue;
								}
								$condition .= " or ".$mv."='".$v."'";
							}
						} 
					}
				}
			}else{
				$key = array_keys($where);
				$condition = $key['0']."='".$where[$key['0']]."'";
				for ($i=1; $i <count($where) ; $i++) { 
					$condition .= " or ".$key[$i]."='".$where[$key[$i]]."'";
				}
			}
			$sql = "DELETE FROM ".$table." where ".$condition.";";
			// var_dump($sql);
			// die();
			$result = mysql_query($sql);
			// var_dump($result);
			// die();
			return $result;
		}
	}
 ?>