<?php 
	include_once 'BaseController.class.php';
	//必须用,影响效率
	class Index extends Base{
		use Common;
		public function source(){
			$base = new Base();
			$base->source();
			$this->user_id = $this->I('user_id','ses');
			include dirname(dirname(__FILE__)).'\View\index.html';
		}

		public function show($type){
			include dirname(dirname(__FILE__))."\View\\".$type.".html";
		}

		public function logout(){
			$_SESSION['user_id'] = null;
			var_dump($_SESSION['user_id']);
			if (!isset($_SESSION['user_id'])) {
				include dirname(dirname(__FILE__))."\View\\login.html";
			}
		}
	}
 ?>