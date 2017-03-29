<?php 
	trait Config{
		public function config(){
			header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
			header("Content-type: text/html; charset=utf-8");
			@define('__PUBLIC__','/Admin/Public');
  			@define('__VIEW__','/Admin/View');
  			@define('__Controller__','/Admin/Controller');
		}
	}
 ?>