<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
// + ---------- ----------
// | 这是首页控制器
// | @author tan<admin@163.com>
// + ---------- ----------
class IndexController extends CommonController {
	
	// + ---------- ----------
	// | 这是默认方法
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function index() {
		
		$sql = 'SELECT * FROM  `sp_products` WHERE `recommend`=1 AND `audit` =1 AND  `status` =1 
				ORDER BY  `recommend` DESC, IF(`recommend`=1,`recommend_time`,`audit_time`) DESC
    			';
		$total_sql = '`recommend` AND `audit` = 1 AND `status` = 1 '; // 最终的获取记录总数的where条件

/*首页显示数固定为60
		if(isset($_REQUEST['perpage'])) {
			$perpage		= intval($_REQUEST['perpage'])>0?intval($_REQUEST['perpage']):60;
		} else if(isset($_COOKIE['perpage'])) {
			$perpage		= intval($_COOKIE['perpage'])>0?intval($_COOKIE['perpage']):60;
		} else {
			$perpage = 60;
		}
		cookie('perpage', $perpage, 3600);
*/
		$this->assign ( 'noperpage', 1 );
		$perpage = 60;
		$curr_page = intval ( $_REQUEST ['p'] ); // 当前页码
		if ($curr_page < 1)
			$curr_page = 1;
		$start_index = ($curr_page - 1) * $perpage; // 开始索引
		$page_sql = $sql . ' LIMIT ' . $start_index . ', ' . $perpage; // 最终的分页sql
		
		$total = D ( 'Products' )->where ( $total_sql )->count ();
		
		$page = $this->page ( $total, $perpage ); // 实例化分页对象
		
		$page_html = $page->show ( 'Front' ); // 得到的分页链接代码
		
		$model = new Model ();
		
		$list = $model->query ( $page_sql );
//    	echo $page_sql;
//    	echo '<table border=1>';
//    	foreach($list as $vo){
//    		echo '<tr>';
//    		foreach($vo as $k=>$vo2){
//    			if($k=='id'||$k=='product_name'||$k=='recommend'||$k=='audit'||$k=='edit_time'||$k=='status'||$k=='audit_time'||$k=='recommend_time'){
//    				if($k=='recommend'){ $vo2 = empty($vo2)?'不推荐':'推荐'; }
//    				if($k=='audit'){ $vo2 = empty($vo2)?'未审核':'已审核'; }
//    				if($k=='status'){ $vo2 = empty($vo2)?'下架':'上架'; }
//    				if($k=='edit_time'){ $vo2 = date('Y-m-d H:i:s',$vo2); }
//    				if($k=='audit_time'){ $vo2 = date('Y-m-d H:i:s',$vo2); }
//    				if($k=='recommend_time'){ $vo2 = date('Y-m-d H:i:s',$vo2); }
//    				echo '<td><b>' . $k . '</b><br/>'. $vo2 .'　　</td>';
//    			}
//    		}
//    		echo '</tr>';
//    	}
//    	echo '</table>';exit;
		

		foreach ( $list as $k => $vo ) {
			//去html标签，换行
			$list[$k]['abstract'] = str_replace("\r\n",'<br/>', strip_tags($vo['abstract']));
			if (! empty ( $vo ['images'] )) {
				$list [$k] ['images'] = json_decode ( $vo ['images'], true );
				$list [$k] ['thumb'] = $list [$k] ['images'] [0]; // 原图
				$list [$k] ['thumb_200'] = $this->get_thumb ( $list [$k] ['images'] [0] ['url'], 200 ); // 长宽200PX图片（缩略图）
			}
		}
		
		$this->assign ( 'list', $list );
		
		$this->assign ( 'page_html', $page_html );
		
		$this->assign ( 'perpage', $perpage );
		
		$this->assign ( 'action', $_SERVER ['REQUEST_URI'] );
		
		// seo
		$this->assign ( 'title', 'ISweek工采网 - 工业品采购、工业品批发供应商首选ISweek.cn' );
		$this->assign ( 'description', 'ISweek工采网是领先的工业品采购、工业品批发供应商，以精确的人工服务提供工业品询报价，招募供应商、大买家采购、工业品招标采购等。帮助用户更快、更有效地完成产品采购。我们非常乐意为您解答产品相关问题，为您提供最佳的解决方案。' );
		$this->assign ( 'keywords', '工业品,工业品采购,工业品批发,工业品供应商,工采网' );
		
		$this->display ( 'Index:index' );
	}
	
//     /**
	// * 空操作
	// * 例如http://www.isweek.cn/index.php/index/afdsa
	// */
	// public function _empty(){
	// @header ( "http/1.1 404 not found" );
	// @header ( "status: 404 not found" );
	// @header ( "Location:" . APP_404_URL );
	// exit ();
	// }
}
