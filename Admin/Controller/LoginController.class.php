<?php 
include '../Common/Common.php';
include '../Common/Db_mysql.php';
include '/Model/UserModel.class.php';
	class Login extends UserModel{
		use Common;
		use Db_mysql;
		public function login(){
			$con = $this->db_mysql('internship_native');
			// $where['id'] = '1';
			$user = $this->select('User',$con);
			$userM = new UserModel();
			$userM->loginVerify($user,$_POST);
		}
	}
 ?>