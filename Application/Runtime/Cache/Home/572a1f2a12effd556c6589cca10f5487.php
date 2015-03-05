<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="<?php echo ($css_style); ?> no-js">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $title ?></title>
  <meta name="keywords" content="<?php echo $keywords ?>" />
  <meta name="description" content="<?php echo $description ?>" />
  <?php if($css_style == 'details'): ?><meta property="og:title" content="<?php echo ($item["product_name"]); ?> - <?php echo ($item["serial_no"]); ?>"/>
  <meta property="og:type" content="product"/>
  <meta property="og:url" content="http://www.isweek-zh.com/32.html"/>
  <meta property="og:site_name" content="ISweek.com"/>
  <meta property="og:description" content="<?php echo ($item["abstract"]); ?>"/>
  <meta property="og:image" content="http://www.isweek-zh.com<?php echo $item['images'][0]['thumb_300']; ?>"/>
  <meta name="application-name" content="<?php echo $title ?>"/>
  <meta name="msapplication-TileColor" content="#bb0000"/>
  <meta name="msapplication-TileImage" content="http://www.isweek-zh.com/statics/front/img/logo.png"/><?php endif; ?>

  <link rel="stylesheet" href="/statics/front/css/main.css" />
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
  <![endif]-->
  <script src="/statics/front/js/sea-modules/seajs/seajs/2.2.1/sea.js" id="seajsnode"></script>
  <script src="/statics/front/js/main.js"></script>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
<header id="header">
 <div class="wrapper">
	 <h1><a href="/"><img src="/statics/front/img/logo.png" alt="ISweek.com" /></a></h1>
      <form action="<?php echo U('/home/search');?>" class="search clearfix" id="search">
        <fieldset class="search-panel">
          <input type="text" name="kw" class="kw js-placeholder" value="<?php if(empty($_GET['kw'])){ echo '产品名称/型号/关键词'; }else{ echo $_GET['kw']; } ?>"/>
          <span class="select-wrap">
            <select name="cid" id="js-select">
              <option value="0">全部类目</option>
              <?php foreach($search_categorys as $vo){ ?>
              <option value="<?php echo ($vo["term_id"]); ?>" <?php if($curr_search_cid==$vo['term_id']){ echo 'selected'; } ?> ><?php echo ($vo["name"]); ?></option>
              <?php } ?>
            </select>
          </span>
        </fieldset>
        <button type="submit" class="search-submit"><span>搜索</span></button>
      </form>

      <a class="lang" href="http://www.isweek.com/" target="_blank">English</a>
    </div>
</header>

<nav id="nav">
  <div class="wrapper">
    <ul class="fn-clearfix">
      <li><a class="<?php if(empty($curr_term_id)){ echo 'on'; }?> first" href="/allcategories.html">全部类目</a></li>
      <?php foreach($navi_categorys as $vo){ ?>
      <li><a class="<?php foreach($arr_parent as $vo_parent){ if($vo_parent == $vo['term_id']){ echo ' on'; break; } } ?>"
      	href="<?php echo rw_category_url($vo['name'],$vo['term_id']);?>"><?php echo ($vo["name"]); ?></a></li>
      <?php } ?>

      <li class="fr">
        <a class="<?php if($curr_menu_key == 'SourcingService'){ echo 'on'; } ?>" href="/SourcingService.html">委托采购</a>
      </li>

      <li class="fr">
        <a class="trigger" href="/aboutus.html">关于我们</a>
        <ul>
          <li><a href="/aboutus.html">关于我们</a></li>
          <li><a href="/contactus.html" title="contact us-ISweek.com">联系我们</a></li>
        </ul>
      </li>

      <li class="fr">
        <a class="" href="http://news.isweek.cn">资讯</a>
      </li>

    </ul>
  </div>
</nav>

  <div id="main">
    <div class="wrapper">
      <div class="w-fly-mr">
        <div class="w-fly-cnt">

        <div class="position"><a href="/">主页 </a>
        <?php $left_curr_term_ids=array(); foreach($term_ids as $id){ foreach($dao_hang_categorys as $vo){ if($id==$vo['term_id']){ if($id != $curr_term_id){ $left_curr_term_ids[] = $id; $url = rw_category_url($vo['name'],$vo['term_id']); echo '<i>|</i> <a href="'.$url.'">'.$vo['name'].'</a>'; }else{ echo '<i>|</i> <span class="highlight">Terms and Conditions</span>'; } } } } ?></div>

          <aside class="aside">
            <div class="w-box w-box-contact">
              <div class="w-box-hd">
                <h2 class="title">联系工采网</h2>
              </div>
              <div class="w-box-bd">
                <ul>
                  <li><a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=2913816085&site=qq&menu=yes" target="_blank" rel="nofollow">QQ:2913816085</a></li>
        				  <li><span class="tel">0755-83289071<br>0755-83289035</span> </li>
        				  <li><a class="email" href="mailto:sales@isweek.cn" target="_blank" rel="nofollow">sales@isweek.cn</a></li>
<!--
                  <li><a class="online" href="#" target="_blank" rel="nofollow">Online Support</a></li>
                  <li><a class="skype" href="#" target="_blank" rel="nofollow">Skype</a></li>
                  <li><a class="msn" href="#" target="_blank" rel="nofollow">MSN</a></li>
                  <li><a class="tel"></a></li>

                  <li><a class="online" href="#" target="_blank" rel="nofollow">Online Support</a></li>
                    <li><a class="qq" href="#" target="_blank" rel="nofollow">QQ:</a></li>
                      <li><a class="tel" href="#" target="_blank" rel="nofollow">0755-83333333</a></li>
                        <li><a class="email" href="mailto:sales@isweek.com" target="_blank" rel="nofollow">sales@isweek.com</a></li>
-->
				</ul>
              </div>
            </div>
            <?php if(!empty($recommend_products)): ?><div class="w-box w-box-popular">
              <div class="w-box-hd">
                <h2 class="title">热卖产品</h2>
              </div>
              <div class="w-box-bd">
                <ul>
				  <?php if(is_array($popular_products)): $i = 0; $__LIST__ = $popular_products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					  <a class="img" href="<?php echo rw_product_url($vo['product_name'],$vo['serial_no'],$vo['id']);?>" target="_blank"><img src="<?php echo ($vo["thumb_200"]); ?>" alt="<?php echo ($vo["product_name"]); ?>" width="100" height="100" /></a>
					  <h5 class="name"><a href="<?php echo rw_product_url($vo['product_name'],$vo['serial_no'],$vo['id']);?>" target="_blank"><?php echo ($vo["product_name"]); ?></a></h5>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </div>
            </div><?php endif; ?>
          </aside>

          <div class="prodetails">
            <h1 class="protitle"><?php echo ($item["product_name"]); ?> - <?php echo ($item["serial_no"]); ?></h1>
            <div class="proimg" id="js-proimg">
              <div class="info">
                <p><?php echo ($item["features"]); ?></p>
                <ul>
                  <li>产品型号: <?php echo ($item["serial_no"]); ?></li>
                  <?php if(!empty($item['attachment'])){ ?>
                  <li>附件: <a href="<?php echo ($item["attachment"]); ?>" target="_blank"><img src="/statics/front/img/icon-pdf.png" alt="Date Sheet File" /></a></li>
                  <?php } ?>
                </ul>
              </div>
              <div class="preview">
                <ul class="imgs">
                  <?php foreach($item['images'] as $k=>$vo){ ?>
                  <?php if($k==0){ ?>
                  <li><a class="jqzoom"><img class="lazy" src="<?php echo ($vo["thumb_300"]); ?>" data-src="<?php echo ($vo["url"]); ?>" alt="<?php echo ($item["product_name"]); ?>" width="300" height="300" /></a></li>
                  <?php }else{ ?>
              	  <li class="fn-hide"><a class="jqzoom"><img class="lazy" src="<?php echo ($vo["thumb_300"]); ?>" data-src="<?php echo ($vo["url"]); ?>" alt="<?php echo ($item["product_name"]); ?>" width="300" height="300" /></a></li>
                  <?php } } ?>
                </ul>
                <div class="tips">Mouse over image to zoom</div>
              </div>
              <ul class="thumbs">
              <?php foreach($item['images'] as $vo){ ?>
              <li><img class="lazy" src="<?php echo ($vo["thumb_100"]); ?>" /></li>
              <?php } ?>
              </ul>

              <!-- <div id="js-share" class="share">
                <span>分享:</span>
                <a class="twitter" rel="twitter" title="Connect with us on twitter"></a>
                <a class="facebook" rel="facebook" title="Connect with us on facebook"></a>
                <a class="googleplus" rel="googleplus" title="Connect with us on Google Plus"></a>
                <a class="share-sina" rel="sina" title="Connect with us on sina"></a>
                <a class="share-weibo" rel="weibo" title="Connect with us on weibo"></a>
                <a class="share-qqzone" rel="qqzone" title="Connect with us on qqzone"></a>
                <a class="share-email" rel="email" title="Connect with us on email"></a>
              </div> -->
              <div class="share">
                <!-- bdshare -->
                <div class="bdsharebuttonbox">
                  <span class="share-title">分享到:</span>
                  <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                  <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                  <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                  <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                  <a href="#" class="bds_more" data-cmd="more"></a>
                  <a class="bds_count" data-cmd="count"></a>
                </div>
                <script>
                  window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                </script>
                <!-- /bdshare -->
              </div>
            </div>
            <div class="prodesc">
              <h3 class="title">产品介绍</h3>
              <p><?php echo ($item["description"]); ?></p>
            </div>
          </div>

          <div class="box-sourcing-service">
            <p>如果您未找到合适的产品，您可以委托工采网为您采购。请点击：</p>
            <a href="/SourcingService.html">委托采购</a>
          </div>
          <p class="pro-explain">ISweek 工采网的所有产品均来自于原始生产厂商直接供货，非第三方转售。</p>

<!-- <div style="font-family: 宋体;font-size: 18px; color:#E82D2C; text-align: center;">ISweek 工采网的所有产品均来自于原始生产厂商直接供货，非第三方转售。</div> -->

		  <?php if(!empty($recommend_products)): ?><div class="w-prolist fn-cb">
            <div class="w-prolist-hd">
              <h2 class="title">推荐产品</h2>
            </div>
            <div class="w-prolist-bd">
              <ul class="clearfix">
			  <!-- -->
			  <?php if(is_array($recommend_products)): $i = 0; $__LIST__ = $recommend_products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                  <a class="img" href="<?php echo rw_product_url($vo['product_name'],$vo['serial_no'],$vo['id']);?>" target="_blank"><img src="<?php echo ($vo["thumb_100"]); ?>" alt="<?php echo ($vo["product_name"]); ?>" width="100" height="100" /></a>
                  <h5 class="name"><a href="<?php echo rw_product_url($vo['product_name'],$vo['serial_no'],$vo['id']);?>" target="_blank"><?php echo ($vo["product_name"]); ?></a></h5>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
			  <!-- end -->
              </ul>
            </div>
          </div><?php endif; ?>
        </div>
      </div>
      <aside class="w-fly-l">
  <div id="sidebar">
    <ul class="catlist">
      <li class="catlist-item">
        <a class="<?php if (empty($curr_term_id) && empty($page_biaozhi)) echo 'current ' ?>link" href="/">热销产品</a>
      </li>

	  <?php if(!empty($page_biaozhi) && $page_biaozhi=='product_detail'){ $arr_parent = $term_ids; ?>
      <?php foreach($homepage_categorys2 as $vo){ ?>
      <li class="catlist-item <?php foreach($arr_parent as $vo_parent){ if($vo_parent == $vo['term_id']){ echo ' unfold'; break; } } ?>">
        <a class="link" href="<?php echo rw_category_url($vo['name'],$vo['term_id']);?>"><!-- 一级菜单 --><?php echo $vo['name'];?></a>
        <?php if(!empty($vo['_child']) && is_array($vo['_child'])){ ?>
        <?php $jia = true; foreach($arr_parent as $vo_parent){ if($vo_parent == $vo['term_id']){ $jia=false; break; } } ?>
        <i><?php if($jia){ echo '+'; }else{ echo '–'; } ?></i>
        <dl class="sublist fn-hide" style="<?php if($jia){ echo 'display:none;'; }else{ echo 'display:block;'; } ?>">
          <?php foreach($vo['_child'] as $vo2){ ?>
          <dt class="<!--?php if($curr_term_id == $vo2['term_id']){ echo 'current'; } ?-->
          <?php
 foreach($left_curr_term_ids as $id){ if($id == $vo2['term_id']){ echo ' current'; } } ?>
          "><!-- 二级菜单 -->
          	<a href="<?php echo rw_category_url($vo2['name'],$vo2['term_id']);?>"><?php echo $vo2['name'];?></a>
          </dt>
          <?php if(!empty($vo2['_child']) && is_array($vo2['_child'])){ ?>
          <?php $show = false; foreach($arr_parent as $vo_parent){ if($vo_parent == $vo2['term_id']){ $show=true; break; } } ?>
          <dd>
            <ul>
              <?php foreach($vo2['_child'] as $vo3){ ?>
              <li><a class="<?php foreach($arr_parent as $vo_parent){ if($vo_parent == $vo3['term_id']){ echo 'current'; break; } } ?>"
              		href="<?php echo rw_category_url($vo3['name'],$vo3['term_id']);?>"><!-- 三级菜单 --><?php echo $vo3['name'];?></a>
              		</li>
              <?php } ?>
            </ul>
          </dd>
          <?php } ?>
          <?php } ?>
        </dl>
        <?php } ?>
      </li>
      <?php } ?>
      
	  <?php }else{ ?>
	  <?php foreach($homepage_categorys2 as $vo){ ?>
      <li class="catlist-item <?php foreach($arr_parent as $vo_parent){ if($vo_parent == $vo['term_id']){ echo ' unfold'; break; } } ?>">
        <a class="link" href="<?php echo rw_category_url($vo['name'],$vo['term_id']);?>"><!-- 一级菜单 --><?php echo $vo['name'];?></a>
        <?php if(!empty($vo['_child']) && is_array($vo['_child'])){ ?>
        <?php $jia = true; foreach($arr_parent as $vo_parent){ if($vo_parent == $vo['term_id']){ $jia=false; break; } } ?>
        <i><?php if($jia){ echo '+'; }else{ echo '–'; } ?></i>
        <dl class="sublist fn-hide" style="<?php if($jia){ echo 'display:none;'; }else{ echo 'display:block;'; } ?>">
          <?php foreach($vo['_child'] as $vo2){ ?>
          <dt class="<!--?php if($curr_term_id == $vo2['term_id']){ echo 'current'; } ?-->
          <?php
 foreach($left_curr_term_ids as $id){ if($id == $vo2['term_id']){ echo ' current'; } } ?>
          "><!-- 二级菜单 -->
          	<a href="<?php echo rw_category_url($vo2['name'],$vo2['term_id']);?>"><?php echo $vo2['name'];?></a>
          </dt>
          <?php if(!empty($vo2['_child']) && is_array($vo2['_child'])){ ?>
          <?php $show = false; foreach($arr_parent as $vo_parent){ if($vo_parent == $vo2['term_id']){ $show=true; break; } } ?>
          <dd>
            <ul>
              <?php foreach($vo2['_child'] as $vo3){ ?>
              <li><a class="<?php foreach($arr_parent as $vo_parent){ if($vo_parent == $vo3['term_id']){ echo 'current'; break; } } ?>"
              		href="<?php echo rw_category_url($vo3['name'],$vo3['term_id']);?>"><!-- 三级菜单 --><?php echo $vo3['name'];?></a>
              		</li>
              <?php } ?>
            </ul>
          </dd>
          <?php } ?>
          <?php } ?>
        </dl>
        <?php } ?>
      </li>
      <?php } ?>
      
	  <?php } ?>

    </ul>
  </div>
</aside>

    </div>
  </div>
  <footer id="footer">
    <div class="wrapper">
      <div class="links">
        <a class="<?php if($curr_menu_key == 'SourcingService'){ echo 'on'; } ?>" href="/SourcingService.html">委托采购</a>
      </div>
      <div class="help clearfix">
        <dl class="support clearfix">
          <dt>客户支持</dt>
          <dd><a class="skype" href="http://wpa.qq.com/msgrd?v=3&uin=2913816085&site=qq&menu=yes" target="_blank" rel="nofollow">QQ:2913816085</a></dd>
          <dd><span class="tel" >0755-83289071 <i class="devide"></i> 0755-83289035</span></dd>
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