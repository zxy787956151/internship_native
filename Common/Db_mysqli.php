<?php 
	trait Db_mysqli{
		public function db_mysqli($dbname){
				$db = array(
				    'dsn' => 'mysqli:host=localhost;dbname='.$dbname,
				    'host' => 'localhost',
				    'port' => '3306',
				    'dbname' => $dbname,
				    'username' => 'root',
				    'password' => 'root',
				    'charset' => 'utf8',
				);

				//mysqli过程化风格

				//建立连接:相比mysql_connect可以直接选择dbname、port
				//$link = mysqli_connect($db['host'], $db['username'], $db['password'], $db['dbname'], $db['port']);
				$link = mysqli_connect($db['host'], $db['username'], $db['password']) or die( 'Could not connect: '  .  mysqli_error ($link));

				//选择数据库
				mysqli_select_db($link, $db['dbname']) or die ( 'Can\'t use foo : '  .  mysqli_error ($link));

				mysqli_set_charset($link, $db['charset']);


				//数据库查询

				//普通查询，返回资源
				// $result  = mysqli_query($link, 'select * from user');

				//取得结果集中行的数目 
				// $num_rows  =  mysqli_num_rows ( $result );


				//新增：
				/*
				$insert_sql = sprintf("insert into user(name,gender,age) values('%s', '%d', '%d')", 'test', 1, 22);
				mysqli_query($link, $insert_sql) or die(mysqli_error($link));

				echo $affected_rows = mysqli_affected_rows($link);
				echo $id = mysqli_insert_id($link);

				*/

				//更新
				/*
				mysqli_query($link, sprintf("update user set name = '%s' where id = %d", 'test2', 12));

				echo $affected_rows = mysqli_affected_rows($link);
				*/

				//删除
				/*
				mysqli_query($link, sprintf("delete from user where id = %d", 12));

				echo $affected_rows = mysqli_affected_rows($link);
				*/

				//遍历结果集
				// while ($row = mysqli_fetch_assoc($result)){
				//     echo '<pre>';
				//     print_r($row);
				// }

				//关闭数据库
				// mysqli_close($link);
				return $link;
			}

			public function i_add($table,$data,$link){
				$key = array_keys($data);
				$sql_k = $key['0'];
				$sql_v = "'".$data[$key['0']]."'";
				for ($i=1; $i <count($data) ; $i++) { 
					$sql_k .=",".$key["$i"];
					$sql_v .=",'".$data[$key["$i"]]."'";			
				}
				$insert_sql = "INSERT INTO ".$table."(".$sql_k.")values(".$sql_v.")";
				//sql语句格式一定要严格对应sql语句包括INTO后有空格,User(里无''),values(里必有'')!
				

				mysqli_query($link, $insert_sql) or die(mysqli_error($link));
				//mysqli_error输出sql报错,很给力!

				// echo $affected_rows = mysqli_affected_rows($link);
				$id = mysqli_insert_id($link);	
				return $id;
			}

			public function i_select($table,$link,$where=null){
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

				//普通查询，返回资源
				$result  = mysqli_query($link,$sql);
				return $result;
				//就不返回结果集条数了!				
			}
	}
		
 ?>