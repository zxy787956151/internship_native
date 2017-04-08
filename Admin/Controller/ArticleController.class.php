<?php 
	include_once 'BaseController.class.php';
	class Article extends Base{
		public function source(){
			$base = new Base();
			$base->source();
			include dirname(dirname(__FILE__)).'\View\imgtable.html';
		}

		public function add(){
			if ($this->I('submit') == '确认保存') {
				ini_set('date.timezone','Asia/Shanghai');
				//不设时区会报错不安全
				$time = date('Y_m_d');

				$file_size=$_FILES['myfile']['size'];  
			    if($file_size>2*1024*1024) {  
			        echo "文件过大，不能上传大于2M的文件";  
			        exit();  
			    }  

		     	$file_type=$_FILES['myfile']['type'];  
				echo $file_type;  
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
			        $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));  
			        //echo "$uploaded_file   $move_to_file";  
			        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
			            echo $_FILES['myfile']['name']."上传成功";  
			        } else {  
			            echo "上传失败";  
			        }  
			    } else {  
			        echo "上传失败";  
			    }  
			}
		}
	}
 ?>