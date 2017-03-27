<?php 
	include_once 'BaseModel.class.php';
	class Index extends Base{
		public function index(){
		//※※问题解决,这就是构造函数!!!※※
		//index方法类似构造方法,在创建对象时候会自动执行,故不要在执行index方法,2重
			//dirname函数得当前文件所在的绝对目录,可迭代使用
			$base = new Base();
			//此处不执行index还不行?,与上述结论冲突?未解决!!
		  	// $smarty = new Smarty();
			// $smarty->display(dirname(dirname(dirname(__FILE__))).'\index.html');
			include dirname(dirname(__FILE__)).'\View\index.html';
		}
	}
 ?>