<?php
namespace Home\Controller;
use Think\Controller;
// + ---------- ----------
// | 这是所有分类控制器
// | @author tan<admin@163.com>
// + ---------- ----------
class AllCategorysController extends CommonController {


	public function __construct() {
		parent::__construct ();
		$this->assign ( "css_style", "category" );
		$this->assign ( 'title', 'Industrial Products Categories - ISweek.com' );
		$this->assign ( 'description', 'Industrial products categories of ISweek.com' );
		$this->assign ( 'keywords', 'product categories, product catalog' );
	}
	
	// + ---------- ----------
	// | 这是默认方法
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function index() {
		
		// 所有允许在前台显示的菜单
		$homepage_categorys = $this->get_homepage_show_categorys ();
		
		// 将结果集排序
		$homepage_categorys = $this->leipi_to_tree ( $homepage_categorys );
		
		$this->assign ( 'homepage_categorys', $homepage_categorys );
		
		$this->assign ( 'title', '所有类目-工采网' );
		
		$this->assign ( 'keywords', '产品目录，产品类目，工业品目录，工业品类目' );
		
		$this->assign ( 'description', 'ISweek工采网所有类目' );
		
		$this->display ();
	}

}
