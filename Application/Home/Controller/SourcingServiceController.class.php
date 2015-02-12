<?php
namespace Home\Controller;
use Think\Controller;

// + ---------- ----------
// | 这是所有分类控制器
// | @author tan<admin@163.com>
// + ---------- ----------
class SourcingServiceController extends CommonController {
	public function __construct() {
		parent::__construct ();
		$this->assign ( "css_style", "sourcing-service" );
		$this->assign ( 'title', '委托采购 - 工业品采购服务, 性价比高, 优质高效！- 工采网' );
		$this->assign ( 'description', 'ISweek工采网 - 值得信赖的工业品采购服务商，为客户提供专业的采购服务，为您寻找性价比高的产品、节省您的宝贵时间。我们的合作伙伴遍布全球，欢迎委托！' );
		$this->assign ( 'keywords', '委托采购, 工业品采购, 采购服务, 代购服务, 采购' );
	}

	// + ---------- ----------
	// | 这是默认方法
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function index() {
		$curr_menu_key = 'SourcingService';//菜单标记
		$this->assign('curr_menu_key',$curr_menu_key);
				
		$this->display ();
	}
	
	
	// + ---------- ----------
	// | 这是提交“委托采购”的方法
	// | 先把相关信息存入数据库，然后给管理者发邮件
	// | @author tan<admin@163.com>
	// + ---------- ----------
	public function add(){
		if(isset($_POST['dopost']) && $_POST['dopost']){
			$data = array();
			$data['product_name'] = trim($_POST['productName']);//产品名称
			$data['serial_no'] = trim($_POST['modelNumber']);//型号规格
			$data['product_brand'] = trim($_POST['brand']);//品牌
			$data['supplier_name'] = trim($_POST['manufacturer']);//制造厂家
			
			$data['required'] = '';//trim($_POST['certificationRequired']);//认证要求
			$data['product_num'] = trim($_POST['purchaseQuantity']);//购买数量
			if(!empty($_FILES['attachment']) && $_FILES['attachment']['error']==0 && $_FILES['attachment']['size']>0){
				//若有选择附件
				$data['attachment'] = $this->upload('attachment');//附件
			}else{
				$data['attachment'] ='';
			}
			$data['name'] = trim($_POST['name']);
			
			$data['email'] = trim($_POST['email']);
			$data['mobile'] = trim($_POST['phoneNumber']);
			$data['company_name'] = trim($_POST['companyName']);
			$data['website'] = trim($_POST['website']);
			
			$data['add_time'] = time();
			$data['edit_time'] = $data['add_time'];
			$data['udate'] = date('Y-m-d H:i:s',$data['add_time']);
			
			$ebuy_obj=D("Ebuy");
			$rs = $ebuy_obj->add($data);//信息入库
			if(!$rs){
				$this->assign('result','error');
				$this->assign('content','抱歉！系统发生了意外，您的委托未提交成功，请重新提交。<br/>您也可以写邮件给我们：sales@isweek.cn');
				$this->display('SourcingService:result');exit;
			}
			
			$title = '委托采购-工采网：' . $data['product_name']; // 邮件标题
			$filename = ''; // 邮件附件（可选）
			$filename2 = ''; // 邮件内容中显示的上次的文件的地址
			if(!empty($data['attachment'])){
				set_time_limit(5*60);//延长5分钟
				$filename = './Uploads/' . $data['attachment'];
				$filename2 = 'http://www.isweek.cn/Uploads/' . $data['attachment'];
			}
			$html = ''; // 邮件内容
			$html .= '来源：工采网 ISweek.cn<br/><br/>';
			$html .= '产品名称：' . $data['product_name'] . '<br/><br/>';
			$html .= '型号/规格：' . $data['serial_no'] . '<br/><br/>';
			$html .= '品牌：' . $data['product_brand'] . '<br/><br/>';
			
			$html .= '制造厂家：' . $data['supplier_name'] . '<br/><br/>';
			//$html .= 'Certification Required：' . $data['required'] . '<br/><br/>';
			$html .= '采购数量：' . $data['product_num'] . '<br/><br/>';
			$html .= '附件：' . $filename2 . '<br/><br/>';
			
			//$html .= '<br/><hr/><br/>';
			$html .= '<b>委托方联络方式</b><br/><br/>';
			$html .= '姓名：' . $data['name'] . '<br/><br/>';
			$html .= 'Email：' . $data['email'] . '<br/><br/>';
			
			$html .= '电话号码：' . $data['mobile'] . '<br/><br/>';
			$html .= '公司名称：' . $data['company_name'] . '<br/><br/>';
			$html .= '网址：' . $data['website'] . '<br/><br/>';
			
			//发送邮件
			$rs = $this->send_mail($title,$html,$filename);
			if($rs === true){
				$this->assign('result','success');
				$this->assign('content','感谢您对我们的信任！<br/>您的委托已提交，工采网的工作人员将会尽快与您联络。');
				$this->display('SourcingService:result');exit;
			}else{
				$this->assign('result','error');
				$this->assign('content','抱歉！系统发生了意外，您的委托未提交成功，请重新提交。<br/>您也可以写邮件给我们：sales@isweek.cn');
				$this->display('SourcingService:result');exit;
			}
		}
// 		$this->assign('result','success');
// 		$this->assign('content','感谢您对我们的信任！<br/>您的委托已提交，工采网的工作人员将会尽快与您联络。');
// 		$this->display('SourcingService:result');exit;
		//其实进到这里，说明当前操作是非法的
		$this->assign('result','error');
		$this->assign('content','抱歉！系统发生了意外，您的委托未提交成功，请重新提交。<br/>您也可以写邮件给我们：sales@isweek.cn');
		$this->display('SourcingService:result');exit;
	}
	
	
	/**
	 * 上传附件
	 * @param string $inputName
	 * @return string
	 */
	public function upload($inputName='attachment'){
		set_time_limit(5*60);//延长5分钟
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 20 * 1024 * 1024 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'txt', 'doc', 'xls', 'rar', 'zip', 'pdf');// 设置附件上传类型
		//$upload->savePath = 'ebuy/'; // 设置附件上传目录
		$upload->saveName = time().'_'.mt_rand();
		$upload->autoSub = true;
		$upload->subName = array('date','Ymd');
		// 上传单个文件
		$info   =   $upload->uploadOne($_FILES[$inputName]);
		if(!$info) {
			// 上传错误提示错误信息
			//$this->error($upload->getError());
			return '';
		}else{
			// 上传成功 获取上传文件信息
			//echo $info['savepath'].$info['savename'];
			return $info['savepath'].$info['savename'];
		}
	}
	
}