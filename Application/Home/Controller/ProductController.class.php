<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
// + ---------- ----------
// | 这是产品控制器
// | @author tan<admin@163.com>
// + ---------- ----------
class ProductController extends CommonController {
	protected $products_obj;
	protected $terms_obj;
	protected $products_option_string = 'audit=1 AND status=1';
	protected $products_option_array = array (
			'audit' => 1,
			'status' => 1 
	);


	public function __construct() {
		parent::__construct ();
	}
	
	// + ---------- ----------
	// | 这是查看产品详细方法
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function details() {
		
		$this->assign ( 'css_style', 'details' );
		
		$id = intval ( $_REQUEST ['id'] );
		
		$item = D ( 'Products' )->where ( $this->products_option_string )->find ( $id );
		
		if (empty ( $item ) || $item ['audit'] != 1 || $item ['status'] != 1) {
			@header ( "http/1.1 404 not found" );
			@header ( "status: 404 not found" );
			// $this->error ( '抱歉，产品已下架或被删除' );
			// exit();
			$this->display ( 'Public:404' );
			exit ();
		}
		
		$this->get_recommend_products ( $item ['categorys'], array (
				$item ['id'] 
		) );
		
		//产品特性换行处理
		$item['features'] = str_replace("\n",'<br/>', $item['features']);
		
		// 处理缩略图
		$item ['images'] = json_decode ( $item ['images'], true );
		// $item['thumb'] = $item['images'][0];//原图
		// $item['thumb_300'] = $this->get_thumb($item['images'][0]['url'],300);//长宽300PX图片（缩略图）
		foreach ( $item ['images'] as $k => $vo ) {
			$item ['images'] [$k] ['thumb_35'] = $this->get_thumb ( $vo ['url'], 35 ); // 长宽30PX图片（缩略图）
			$item ['images'] [$k] ['thumb_100'] = $this->get_thumb ( $vo ['url'], 100 ); // 长宽30PX图片（缩略图）
			$item ['images'] [$k] ['thumb_200'] = $this->get_thumb ( $vo ['url'], 200 ); // 长宽200PX图片（缩略图）
			$item ['images'] [$k] ['thumb_300'] = $this->get_thumb ( $vo ['url'], 300 ); // 长宽300PX图片（缩略图）
		}
		
		// 面包屑导航处理
		if (! empty ( $item ['categorys'] )) {
			
			$item ['categorys'] = explode ( ',', trim ( $item ['categorys'], ',' ) );
			
			if (! empty ( $item ['categorys'] )) {
				foreach ( $item ['categorys'] as $v ) {
					
					$term = D ( 'Terms' )->find ( $v );
					
					if (! empty ( $term ) && $term ['status'] == 1) {
						$term_ids = explode ( '-', $term ['path'] );
						break;
					}
				
				}
			}
		}
		
		$this->assign ( 'term_ids', $term_ids );
		$this->assign ( 'page_biaozhi', 'product_detail' ); // 独特的页面标记，表示是产品详细页面，该页面的左侧菜单与其他页面的左侧菜单不一样（选中的样式判断方法）
		
		$this->assign ( 'item', $item );
		$this->assign ( 'title', $item ['product_name'] . ' - ' . $item ['serial_no'] );
		$this->assign ( 'description', $item ['abstract'] );
		$this->assign ( 'keywords', $item ['keywords'] );
		
		$this->display ();
	}


	/**
	 * 20个随机产品
	 */
	public function do_get_rand20() {
		$list = D ( 'Products' )->limit ( 20 )->where ( '`audit`=1 and `status`=1' )->order ( 'rand()' )->select ();
		shuffle ( $list ); // 随机打乱数组
		                   // var_dump($list);
		foreach ( $list as $k => $vo ) {
			if (! empty ( $vo ['images'] )) {
				$list [$k] ['images'] = json_decode ( $vo ['images'], true );
				$list [$k] ['thumb'] = $list [$k] ['images'] [0]; // 原图
				$list [$k] ['thumb_200'] = $this->get_thumb ( $list [$k] ['images'] [0] ['url'], 200 ); // 长宽200PX图片（缩略图）
			}
			//去html标签，换行
			$list[$k]['abstract'] = str_replace("\n",'<br/>', strip_tags($vo['abstract']));
			//$list [$k] ['abstract'] = strip_tags ( $vo ['abstract'] );
		} // var_dump($list);exit;
		$this->ajaxReturn ( $list );
	}


	private function get_recommend_products($categorys, $notin) {
		$cate_arr = explode ( ',', trim ( $categorys, ',' ) );
		// shuffle($cate_arr);
		// dump($cate_arr);
		$this->products_obj = M ( "Products" );
		$this->terms_obj = M ( "Terms" );
		
		if (empty ( $notin )) {
			$notin = array ();
		}
		$res = array ();
		foreach ( $cate_arr as $v ) {
			// 查询当前分类的相关产品
			$map = $this->products_option_array;
			$map ['categorys'] = array (
					'like',
					"%,$v,%" 
			);
			if (! empty ( $notin )) {
				$map ['id'] = array (
						'not in',
						$notin 
				);
			}
			$tmp_res = $this->products_obj->where ( $map )->select ();
			// echo $products_obj->getLastSql();
			// dump($tmp_res);
			if (! empty ( $tmp_res )) {
				foreach ( $tmp_res as $v ) {
					$res [$v ['id']] = $v;
					array_push ( $notin, $v ['id'] ); // 加入黑名单
				}
			}
		}
		// 数量不够，向上级类查询
		if (count ( $res ) < 10) {
			foreach ( $cate_arr as $v ) {
				// 获取该分类上级分类的相关产品
				$tmp_res = $this->get_parent_recommend_products ( $v, $notin );
				// dump($tmp_res);
				if (! empty ( $tmp_res )) {
					$res = $res + $tmp_res;
					$notin = array_merge ( $notin, array_keys ( $tmp_res ) );
				}
			}
		}
		foreach ( $res as $k => $vo ) {
			//去html标签，换行
			$res[$k]['abstract'] = str_replace("\n",'<br/>', strip_tags($vo['abstract']));
			if (! empty ( $vo ['images'] )) {
				$res [$k] ['images'] = json_decode ( $vo ['images'], true );
				$res [$k] ['thumb'] = $res [$k] ['images'] [0];
				$res [$k] ['thumb_200'] = $this->get_thumb ( $res [$k] ['images'] [0] ['url'], 200 );
				$res [$k] ['thumb_100'] = $this->get_thumb ( $res [$k] ['images'] [0] ['url'], 100 );
			}
		}
		$list = array_slice ( $res, 0, 10 );
		$list1 = array_slice ( $res, 0, 4 );
		$this->assign ( "recommend_products", $list );
		$this->assign ( "popular_products", $list1 );
	
	}


	private function get_parent_recommend_products($cid, $notin) {
		$return = array ();
		// 查询该分类path
		$path = $this->terms_obj->getFieldByTermId ( $cid, 'path' );
		$cate_arr = array_reverse ( array_slice ( explode ( '-', $path ), 1, - 1 ) );
		if (! empty ( $cate_arr )) {
			if (empty ( $notin )) {
				$notin = array ();
			}
			foreach ( $cate_arr as $v ) {
				// 查询当前分类的相关产品
				$map = $this->products_option_array;
				$map ['categorys'] = array (
						'like',
						"%,$v,%" 
				);
				if (! empty ( $notin )) {
					$map ['id'] = array (
							'not in',
							$notin 
					);
				}
				$tmp_res = $this->products_obj->where ( $map )->select ();
				// echo $this->products_obj->getLastSql().'<br/>';
				foreach ( $tmp_res as $v ) {
					$return [$v ['id']] = $v;
				}
				// 已经取够数据
				if (count ( $notin ) > 10) {
					return $return;
				}
			}
		}
		
		// dump($return);
		return $return;
	}
	
// 	/**
	// * 空操作
	// * 例如http://www.isweek.cn/index.php/product/fdsadsafsdafds
	// */
	// public function _empty(){exit('ppppppp');
	// @header ( "http/1.1 404 not found" );
	// @header ( "status: 404 not found" );
	// @header ( "Location:" . APP_404_URL );
	// exit ();
	// }
}
