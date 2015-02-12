<?php
namespace Home\Controller;
use Think\Controller;
// + ---------- ----------
// | 这是所有分类控制器
// | @author tan<admin@163.com>
// + ---------- ----------
class AboutusController extends CommonController {


	public function __construct() {
		parent::__construct ();
		$this->assign ( "css_style", "about-us" );
		$this->assign ( 'title', '关于我们-工采网' );
		$this->assign ( 'description', '工业品,工业品采购,工业品批发,工业品供应商,工采网' );
		$this->assign ( 'keywords', 'ISweek工采网是领先的工业品采购、工业品批发供应商，以精确的人工服务提供工业品询报价，招募供应商、大买家采购、工业品招标采购等。帮助用户更快、更有效地完成产品采购。我们非常乐意为您解答产品相关问题，为您提供最佳的解决方案。' );
	}
	
	// + ---------- ----------
	// | 这是默认方法
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function index() {
		$this->display ();
	}

}
