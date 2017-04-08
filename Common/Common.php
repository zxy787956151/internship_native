<?php 
/**
 *  函数库 用的时候在类中 use Common; 即可调用方法,加$this哦!
 */
	trait Common{
		//※※※Trait 是为类似 PHP 的单继承语言而准备的一种代码复用机制,这里用于实现多继承
		//Traits可以理解为一组能被不同的类都能调用到的方法集合，但Traits不是类！不能被实例化
		public function test($data)
		{
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}

		public function I($name,$type="post"){
		//默认post传值,U方法没写!
			@session_start();
			switch ($type) {
				case 'post':
					return $_POST["$name"];
					break;
				case 'get':
					return $_GET["$name"];
					break;
				case 'ses':
					return @$_SESSION["$name"];
					break;
			}
		}

		
	}
 ?>