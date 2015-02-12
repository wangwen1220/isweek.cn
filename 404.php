<!DOCTYPE html>
<html class="home no-js">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>404- ISweek工采网</title>
  <meta name="keywords" content="工业品,工业品采购,工业品批发,工业品供应商,工采网" />
  <meta name="description" content="ISweek工采网是领先的工业品采购、工业品批发供应商，以精确的人工服务提供工业品询报价，招募供应商、大买家采购、工业品招标采购等。帮助用户更快、更有效地完成产品采购。我们非常乐意为您解答产品相关问题，为您提供最佳的解决方案。" />
  <link rel="stylesheet" type="text/css" href="/statics/front/css/main.css" />
  <!-- <script src="/statics/front/js/cssrefresh.js"></script> -->
  <!-- <script src="/statics/front/js/live.js"></script> -->
  <!--[if lt IE 9]>
  <script src="/statics/front/js/ie/html5shiv.js"></script>
  <script src="/statics/front/js/ie/respond.js"></script>
  <script src="/statics/front/js/ie/nwmatcher.js"></script>
  <script src="/statics/front/js/ie/selectivizr.js"></script>
  <![endif]-->
  <!--[if IE 6]>
  <script src="/statics/front/js/ie/pngfix.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <![endif]-->
  <script src="/statics/front/js/sea-modules/seajs/seajs/2.2.1/sea.js" id="seajsnode"></script>
  <script src="/statics/front/js/main.js"></script>
  <script src="/statics/js/jquery-1.8.0.min.js"></script>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<script type="text/javascript">
$(function(){
	//随机的20个产品
	var url = "http://www.isweek.cn/index.php/product/do_get_rand20";
	$.post(url,function(data){
    		var i = 0;
    		var html = "";
    		if(data == undefined || data==null){ return false; }
    		var len = data.length;
    		for(i=0; i<len;i++){
     			var item = data[i];
     			var url = item.thumb_200;
     			html += 	'<li>';
     			html += 		'<a href="/'+item.id+'.html"><img src="'+url+'"></a>';
     			html += 		'<h3 class="title"><a href="/'+item.id+'.html">'+item.product_name+'</a></h3>';
     			html +=   	'<p class="description">'+item.abstract+'</p>';
     			html +=	'</li>';
    		}
    		$('.listbox ul').html(html);
    		
    		  var timer=null;
    		  var speed=8000;
    		  var w=200;  //每个li的宽度
    		  var ml=0;
    		  var num=5; //每次移动的个数
    		  var dis=20;
    		  var len=$(".listbox ul li").length*2;
    		  var dw=parseInt($(".listbox").width()); //澶栧眰div鐨勫搴�
    		  $(".listbox ul").append($(".listbox ul").html()).css({'width':len*w+len*dis, 'margin-left': -len*w/2-(len/2)*dis});
    		 
    		timer=setInterval(init,speed);	
    		function init(){
    			 $(".next").trigger('click'); 
    		}
    			
    		function show(ml){
    		     if($(".listbox ul").is(':animated')){ 
    		      return;
    		   }
    			
    		  $(".listbox ul").animate({'margin-left':ml},800,function(){
    			if(ml<=(w+dis)*(num-len)){  
    				    $(".listbox ul").css("margin-left",(w+dis)*(num-len/2));
    			   }
    			   
    			   if(ml==0){
    				   $(".listbox ul").css("margin-left",-(len/2)*(w+dis));  
    			   }
    		    });
    		  }
    		  
    		  $(".listbox ul li").hover(function(){
    			 clearInterval(timer);
    			},function(){
    				timer=setInterval(init,speed);
    		   });
    		
    		  $(".prev").click(function(){
    			  ml=parseInt($(".listbox ul").css("margin-left"))+num*(w+dis); 
    				 show(ml); 
    			  });
    			  $(".next").click(function(){
    			    ml=parseInt($(".listbox ul").css("margin-left"))-num*(w+dis);
    				show(ml);
    		  });
    			  
	});
});
</script>
  <style type="text/css">
  .nofind{margin-left:202px;padding-top:100px;width:670px; margin:0 auto;}
  .likecon{width:1200px;margin:0 auto; padding-top:100px;}
  .youlike{font-family:Microsoft Yahei;font-size:16px; color:#444; background:#fbfbfb; padding:15px 0; border-top:1px solid #e9e9e9; padding-left:12px;}
  .listbox{width:1100px; height:305px; margin:0 auto; overflow:hidden;}
  .listbox ul{width:9999px;}
  .listbox ul li{ float:left; display:inline; padding-bottom:10px; margin:0 10px;width:200px;}
   .listbox ul li h3{padding:0 10px;margin-bottom:5px;}
   .listbox ul li h3 a{color:#000;}
   .listbox ul li p{padding:0 10px; height:70px; overflow:hidden;color:#666;}
   .scrollbox{ position:relative;margin-top:20px;}
   .scrollbox .prev{ position:absolute;left:0;_left:-30px; top:100px; background:url(/statics/img/prev.gif) 0 0 no-repeat;width:16px; height:26px;}
   .scrollbox .next{position:absolute;right:0; top:100px;background:url(/statics/img/next.gif) 0 0 no-repeat; width:16px; height:26px;}
  </style>
</head>

<body>
  <header id="header">
    <div class="wrapper">
      <h1><a href="/"><img src="/statics/front/img/logo.png" alt="ISweek.cn" /></a></h1>
      <form action="/index.php/home/search" class="search clearfix" id="search">
        <fieldset class="search-panel">
          <input type="text" name="kw" class="kw js-placeholder" value="" value=""/>
          <span class="select-wrap">
            <select name="cid" id="js-select">
              <option value="0">全部类目</option>
                            <option value="1"  >仪表仪器</option>
                            <option value="4"  >传感器和变送器</option>
                          </select>
          </span>
        </fieldset>
        <button type="submit" class="search-submit"><span>搜索</span></button>
      </form>
    </div>
  </header>
  <nav id="nav">
    <div class="wrapper">
      <ul class="fn-clearfix">
        <li><a class="on first" href="/allcategories.html">全部类目</a></li>
                <li><a class=""
        	href="/category_1.html">仪表仪器</a></li>
                <li><a class=""
        	href="/category_4.html">传感器和变送器</a></li>
                
        <li class="contact-us">
          <a class="trigger" href="/aboutus.html">关于我们</a>
          <ul>
            <li><a href="/aboutus.html">关于我们</a></li>
            <li><a href="/contactus.html" title="contact us-ISweek.cn">联系我们</a></li>
          </ul>
        </li>
        
        <li style="float: right;">
          <a class="" href="http://www.isweek.cn/news/">资讯</a>
        </li>
        
      </ul>
    </div>
  </nav>

  <div id="main">
    <div class="wrapper">
      <div class="w-fly-mr">
        <!--add begin-->
        
          <div class="nofind fn-clear">
            <strong style="float:left;font-family:Microsoft Yahei; font-size:48px;color:#7f7f7f;margin-right:45px;">404</strong>
            <div style="float:left; line-height:30px;">
            <p style="font-family:Microsoft Yahei;font-size:16px;color:#444;">
             抱歉，您要访问的页面不存在</p>
 
<p style="color:#666;font-size:12px;width:535px; padding-bottom:5px; border-bottom:1px dotted #b3b3b3;">有可能我们的网页正在维护或者您输入的网址不正确</p>
</p>
<p style="padding-top:24px;">您可以：<a href="http://www.isweek.cn/" style="color:#3f48cc; text-decoration:underline;">点此返回首页</a></p>
            
            
            </div>
           
          </div>
          <div class="likecon">
             <h3 class="youlike">你可能喜欢</h3>
        <div class="scrollbox"> 
           <div class="listbox">
            <ul style="width: 8800px; margin-left: -5500px;">
               <!-- 
               <li>
                  <a href="#"><img src="/statics/img/cgqi.jpg"></a>
                   <h3 class="title"><a target="_blank" href="/79.html">流量气体传感器1</a></h3>
                   <p class="description">FS5001B系列气体质量流量传感器是专门为各类小流量气体的
                   测量和过程控制而设计的。这一系列传感器均采用本公司自主研发的微机电系统（MEMS
                   ）流量传感器芯片来制作，适用于各类清洁、干燥气体。传感器采用标贴式安装，使安装
                   尺寸更加紧凑，可以很容易的实现在小空间内的多传感器集成。 </p>
                </li>
                 -->
             <!-- 循环读取数据 -->
             </ul>
             </div>
            <a href="javascript:;" class="prev"></a>
             <a href="javascript:;" class="next"></a>
         </div>
          </div>
        <!--add over-->   
      </div>
      
    </div>
  </div>
  <footer id="footer">
    <div class="wrapper">
      <div class="help clearfix">
        <dl class="support clearfix">
          <dt>客户支持</dt>
          <dd><a class="skype" href="http://wpa.qq.com/msgrd?v=3&uin=1361858804&site=qq&menu=yes" target="_blank" rel="nofollow">QQ:1361858804</a></dd>
          <dd><span class="tel" >0755-83289036 <i class="devide"></i> 0755-83289035</span></dd>
          <dd><a class="email" href="mailto:sales@isweek.cn" target="_blank" rel="nofollow">sales@isweek.cn</a></dd>

<!--
          <dd><a class="online" href="javascript:void();" target="_blank" rel="nofollow">Online Support</a></dd>
          <dd><a class="skype" href="javascript:void();" target="_blank" rel="nofollow">Skype</a></dd>
          <dd><a class="msn" href="javascript:void();" target="_blank" rel="nofollow">MSN</a></dd>
-->
        </dl>
<!--
        <dl class="connect">
          <dt>关注工采网</dt>
          <!--<dd><a class="facebook" href="https://www.facebook.com/isweekb2c" title="Connect with us on facebook" target="_blank" rel="nofollow">facebook</a></dd>
          <dd><a class="twitter" href="https://twitter.com/isweekb2c" title="Connect with us on twitter" target="_blank" rel="nofollow">twitter</a></dd>
          <dd><a class="googleplus" href="https://plus.google.com/114361625880192443581/posts" title="Connect with us on google+" target="_blank" rel="nofollow">google+</a></dd>
          <dd><a class="sinaweibo" href="" title="Connect with us on facebook" target="_blank" rel="nofollow"></a></dd>
          <dd><a class="txweibo" href="" title="Connect with us on twitter" target="_blank" rel="nofollow"></a></dd>
          <dd><a class="qqzone" href="" title="Connect with us on google+" target="_blank" rel="nofollow"></a></dd>
          <dd><a class="footer-email" href="" title="Connect with us on google+" target="_blank" rel="nofollow"></a></dd>
        </dl>
-->
        <!-- <dl class="about">
          <dt>关于ISweek工采网</dt>
          <dd>
            <p>
			   ISweek工采网是中国高科技门户网站<a href="http://www.ofweek.com" target="_blank" style="text-decoration: underline;">OFweek</a>推出的工业科技产品直销平台,ISweek工采网汇集了来自全球的高品质工业科技产品，致力于为全球工业科技产品的采购商，供应商，贸易商，生产制造商提供全产业链的一站式产品销售和采购服务。
            </p>
            <p><a href="http://www.ofweek.com" target="_blank" style="text-decoration: underline;">OFweek</a> --中国高科技行业综合门户网站，目前拥有国内外行业会员200余万名，<a href="http://www.ofweek.com" target="_blank" style="text-decoration: underline;">OFweek</a> 行业网站涵盖照明、半导体照明、LED、太阳能光伏、光通讯、激光、光学、显示、电子工程、工控、智能电网、仪器仪表、节能、环保、风电、电源、新材料、电力、通信、物联网、机器人，汽车，医疗等高科技领域，<a href="http://www.ofweek.com" target="_blank" style="text-decoration: underline;">OFweek</a>面向行业企业提供全面的广告，数据，活动，会议，在线展览，内外贸B2B，人才，研究报告，行业咨询，投融资等深度服务，成为中国目前成长最快的行业电子商务综合平台。</p>
			<p>科技改变世界，<a href="http://www.isweek.cn" target="_blank" style="text-decoration: underline;">ISweek</a>和<a href="http://www.ofweek.com" target="_blank" style="text-decoration: underline;">OFweek</a>始终致力于和众多优秀的合作者一起不断努力,快速成长,成为用户最有价值的合作伙伴。</p>
          </dd>
        </dl> -->
      </div>
      <div class="copyright">
        <p class="txt">© 2014 ISweek.cn 版权所有</p>
        <p class="txt" style="text-align:right;"><a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备06087881号-16
</a></p>
      </div>
    </div>
  </footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53583783-1', 'auto');
  ga('send', 'pageview');
</script>
  <!-- CNZZ 统计代码 -->
  <div style="display: none;">
  <script src="http://v1.cnzz.com/stat.php?id=1253484179&web_id=1253484179" language="JavaScript"></script>
  </div>
</body>
</html>