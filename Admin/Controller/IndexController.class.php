<?php 
	include_once 'BaseController.class.php';
	class Index extends Base{
		public function source(){
			$base = new Base();
			include dirname(dirname(__FILE__)).'\View\index.html';
		}

		public function show($type){
			include dirname(dirname(__FILE__))."\View\\".$type.".html";
		}
	}
 ?>