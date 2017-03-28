<?php 
	class Base{
		public function base(){
			header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
			header("Content-type: text/html; charset=utf-8");
			@define('__PUBLIC__','/Admin/Public');
  			@define('__VIEW__','/Admin/View');
  			@define('__Controller__','/Admin/Controller');
  		// 	if (!isset($_SESSION['user_id'])) {
				// include dirname(dirname(__FILE__)).'\View\login.html';
  		// 	}
		}
	}
 ?>