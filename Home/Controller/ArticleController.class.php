<?php 
	include_once 'BaseController.class.php';
	include '../Common/Db_pdo.php';
	class Article extends Base{
		use Db_pdo;
		public function source(){
			$base = new Base();
			$pdo = $this->db_pdo('internship_native');
			
			$article = $this->p_select('Article',$pdo);
			$pageNum = ceil(count($article)/9);
			$page = $this->I('pid','get');
			//$this->I('page','get')返回的是一个值，直接判断就行没办法isset
			if ($page!=NULL) {
				//赋值同样也无法进行	
				$pageE = 9*$page;
				$pageS = $pageE - 8;
			}else{
				//强制记录一下当前是第几页
				$page = 1;
				$pageS = 1;
				$pageE = 9;
			}
			include dirname(dirname(__FILE__)).'\View\newlist.html';
		}

		public function show(){
			$base = new Base();
			$pdo = $this->db_pdo('internship_native');
			$where['id'] = $this->I('id','get'); 
			//浏览量加一
			$art = $this->p_select('Article',$pdo,$where);
			$data = array(
				//确定只有一条!
				'browse' =>@$art['0']['browse']+1, 
				);
			if($this->p_update('Article',$pdo,$data,$where)){
				$show = $this->p_select('Article',$pdo,$where);
				include dirname(dirname(__FILE__)).'\View\new.html';
			}
		}
	}
 ?>