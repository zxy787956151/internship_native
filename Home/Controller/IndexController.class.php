<?php 
	include_once 'BaseController.class.php';
	//include_once耗内存
	class Index extends Base{
		public function source(){
		//※※问题解决,这就是构造函数!!!※※
		//index方法类似构造方法,在创建对象时候会自动执行,故不要在执行index方法,2重
			//dirname函数得当前文件所在的绝对目录,可迭代使用
			//此处不执行index还不行?,与上述结论冲突?未解决!!

			//※※※此处无需执行创建Base类的对象来触发构造方法,继承瞬间就触发构造方法了!
		  	// $smarty = new Smarty();
			// $smarty->display(dirname(dirname(dirname(__FILE__))).'\index.html');
			$pdo = $this->db_pdo('internship_native');
			$where['recommend'] = 1;
			$recommend = $this->p_select('Article',$pdo,$where);

			//最新文章
			$Field = array('id','title');
			$LatestArt = $this->p_select('Article',$pdo,null,$Field,'id','desc',8);

			//推荐文章
			$Field = array('browse','id','title');
			$RecArt = $this->p_select('Article',$pdo,null,$Field,null,null,8);
			arsort($RecArt);
			include dirname(dirname(__FILE__)).'\View\index.html';
		}

		public function show($type){
			include dirname(dirname(__FILE__))."\View\\".$type.".html";
			//这些include实际上用header更好
		}
	}
 ?>