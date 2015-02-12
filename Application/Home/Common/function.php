<?php

//分类重写
function rw_category_url($name, $id) {
	$return = '';
//	$name = html_entity_decode($name);
	$return = '/category'.'_'.$id.'.html';

	return $return;
}

//产品详情重写
function rw_product_url($name, $model, $id) {
	$return = '';
//	$return = '/product/'.convert_url_string($name).'-'.convert_url_string($model).'_'.$id.'.html';
	$return = '/'.$id.'.html';

	return $return;
}

function convert_url_string($str) {
	$return = '';
	$str = urlencode($str);
//	echo $str;
//	$tmp = preg_replace('/(\W)+/','-',$str);
//	$tmp = preg_replace('/-+$/', '', $tmp);
//	$return = preg_replace('/^-+/', '', $tmp);
//	$return = strtolower($return);
	$return = $str;

	return $return;
}
