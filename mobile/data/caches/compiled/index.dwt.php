<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="ECTouch 2.2.25" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/swiper/css/swiper.min.css"/>
<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="__TPL__/css/index.css"/>
<link rel="stylesheet" type="text/css" href="__TPL__/css/search_index.css"/>
<style type="text/css">
  .swiper-wrapper .swiper-pagination-bullet-active {background: #1CBB7F;}
</style>
</head>
<body>
<div class="con">
<div class="index-max-box">
<?php if (! $this->_var['subscribe']): ?>
<div class="ect-attention dis-box" >
	<div class="attention-img"><img src="__TPL__/images/attention-logo.png"></div>
	<div class="attention-text box-flex">
		<p style="font-size: 1rem;"><span style="color:#fff">欢迎进入</span><span style="color:#57C850"> 微商城</span></p>
		<p style="font-size: 1rem;"><span style="color:#fff">关注公众号,享专属服务</span></p>
	</div>
	<div class="attention-button" style="  padding-top:0.8rem;">
		<a class='lizhuanz'><button class="button">立即关注</button></a>
	</div>
</div>
<?php endif; ?>
<header class="index-header comWidth">
  <i class="index-header-menu iconfont fl" onclick="window.location = '<?php echo url('category/top_all');?>'">&#xe627;</i>
  <div class="index-search-box fl">
    <input type="text" class="index-search-input" placeholder="商品搜索" onclick="openSearch();">
    <a href="javascript:void(0)" id="translateVoice" style="display:None;"><i class="index-search-sound iconfont fr">&#xe623;</i></a>
  </div>
  <a href="javascript:openSearch()"><i class="index-header-right iconfont fr">&#xe603;</i></a>
</header>
</div>

<div class="index-guanz-t"> 
	<div class="index-guanz-show">		
		<img src="__TPL__/images/guanzm.png">
		<p><span class="left">长按二维码关注公众号</span><span class="right index-show-close">关闭</span></p>
	</div>
	<div class="index-guanz-bg"></div>
</div>

</script>
<div class="index-main comWidth">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php 
$k = array (
  'name' => 'ads',
  'id' => '255',
  'num' => '3',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="index-menu">
    <ul class="index-menu-ul">
    <?php $_from = $this->_var['navigator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
    <li class="fl"><a href="<?php echo $this->_var['nav']['url']; ?>"><img src="<?php echo $this->_var['nav']['pic']; ?>" /></a><a class="index-menu-text" href="<?php echo $this->_var['nav']['url']; ?>"><?php echo $this->_var['nav']['name']; ?></a></li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    </div>

  <div class="index-recom">
      <div class="index-recom-left fl">
        <?php 
$k = array (
  'name' => 'ads',
  'id' => '257',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
      <div class="index-recom-right fr">
        <?php 
$k = array (
  'name' => 'ads',
  'id' => '258',
  'num' => '2',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
  </div>
  <div class="index-theme">
  	<ul>
    	<?php 
$k = array (
  'name' => 'ads',
  'id' => '256',
  'num' => '4',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </ul>
  </div>

  <div class="index-theme" style="display:none">
      <ul class="index-more-list">
      <?php echo $this->fetch('library/cat_goods.lbi'); ?>
      </ul>
  </div>

	<div class="index-more">
  	<div class="index-more-icon">
      	<span>更多惊喜</span>
      </div>
      <ul class="index-more-list" id="J_ItemList">
        <div class="single_item"></div>
        <a href="javascript:;" style="text-align:center" class="get_more"></a>
      </ul>
  </div>
</div>

<footer class="index-footer comWidth">
	<?php echo $this->fetch('library/page_index_menu.lbi'); ?>
</footer>
</div>
<?php echo $this->fetch('library/search_index.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript">
get_asynclist("<?php echo url('index/ajax_goods', array('type'=>'best'));?>" , '__TPL__/images/loader.gif');
</script>
<script>
	/*立即关注*/
	$(function($) {
	  $(".lizhuanz").click(function(){
		 $(".index-guanz-t").addClass("active");
	  });
	  $(".index-show-close").click(function()	{
		 $(".index-guanz-t").removeClass("active");
	  });
	});	
	if($(".ect-attention").hasClass("ect-attention")){
	$(".index-main").css({"marginTop":"8rem"})
	}else{
		 $(".index-main").css({"marginTop":"4rem"})
		}
    $(function($) {
        $(".ect-index-share").click(function(){

            $(".share-div").addClass("active");
        });
    });
    $(".share-div").click(function(){
        $(".share-div").removeClass("active");
    })

</script>
</body>
</html>