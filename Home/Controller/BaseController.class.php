<?php 
	class Base{
		public function base(){
			header("Content-type: text/html; charset=utf-8"); 
  			// header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
  			// require_once dirname(dirname(dirname(dirname(__FILE__)))).'\Public\init.smarty.php'
  			// define('__PUBLIC__',str_replace('\\','/',dirname(dirname(dirname(__FILE__)))).'/Public');
  			@define('__PUBLIC__','/Home/Public');
  			@define('__VIEW__','/Home/View');
  			@define('__Controller__','/Home/Controller');
		}
	}
 ?>