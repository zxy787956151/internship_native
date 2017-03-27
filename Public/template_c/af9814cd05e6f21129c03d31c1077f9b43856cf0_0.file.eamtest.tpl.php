<?php
/* Smarty version 3.1.30, created on 2016-11-24 03:47:20
  from "/Users/chenchenghao/Downloads/PHP/php/test/smarty/template/eamtest.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583654b81921c7_72753538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af9814cd05e6f21129c03d31c1077f9b43856cf0' => 
    array (
      0 => '/Users/chenchenghao/Downloads/PHP/php/test/smarty/template/eamtest.tpl',
      1 => 1479955635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583654b81921c7_72753538 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_block_test1')) require_once '/Users/chenchenghao/Downloads/PHP/php/test/smarty/libs/plugins/block.test1.php';
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('test1', array('replace'=>'trur','maxnum'=>29));
$_block_repeat1=true;
echo smarty_block_test1(array('replace'=>'trur','maxnum'=>29), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

<?php $_block_repeat1=false;
echo smarty_block_test1(array('replace'=>'trur','maxnum'=>29), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

<?php }
}
