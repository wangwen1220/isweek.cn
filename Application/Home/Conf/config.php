<?php
return  array(
		'TMPL_FILE_DEPR'        	=> '.', //模板文件MODULE_NAME与ACTION_NAME之间的分割符
		//URL不区分大小写
		'URL_CASE_INSENSITIVE' 	=> true,
		//默认错误跳转对应的模板文件
		//'TMPL_ACTION_ERROR' 	=> 'Public:error',
		//默认成功跳转对应的模板文件
		//'TMPL_ACTION_SUCCESS' => 'Public:success',
		'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息

		//'SHOW_PAGE_TRACE'		=> true,
		// 'DB_TYPE'               		=>  'mysql',			// 数据库类型
		// 'DB_HOST'               		=>  'localhost',		// 服务器地址
		// 'DB_NAME'               		=>  'isweek_zh',		// 数据库名
		// 'DB_USER'               		=>  'root',			// 用户名
		// 'DB_PWD'                		=>  '',				// 密码
		// 'DB_PREFIX'                		=>  'sp_',			// 密码
		'SHOW_PAGE_TRACE'	=> true,
		'DB_HOST'			=>  '192.168.2.180', 	// 服务器地址
		'DB_NAME'			=>  'isweek',          	// 数据库名
		'DB_USER'			=>  'isweek',      		// 用户名
		'DB_PWD'			=>  'isweek',
		'DB_PREFIX'			=>  'sp_',
		'TMPL_PARSE_STRING'	=>	array(
				'__TMPL__res'		=>	'/Public/Admin',
				'__UPLOAD__' 		=> __ROOT__.'/Uploads/',
				'__HOST__' => 'http://www.isweek-zh.com',
		),
		'UPLOADPATH' 			=> __ROOT__.'/Uploads/',
		'VAR_PAGE' 				=> 'p',
);