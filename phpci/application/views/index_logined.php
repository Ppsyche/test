<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url(); ?>">
  <title>Johnny的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery_002.js"></script>
  <script type="text/javascript" src="assets/js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon">Johnny's Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
		<?php 
			if(isset($_COOKIE['name'])){
				echo $_COOKIE['name'];
			}
			else{
				echo "游客";
			}
		?>
				 [ <a href="user/do_login">退出</a> ]
				<span id="OSC_Notification">
			<a href="user/inbox" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a></span>
</div>
		<div id="SearchBar">
    		<form action="user/index_logined">
			<!-- <input name="user" value="154693" type="hidden"> -->
			<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="user/adminIndex"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong>Johnny的博客</strong>
		<div><a href="user/index_logined">TA的博客列表</a>&nbsp;|
			<a href="user/sendMsg">发送留言</a></div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
<ul>
	<?php 
		if($data){
		foreach ($data as $v) {
	?>
  <li class="Blog" id="blog_24027">
	<h2 class="BlogAccess_true BlogTop_0"><a href="user/viewPost?id=<?php echo $v->BLOG_ID ?>"><?php echo $v->TITLE ?></a></h2>
	<div class="outline">
	  <span class="time">发表于 <?php echo $v->ADD_TIME ?></span>
	  <span class="catalog">分类: <a href="#"><?php echo $v->NAME ?></a></span>
	  <span class="stat">统计: 1评/4阅</span>
	  	  <span class="blog_admin">( <a href="user/newBlog">修改</a> | <a href="user/do_delete?id=<?php echo $v->BLOG_ID?>">删除</a> )</span>	  
	  	</div>
		<div class="TextContent" id="blog_content_24027">
				<?php echo $v->CONTENT ?>
		<div class="fullcontent"><a href="user/viewPost_comment">阅读全文...</a></div>
			</div>
	  </li>
	 <?php }}
	 	else{
	 		echo "无";
	 	}
	 ?>
	 <p style="text-align: center; font-size: 1.3em;"><?php echo $this->pagination->create_links(); ?></p>
	 
  <!-- <li class="Blog" id="blog_24026">
	<h2 class="BlogAccess_true BlogTop_0"><a href="user/viewPost_logined">测试文章2</a></h2>
	<div class="outline">
	  <span class="time">发表于 2011年06月17日 23:06</span>
	  <span class="catalog">分类: <a href="#">工作日志</a></span>
	  <span class="stat">统计: 2评/12阅</span>
	  	  <span class="blog_admin">( <a href="newBlog">修改</a> | <a href="javascript:delete_blog(24026)">删除</a> )</span>	  
	  	</div>
		<div class="TextContent" id="blog_content_24026">
				测试文章1
		<div class="fullcontent"><a href="viewPost_logined">阅读全文...</a></div>
			</div>
	  </li>
  <li class="Blog" id="blog_24025">
	<h2 class="BlogAccess_true BlogTop_0"><a href="viewPost">测试文章1</a></h2>
	<div class="outline">
	  <span class="time">发表于 2011年06月17日 23:04</span>
	  <span class="catalog">分类: <a href="#">工作日志</a></span>
	  <span class="stat">统计: 0评/5阅</span>
	  	  <span class="blog_admin">( <a href="newBlog">修改</a> | <a href="javascript:delete_blog(24025)">删除</a> )</span>	  
	  	</div>
		<div class="TextContent" id="blog_content_24025">
				<b>测试文章1</b>
		<div class="fullcontent"><a href="viewPost">阅读全文...</a></div>
			</div>
	  </li> -->
</ul>
<div class="clear"></div>
	</div>
<div class="BlogMenu"><div class="admin SpaceModule">
  <strong>博客管理</strong>
  <ul class="LinkLine">
	<li><a href="user/newBlog">发表博客</a></li>
			<li><a href="user/blogCatalogs">博客分类管理</a></li>
	<li><a href="user/blogs">文章管理</a></li>
	<li><a href="user/blogComments">网友评论管理</a></li>
  </ul>
</div>
<div class="catalogs SpaceModule">
  <strong>博客分类</strong>
  <ul class="LinkLine">
  	<?php 
  		foreach ($data2 as $v) {
  	?>
    	<li><a href="user/index_logined?id=<?php echo $v->CATALOG_ID ?>"><?php echo $v->NAME ?></a></li>
    <?php } ?>
	  </ul>
</div>
<div class="comments SpaceModule">
  <strong>最新网友评论</strong>
      <ul>
		<li>
		<span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">hoho
			<span class="t">发布于 11分钟前 <a href="user/viewPost_comment">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
		<li>
		<span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">测试评论111
			<span class="t">发布于 34分钟前 <a href="user/viewPost_logined">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
		<li>
		<span class="u"><a href="user/#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">测试评论
			<span class="t">发布于 34分钟前 <a href="viewPost_logined">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
	  </ul>
  </div></div>
<div class="clear"></div>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</div>
<script>
// $.post('user/do_index_logined',{},function(data){
// 		if(data){
// 			console.log(data);
// 		}else{

// 		}
// 	},'json');
</script>
</body></html>