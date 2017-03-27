<?php
/* Smarty version 3.1.30, created on 2016-11-24 03:39:38
  from "/Users/chenchenghao/Downloads/PHP/php/test/smarty/template/datetime.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583652ea238862_47601240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9135a53f74c1dcfeb302129ef61337541da3977f' => 
    array (
      0 => '/Users/chenchenghao/Downloads/PHP/php/test/smarty/template/datetime.tpl',
      1 => 1479955176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583652ea238862_47601240 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_test')) require_once '/Users/chenchenghao/Downloads/PHP/php/test/smarty/libs/plugins/modifier.test.php';
echo smarty_modifier_test($_smarty_tpl->tpl_vars['time']->value,'Y-m-d H-m-s');?>

<?php }
}
