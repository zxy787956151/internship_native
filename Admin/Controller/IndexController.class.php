<?php 
	include_once 'BaseController.class.php';
	//必须用,影响效率
	class Index extends Base{
		use Common;
		public function source(){
			// session_destroy();
			$base = new Base();
			$base->source();
			$this->user_id = $this->I('user_id','ses');
			include dirname(dirname(__FILE__)).'\View\index.html';
		}

		public function show($type){
			$base = new Base();
			$base->source();
			//此处因Index控制器下的index方法改为source方法,故不会执行Base/Config.php
			include dirname(dirname(__FILE__))."\View\\".$type.".html";
		}

		public function logout(){
			$_SESSION['user_id'] = null;
			if (!isset($_SESSION['user_id'])) {
				include dirname(dirname(__FILE__))."\View\\login.html";
			}
		}
	}
 ?>