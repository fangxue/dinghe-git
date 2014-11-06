<?php
$config = array(
		'URL_MODEL'	=>	2,
		'URL_CASE_INSENSITIVE' =>true,
		'DB_TYPE'	=>	'mysql',
		'DB_HOST'	=>	'127.0.0.1',
		'DB_NAME'	=>	'dinghe',
		'DB_USER'	=>	'root',
		'DB_PWD'	=>	'',
		'DB_PORT'	=>	'3306',
		'DB_PREFIX'	=>	'',
		'ADMIN_WEB_HOST' =>'lc.dinghe.com/admin.php',
		'WEB_HOST' =>'lc.dinghe.com',
		'LOAD_EXT_CONFIG' => array(
				'ERROR_MSG' => 'config_errormsg',
		),
		'LOG_RECORD' =>	true,
		'URL_404_REDIRECT' => '/admin.php/Public/404',
		'URL_HTML_SUFFIX'=>'',//伪静态URL设置
		'URL_CASE_INSENSITIVE' => true,
		'TMPL_ACTION_ERROR' => 'Public:error',
		'TMPL_ACTION_SUCCESS' => 'Public:success',
		'CLASS_NAME'=>array('1'=>"商业保理",'2'=>"资产管理",'3'=>"财富中心"),
		'CLASS_DINGHE'=>array('1'=>"关于鼎赫",'2'=>"企业文化",'3'=>"愿景使命","4"=>"组织架构","5"=>"招聘信息","6"=>"联系我们"),
);
return $config;
?>