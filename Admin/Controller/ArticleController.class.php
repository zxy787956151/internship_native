<?php 
	include_once 'BaseController.class.php';
	include '../Common/Db_mysql.php';
	include '../Common/Db_mysqli.php';

	class Article extends Base{
		use Db_mysql;
		use Db_mysqli;
		public function source(){
			$base = new Base();
			$base->source();
			$link = $this->db_mysqli('internship_native');
			$result = $this->i_select('Article',$link);
			$num_rows = mysqli_num_rows ($result);
			//ceil向上取整
			$pageNum = ceil($num_rows/4);
			$page = $this->I('pid','get');
			//$this->I('page','get')返回的是一个值，直接判断就行没办法isset
			if ($page!=NULL) {
				//赋值同样也无法进行	
				$pageE = 4*$page;
				$pageS = $pageE - 3;
			}else{
				//强制记录一下当前是第几页
				$page = 1;
				$pageS = 1;
				$pageE = 4;
			}
			include dirname(dirname(__FILE__)).'\View\imgtable.html';
		}

		public function Art_add(){
			$base = new Base();
			$base->source();
			//为模板添加样式!

			if ($this->I('submit') == '确认保存') {
				$title = $this->I('title');
				if ($title == "") {
					$url = "../Admin/index.php?c=Base&f=error&error=标题为空!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
				ini_set('date.timezone','Asia/Shanghai');
				//不设时区会报错不安全
				$time = date('Y_m_d');

				$file_size=$_FILES['myfile']['size'];  
			    if($file_size>2*1024*1024) {  
			        $url = "../Admin/index.php?c=Base&f=error&error=图片超过2M!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
			        die();
			    }  

		     	$file_type=$_FILES['myfile']['type'];  
				// echo $file_type;  
				//图片类型

				//判断是否上传成功（是否使用post方式上传）  
			    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
			        //把文件转存到你希望的目录（不要使用copy函数）  
			        $uploaded_file=$_FILES['myfile']['tmp_name'];  
			  
			        //我们给每个用户动态的创建一个文件夹  
			        $user_path="../Admin/Public/Upload/".$time;  
			        //判断该用户文件夹是否已经有这个文件夹  
			        if(!file_exists($user_path)) {  
			            mkdir($user_path);  
			        }  
			        //$move_to_file=$user_path."/".$_FILES['myfile']['name'];  
			        $file_true_name=$_FILES['myfile']['name'];  
			        $savePhotoName = time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
			        $move_to_file=$user_path."/".$savePhotoName;  
			        //echo "$uploaded_file   $move_to_file";  
			        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
			        	$data = array(
			        		'title' => $this->I('title'),
			        		'classify' => $this->I('classify'),
			        		'photourl' => $time,
			        		'photoname' => $savePhotoName,
			        		'recommend' => $this->I('recommend'),
			        		'content' => strip_tags($this->I('content')),
			        		'time' => date("Y-m-d H:i:s",time()),
			        		);
						$link = $this->db_mysqli('internship_native');
						if ($judge = $this->i_add('Article',$data,$link)) {
				        	$url = "../Admin/index.php?c=Article&f=source";
							echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
							die();
						}

			        }else {  
				        $url = "../Admin/index.php?c=Base&f=error&error=标题图移动失败!&from=Article";
						echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
						die();
			        }  
			    }else {  
			        $url = "../Admin/index.php?c=Base&f=error&error=标题图上传失败!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
			    }  
			}else{
				include dirname(dirname(__FILE__)).'\View\form.html';
			}
		}

		public function art_update(){
			$base = new Base();
			$base->source();
			$con = $this->db_mysql('internship_native');
			$where['id'] = $this->I('id');
			$judge['issetImg'] = 0;

 			if ($this->I('submit') == '确认保存') {
				$title = $this->I('title');
				if ($title == "") {
					$url = "../Admin/index.php?c=Base&f=error&error=标题为空!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
				ini_set('date.timezone','Asia/Shanghai');
				//不设时区会报错不安全
				$time = date('Y_m_d');

				$file_size=$_FILES['myfile']['size'];  
			    if($file_size>2*1024*1024) {  
			        $url = "../Admin/index.php?c=Base&f=error&error=图片超过2M!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
			        die();
			    }  

		     	$file_type=$_FILES['myfile']['type'];  
				// echo $file_type;  
				//图片类型

				//判断是否上传成功（是否使用post方式上传）  
			    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
			        //把文件转存到你希望的目录（不要使用copy函数）  
			        $uploaded_file=$_FILES['myfile']['tmp_name'];  
			  
			        //我们给每个用户动态的创建一个文件夹  
			        $user_path="../Admin/Public/Upload/".$time;  
			        //判断该用户文件夹是否已经有这个文件夹  
			        if(!file_exists($user_path)) {  
			            mkdir($user_path);  
			        }  
			        //$move_to_file=$user_path."/".$_FILES['myfile']['name'];  
			        $file_true_name=$_FILES['myfile']['name'];  
			        $savePhotoName = time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
			        $move_to_file=$user_path."/".$savePhotoName;  
			        //echo "$uploaded_file   $move_to_file";  
			        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
						$judge['issetImg'] = 1;	
						$data = array(
			        		'title' => $this->I('title'),
			        		'classify' => $this->I('classify'),
			        		'photourl' => $time,
			        		'photoname' => $savePhotoName,
			        		'recommend' => $this->I('recommend'),
			        		'content' => strip_tags($this->I('content')),
			        		'time' => date("Y-m-d H:i:s",time()),
			        		);
						
						
						if ($judge = $this->update('Article',$con,$data,$where,$judge['issetImg'])) {
				        	$url = "../Admin/index.php?c=Article&f=source";
							echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
							die();
						}		        	
			        }else {  
				        $url = "../Admin/index.php?c=Base&f=error&error=标题图移动失败!&from=Article";
						echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
						die();
			        }  
			    }else {  
			    	$data = array(
		        		'title' => $this->I('title'),
		        		'classify' => $this->I('classify'),
		        		'photourl' => $time,
		        		'photoname' => $savePhotoName,
		        		'recommend' => $this->I('recommend'),
		        		'content' => strip_tags($this->I('content')),
		        		'time' => date("Y-m-d H:i:s",time()),
		        		);
					
					
					if ($judge = $this->update('Article',$con,$data,$where,$judge['issetImg'])) {
			        	$url = "../Admin/index.php?c=Article&f=source";
						echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
						die();
					}

			  //       $url = "../Admin/index.php?c=Base&f=error&error=标题图上传失败!&from=Article";
					// echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					// die();
			    }  
 			}else{
 				$where['id'] = $this->I('id','get');
				$result = $this->select('Article',$con,$where);
				include dirname(dirname(__FILE__)).'\View\form.html';
 			}
			
		}

		public function art_delete(){
			$con = $this->db_mysql('internship_native');

			if($this->I('submit') == '确定'){
				$checkbox = $this->I('checkbox');
				foreach ($checkbox as $v) {
					//换一个思路世界更美好,而不是$where['id'][]
					$where['manyCond']['id'][] = $v;
				}
				if ($judge = $this->delete('Article',$con,$where,$manyCond = array('id'))) {
					$url = "../Admin/index.php?c=Article&f=source";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
				
			}else{
				$where['id'] = $this->I('id','get');
				if ($judge = $this->delete('Article',$con,$where)) {
					$url = "../Admin/index.php?c=Article&f=source";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}else{
					$url = "../Admin/index.php?c=Base&f=error&error=访问错误!&from=Article";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
			}
		}

		public function art_recommend(){
			
			$link  = $this->Db_mysqli('internship_native');
			switch ($this->I('type','get')) {
				case '0':
					$recommend = 1;
					break;
				case '1':
					$recommend = 0;
					break;
			}
			$data = array(
				'recommend' => $recommend,
				);
			$where['id'] = $this->I('id','get');
			if($judge = $this->i_update('Article',$link,$data,$where)){
				$url = "../Admin/index.php?c=Article&f=source";
				echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
				die();
			}
		}
	}
 ?>