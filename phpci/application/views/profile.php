<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <base href="<?php echo site_url(); ?>">
  <title>会员资料设置 Johnny的博客 - SYSIT个人博客</title>
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
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>							</span>
    </div>
		<div id="SearchBar">
    		<form action="#">
			<input name="user" value="154693" type="hidden">	
			<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="user/index_logined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">会员资料设置</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="user/inbox">站内留言(0/1)</a></li>
			<li class="current"><a href="user/profile">编辑个人资料</a></li>
			<li><a href="user/chpwd">修改登录密码</a></li>
			<li><a href="user/userSettings">网页个性设置</a></li>
		</ol>
	</li>		
</ul>
<ul>
	<li class="caption">博客管理	
		<ol>
			<li><a href="user/newBlog">发表博客</a></li>
			<li><a href="user/blogCatalogs">博客设置/分类管理</a></li>
			<li><a href="user/blogs">文章管理</a></li>
			<li class="current"><a href="user/blogComments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<ul class="tabnav"> 
	<li class="current"><a href="#">会员基本资料</a></li> 
</ul>

<div class="MainForm">
<form class="AutoCommitJSONForm" action="user/update_user" method="POST">
<table>
	<tbody><tr>
		<th>登录帐号</th>		
		<td>
			<?php echo $data->ACCOUNT ?>
		</td>
	</tr>
	<tr>
		<th>姓名</th>		
		<td>
			<input name="name" size="20" maxlength="20" class="TEXT" value="<?php echo $data->NAME ?>" type="text">
			<span class="Info" id="name_msg">不能超过10个字</span>
		</td>
	</tr>
	<tr>
    	<th>性别</th>		
		<td>
			<input name="gender" value="1" <?php echo $data->GENDER==1?"checked":"" ?> type="radio">男
			<input name="gender" value="2" <?php echo $data->GENDER==2?"checked":"" ?> type="radio">女
		</td>	
    </tr>
	<tr>
    	<th>出生年月</th>		
		<td>
			<select name="y">
			<?php 
				$birthday=explode("-",$data->BIRTHDAY);
				var_dump($birthday);
				$bol=array(true,true,true);
				for ($i=1950; $i <2100 ; $i++) {
					if($bol[0]&&$i==$birthday[0]){
						$bol[0]=false;
						echo "<option value='$i' selected>$i</option>";
						continue;
					} 
					echo "<option value='$i'>$i</option>" ;
				}
				if($bol[0]){
					echo "<option value=0 selected>--</option>";
				}
			?>
		</select> 年
            <select name="m">
				<?php 
					for ($i=1; $i <= 12 ; $i++) {
						if($bol[1]&&$i==$birthday[1]){
							$bol[1]=false;
							echo "<option value='$i' selected>$i</option>";
							continue;
						} 
						echo "<option value='$i'>$i</option>" ;
					}
					if($bol[1]){
						echo "<option value=0 selected>--</option>";
					}
				?>

            </select> 月
            <select name="d">
            	<?php 
            		for ($i=1; $i <= 31 ; $i++) {
            			if($bol[2]&&$i==$birthday[2]){
            				$bol[2]=false;
            				echo "<option value='$i' selected>$i</option>";
            				continue;
            			} 
            			echo "<option value='$i'>$i</option>" ;
            		}
            		if($bol[2]){
            			echo "<option value=0 selected>--</option>";
            		}
            	?>


            </select> 日
		</td>	
    </tr>
	<tr>
		<th>居住地区</th>		
		<td><select onchange="showcity(this.value, document.getElementById('userCity'));" name="province" id="userProvince">
	<!-- <option value="">请选择省份</option> -->
	<option value="北京" <?php echo $data->PROVINCE=="北京"?"selected":"" ?>>北京</option> 
	<option value="上海" <?php echo $data->PROVINCE=="上海"?"selected":"" ?>>上海</option> 
	<option value="广东" <?php echo $data->PROVINCE=="广东"?"selected":"" ?>>广东</option> 
	<option value="江苏" <?php echo $data->PROVINCE=="江苏"?"selected":"" ?>>江苏</option> 
	<option value="浙江" <?php echo $data->PROVINCE=="浙江"?"selected":"" ?>>浙江</option> 
	<option value="重庆" <?php echo $data->PROVINCE=="重庆"?"selected":"" ?>>重庆</option> 
	<option value="安徽" <?php echo $data->PROVINCE=="安徽"?"selected":"" ?>>安徽</option> 
	<option value="福建" <?php echo $data->PROVINCE=="福建"?"selected":"" ?>>福建</option> 
	<option value="甘肃" <?php echo $data->PROVINCE=="甘肃"?"selected":"" ?>>甘肃</option> 
	<option value="广西" <?php echo $data->PROVINCE=="广西"?"selected":"" ?>>广西</option> 
	<option value="贵州" <?php echo $data->PROVINCE=="贵州"?"selected":"" ?>>贵州</option> 
	<option value="海南" <?php echo $data->PROVINCE=="海南"?"selected":"" ?>>海南</option> 
	<option value="河北" <?php echo $data->PROVINCE=="河北"?"selected":"" ?>>河北</option> 
	<option value="黑龙江" <?php echo $data->PROVINCE=="黑龙江"?"selected":"" ?>>黑龙江</option> 
	<option value="河南" <?php echo $data->PROVINCE=="河南"?"selected":"" ?>>河南</option> 
	<option value="湖北" <?php echo $data->PROVINCE=="湖北"?"selected":"" ?>>湖北</option> 
	<option value="湖南" <?php echo $data->PROVINCE=="湖南"?"selected":"" ?>>湖南</option> 
	<option value="江西" <?php echo $data->PROVINCE=="江西"?"selected":"" ?>>江西</option> 
	<option value="吉林" <?php echo $data->PROVINCE=="吉林"?"selected":"" ?>>吉林</option> 
	<option value="辽宁" <?php echo $data->PROVINCE=="辽宁"?"selected":"" ?>>辽宁</option> 
	<option value="内蒙古" <?php echo $data->PROVINCE=="内蒙古"?"selected":"" ?>>内蒙古</option> 
	<option value="宁夏" <?php echo $data->PROVINCE=="宁夏"?"selected":"" ?>>宁夏</option> 
	<option value="青海" <?php echo $data->PROVINCE=="青海"?"selected":"" ?>>青海</option> 
	<option value="山东" <?php echo $data->PROVINCE=="山东"?"selected":"" ?>>山东</option> 
	<option value="山西" <?php echo $data->PROVINCE=="山西"?"selected":"" ?>>山西</option> 
	<option value="陕西" <?php echo $data->PROVINCE=="陕西"?"selected":"" ?>>陕西</option> 
	<option value="四川" <?php echo $data->PROVINCE=="四川"?"selected":"" ?>>四川</option> 
	<option value="天津" <?php echo $data->PROVINCE=="天津"?"selected":"" ?>>天津</option> 
	<option value="新疆" <?php echo $data->PROVINCE=="新疆"?"selected":"" ?>>新疆</option> 
	<option value="西藏" <?php echo $data->PROVINCE=="西藏"?"selected":"" ?>>西藏</option> 
	<option value="云南" <?php echo $data->PROVINCE=="云南"?"selected":"" ?>>云南</option> 
	<option value="香港" <?php echo $data->PROVINCE=="香港"?"selected":"" ?>>香港特别行政区</option> 
	<option value="澳门" <?php echo $data->PROVINCE=="澳门"?"selected":"" ?>>澳门特别行政区</option>
	<option value="台湾" <?php echo $data->PROVINCE=="台湾"?"selected":"" ?>>台湾</option> 
	<option value="海外" <?php echo $data->PROVINCE=="海外"?"selected":"" ?>>海外</option>
</select>
<select name="city" id="userCity"><option selected="selected" value="哈尔滨">哈尔滨</option><option value="北安">北安</option><option value="大庆">大庆</option><option value="大兴安岭">大兴安岭</option><option value="鹤岗">鹤岗</option><option value="黑河">黑河</option><option value="佳木斯">佳木斯</option><option value="鸡西">鸡西</option><option value="牡丹江">牡丹江</option><option value="齐齐哈尔">齐齐哈尔</option><option value="七台河">七台河</option><option value="双鸭山">双鸭山</option><option value="绥化">绥化</option><option value="伊春">伊春</option></select>
<script src="profile1_files/getcity.js"></script></td>
	</tr>
	<tr>
		<th>个性签名<br>不超过100字</th>		
		<td><textarea name="signature" style="width: 300px; height: 100px;" class="TEXT"><?php echo $data->SIGNATURE ?></textarea></td>    		
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="保存修改" class="BUTTON SUBMIT" type="submit">
		<span id="error_msg" style="display:none"></span>
		</td>
	</tr>
</tbody></table>
</form>
</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>

</body></html>