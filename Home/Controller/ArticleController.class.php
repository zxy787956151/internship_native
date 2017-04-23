<?php 
	include_once 'BaseController.class.php';
	class Article extends Base{
		public function source(){
			$base = new Base();
			$pdo = $this->db_pdo('internship_native');
			
			$article = $this->p_select('Article',$pdo);
			$pageNum = ceil(count($article)/6);
			$page = $this->I('pid','get');
			//$this->I('page','get')返回的是一个值，直接判断就行没办法isset
			if ($page!=NULL) {
				//赋值同样也无法进行	
				$pageE = 6*$page;
				$pageS = $pageE - 5;
			}else{
				//强制记录一下当前是第几页
				$page = 1;
				$pageS = 1;
				$pageE = 6;
			}	
			//分类信息
			$module = $this->p_select('Module',$pdo);
			//点击排行
			$Field = array('browse','id','title');
			$ClickRank = $this->p_select('Article',$pdo,null,$Field,null,null,9);
			arsort($ClickRank);
			//最新文章
			$Field = array('id','title');
			$latest = $this->p_select('Article',$pdo,null,$Field,'id','desc',9);
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

		public function classify(){
			$base = new Base();
			$pdo = $this->db_pdo('internship_native');
			$where['alias'] = $this->I('p','get');
			$Field = array('title');
			$title = $this->p_select('Module',$pdo,$where,$Field);
			$where1['classify'] = $title['0']['title'];
			$article = $this->p_select('Article',$pdo,$where1);
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

			$module = $this->p_select('Module',$pdo);
			//栏目点击(浏览)排行
			$Field = array('browse','id','title');
			$ClickRank = $this->p_select('Article',$pdo,$where1,$Field,null,null,9);
			arsort($ClickRank);	
			//最新文章
			$Field = array('id','title');
			$where3['classify'] = $title['0']['title'];
			$latest = $this->p_select('Article',$pdo,$where3,$Field,'id','desc',9);
			include dirname(dirname(__FILE__)).'\View\newlist.html';
		}
	}
 ?>