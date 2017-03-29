<?php 
	include '../Common/Common.php';
	include '../Common/Config.php';
	class Base{
		use Common;
		use Config;
		public function source(){
			$this->config();
  			if (!isset($_SESSION['user_id'])) {
				//include包含为什么时候用到什么时候读取!
				include dirname(dirname(__FILE__)).'\View\login.html';
  			}
		}

		public function error(){
			$this->config();
			include dirname(dirname(__FILE__)).'\View\error.html';
		}
	}
 ?>