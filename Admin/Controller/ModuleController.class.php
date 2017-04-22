<?php 
	include_once 'BaseController.class.php';
	include '../Common/Db_mysql.php';
	include '../Common/Db_mysqli.php';
	include '../Common/Db_pdo.php';

	class Module extends Base{
		use Db_pdo;
		public function source(){
			$base = new Base();
			$base->source();
			$pdo = $this->db_pdo('internship_native');
			$module = $this->p_select('Module',$pdo);
			include dirname(dirname(__FILE__)).'\View\right.html';
		}
	}
 ?>