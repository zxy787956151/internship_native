<?php 
	class UserModel{
		use Common;
		//因为控制器必须继承模型类,故不能include(报错重定义),但必须use,才能使用Common
		public function loginVerify($sqlArr,$subArr){

			while($row = mysql_fetch_array($sqlArr)){
				//不需要键名的时候foreach冗余,用用while吧!
				@session_start();
				
				if ($this->I('username') == $row['username']) {
					if (md5($this->I('password')) == $row['password']) {
						if ($this->I('verify') == $_SESSION['code']) {
							$_SESSION['user_id'] = $row['id'];
							// header("Location: ../Admin/index.php?c=Index&f=source");
							$url = "../Admin/index.php?c=Index&f=source";
							echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
							die();
							//跳转以后一律这么写,header束缚太多
							//1.location和“:”号间不能有空格，否则不会跳转。
							// 2.在用header前不能有任何的输出。
							// 3.header后的PHP代码还会被执行
						}else{
							// header("Location: ../Admin/index.php?c=Base&f=error&error=验证码错误或未填写!");
							$url = "../Admin/index.php?c=Base&f=error&error=验证码错误或未填写!";
							echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
							die();
							//BUG!!!这个错误内容明文一定要改成密文!,吧error.html里的图片也改了!!!,再设置几秒跳回来!!!
						}
					}else{
						// header("Location: ../Admin/index.php?c=Base&f=error&error=密码错误或未填写!");
						$url = "../Admin/index.php?c=Base&f=error&error=密码错误或未填写!";
						echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
						die();
					}
				}else{
					// header("Location: ../Admin/index.php?c=Base&f=error&error=用户名错误或未填写!");
					$url = "../Admin/index.php?c=Base&f=error&error=用户名错误或未填写!";
					echo "<script language = 'javascript' type = 'text/javascript'>window.location.href = '".$url."';</script > ";
					die();
				}
			}
		}
	}
 ?>