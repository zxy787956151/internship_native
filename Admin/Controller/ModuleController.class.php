<?php 
	include_once 'BaseController.class.php';
	include '../Common/Db_mysqli.php';
	include '../Common/Db_pdo.php';
	include '/Model/ModuleModel.class.php';
	class Module extends Base{
		use Db_pdo;
		use Db_mysqli;
		//解决多继承,后期改成接口
		use ModuleModel;
		public function source(){
			$base = new Base();
			$base->source();
			$pdo = $this->db_pdo('internship_native');
			$module = $this->p_select('Module',$pdo);
			$module = $this->DFS($module);
			//再把压缩好的数组打开! 闲的
			$show = $this->showDfs($module);
			include dirname(dirname(__FILE__)).'\View\right.html';
		}

		public function m_add(){
			$base = new Base();
			$base->source();
			$pdo = $this->db_pdo('internship_native');
			
			if ($this->I('submit')=='确认保存') {
				$data = array(
					'title' => $this->I('title'),
					'alias' => $this->I('alias'),
					'parentid' => $this->I('parentid'),
					);
				if ($judge = $this->p_add('Module',$pdo,$data)) {
					$url = "../Admin/index.php?c=Module&f=source";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}else{
					$url = "../Admin/index.php?c=Base&f=error&error=404!&from=Module";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
			}

			$module = $this->p_select('Module',$pdo);
			$module = $this->DFS($module);
			$show = $this->showDfs($module);
			include dirname(dirname(__FILE__)).'\View\moduleFrom.html';
		}

		public function m_delete(){
			$link = $this->db_mysqli('internship_native');
			$where['id'] = $this->I('id','get');
			$type = $this->I('type');

			if ($type=='all') {
				$checkbox = $this->I('checkbox');
				for ($i=0; $i <count($checkbox) ; $i++) { 
					$where['manyCond']['id'][] = $checkbox["$i"];
				}
				if ($this->i_delete('Module',$where,$link,$manyCond = array('id'))) {
					$url = "../Admin/index.php?c=Module&f=source";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}else{
					$url = "../Admin/index.php?c=Base&f=error&error=404!&from=Module";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
			}else{
				if ($judge = $this->i_delete('Module',$where,$link)) {
					$url = "../Admin/index.php?c=Module&f=source";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}else{
					$url = "../Admin/index.php?c=Base&f=error&error=404!&from=Module";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
			}
		}
		//因涉及到关键字(控制器命名),暂不提供修改
		// public function m_update(){
		// 	$base = new Base();
		// 	$base->source();

		// 	include dirname(dirname(__FILE__)).'\View\moduleFrom.html';
		// }
	}
 ?>