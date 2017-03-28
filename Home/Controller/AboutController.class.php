<?php 
	include_once 'BaseModel.class.php';
	class About extends Base{
		public function about(){
			//这就是构造函数!!!
			$base = new Base();
			include dirname(dirname(__FILE__)).'\View\about.html';
		}
	}
 ?>