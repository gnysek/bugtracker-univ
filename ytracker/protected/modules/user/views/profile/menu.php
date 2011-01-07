<?php
$first = (UserModule::isAdmin())
	? array('label' => UserModule::t('Manage User'), 'url' => array('/user/admin'))
	: array('label' => UserModule::t('List User'), 'url' => array('/user'));

$this->menu = array(
	$first,
	array('label' => UserModule::t('Profile'), 'url' => array('/user/profile')),
	array('label' => UserModule::t('Edit'), 'url' => array('edit')),
	array('label' => UserModule::t('Change password'), 'url' => array('changepassword')),
	array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
);

?>