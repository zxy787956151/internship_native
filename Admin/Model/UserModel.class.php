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
							header("Location: ../Admin/index.php?c=Index&f=source");
						}else{
							header("Location: ../Admin/index.php?c=Base&f=error&error=验证码错误或未填写!");
							//BUG!!!这个错误内容明文一定要改成密文!,吧error.html里的图片也改了!!!,再设置几秒跳回来!!!
						}
					}else{
						var_dump('密码错误或未填写!');
					}
				}else{
					var_dump('用户名错误或未填写!');
				}
			}
		}
	}
 ?>