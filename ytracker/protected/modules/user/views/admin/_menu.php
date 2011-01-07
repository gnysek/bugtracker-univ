<?php
$tmp = (count($list)) ? $list : array();

$this->menu = array_merge($tmp,array(
	array('label' => UserModule::t('List User'), 'url' => array('/user')),
	array('label' => UserModule::t('Manage User'), 'url' => array('admin')),
	array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
));
?>