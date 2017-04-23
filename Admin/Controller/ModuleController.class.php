<?php 
	include_once 'BaseController.class.php';
	include '../Common/Db_pdo.php';
	include '/Model/ModuleModel.class.php';
	class Module extends Base{
		use Db_pdo;
		//解决多继承,后期改成接口
		use ModuleModel;
		public function source(){
			$base = new Base();
			$base->source();
			$pdo = $this->db_pdo('internship_native');
			$module = $this->p_select('Module',$pdo);
			$module = $this->DFS($module);
			$this->test($module);
			include dirname(dirname(__FILE__)).'\View\right.html';
		}
	}
 ?>