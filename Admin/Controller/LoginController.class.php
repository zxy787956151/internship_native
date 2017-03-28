<?php 
	include '../Common/Common.php';
	include '../Common/Db_mysql.php';
	class Login{
		use Common;
		use Db_mysql;
		public function login(){
			$con = $this->db_mysql('internship_native');
			$where['id'] = '1';
			$user = $this->select('User',$where,$con);
			$this->test($user);
		}
	}
 ?>