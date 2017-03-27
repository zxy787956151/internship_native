<?php
  /**
    对象的实例化以及初始化文件
  **/

  define("ROOT",str_replace("\\","/",dirname(__FILE__)).'/');   //制定项目的根路径
  require ROOT.'libs/ORG/Smarty.class.php';    //加载Smarty类文件
  $smarty = new Smarty();   //实例化Smarty类的对象￥smarty
  $smarty->setTemplateDir(ROOT.'template/')   //设置所有模板文件存放的目录
         ->addTemplateDir(ROOT.'template2/')    //可以添加多个模板目录（前后台）
         ->setCompileDir(ROOT.'template_c/')    //设置所有编译过的模板文件存放的目录
         ->setPluginsDir(ROOT.'libs/plugins/')   //设置为模板扩充插件存放的目录
         ->setCacheDir(ROOT.'cache/')   //设置缓存文件存放的目录
         ->setConfigDir(ROOT.'configs/');    //设置模板配置文件存放的目录

  $smarty->caching = false;   //设置smarty缓存开关功能
  $smarty->cache_lifetime = 60*60*24;   //设置模板缓存有效时间段的长度为1天
  $smarty->auto_literal = false;    //可以让界定符使用空格
  $smarty->left_delimiter = '<{';   //设置模板语言的左结束符
  $smarty->right_delimiter = '}>';   //设置模板语言的右结束符



 ?>
