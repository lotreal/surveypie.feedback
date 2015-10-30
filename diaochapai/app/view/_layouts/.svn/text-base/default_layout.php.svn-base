<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="调查派，问卷调查，调查，问卷，调查表，调查问卷设计，免费，在线调查系统，市场调查，大学生调查问卷，满意度调查，员工满意度调查，工作满意度调查，网上调查，社会调查" />
<meta name="description" content="调查派是免费的在线问卷调查系统，帮您设计问卷并将它们在网上发布。提供市场调查，满意度调查，社会调查等问卷调查服务。调查表设计简单易操作，数据统计分析专业，是您在制作调查问卷时最好的选择。" />
<meta content="调查派@diaochapai.com" name="author" />
<meta content="本页版权 www. diaochapai.com调查派所有。All Rights Reserved"  name="copyright" />
<link rel="icon" href="/logo.ico" type="image/x-icon" />
    <link rel="dns-prefetch" href="//<?php echo $_SERVER['HTTP_HOST']; ?>">
    <title>调查派 -《免费问卷调查系统-调查派 设计发布调查问卷就这么简单》</title>
  <link href="/css/default.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div id="page">
    <div class="login">
        <?php if (!Passport::instance()->sn): ?>
            <form method="post" action="http://www.diaochapai.com/passport/login?ref=http://feedback.diaochapai.com/">
                Email:<input type="text" name="email" onfocus="javascript:this.select();"/>
                密码:<input type="password" name="passwd" onfocus="javascript:this.select();"/>
                <button type="submit">登录</button> 
                <a href="http://www.diaochapai.com/passport/forget">忘记密码</a>
            </form>

        <?php else: ?>
        <ul>
            <li><?php echo Passport::instance()->email; ?>,</li>
            <li><a target="_blank" href="http://www.diaochapai.com/survey/edit">新建调查</a></li>
            <li><a target="_blank" href="http://www.diaochapai.com/my/surveys">我的调查</a></li>
            <li><a target="_blank" href="http://www.diaochapai.com/my/homepage">我的首页</a></li>
            <li><a target="_blank" href="http://www.diaochapai.com/my/profile">我的账户</a></li>
            <li><a target="_blank" href="http://www.diaochapai.com/passport/logout">退出</a></li>
        </ul>
        <?php endif; ?>
    </div>
    <div class="header">
      <h1 id="logo"><a href="http://www.diaochapai.com"><img src="/img/logo.gif" border="0" /></a></h1>
          <div class="nav">
    	<ul>
        	<li><a href="http://www.diaochapai.com">首页</a></li>
            <li><a href="http://www.diaochapai.com/default/feature">功能特点</a></li>
            <li><a href="http://www.diaochapai.com/passport/register" target="_blank">注册</a></li>
            <li><a href="http://blog.diaochapai.com" target="_blank">博客</a></li>
            <li><a href="/">反馈</a></li>
            <li><a href="http://support.diaochapai.com" target="_blank">帮助</a></li>
        </ul>
    </div>
	</div>
    <div class="main">
      <h2></h2>
      <div class="page-desc">如果您在使用过程中遇到任何困难或问题，请在这里提出，我们会尽快回复。调查派欢迎用户的意见和建议。</div>
      <form class="search-box" action="/">
        <input size="57" value="" title="搜索"
               class="search-input" name="q" maxlength="100" />
        <input type="submit" class="search-submit" value="搜索"/>
      </form>

      <?php $this->_block('contents'); ?><?php $this->_endblock(); ?>
	</div>
      <div id="footer">
        <ul id="footer-nav">
          <li class="first"><a href="#">关于我们</a></li>
          <li><a href="#">注册</a></li>
          <li><a href="#">功能特性</a></li>
          <li><a href="#">使用条款</a></li>
          <li><a href="#">友情链接</a></li>
          <li><a href="#">常用问题</a></li>
          <li class="last"><a href="#">博客</a></li>
        </ul>
         <p> Copyright 2007-2010 重庆善为派科技有限公司版权所有<br />
          渝IPC备07501184号</p>
      </div>

    </div>

    <?php $this->_block('javascript', 'append'); ?>
    <script type="text/javascript" src="/js/lib/mootools.js"></script>
    <?php $this->_endblock(); ?>

  </body>
</html>
