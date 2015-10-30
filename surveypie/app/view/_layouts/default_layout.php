<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="survey, online surveys, survey software, survey tools, surveypie, survey pie, survey creator, create online surveys, free survey software, free form builder, questionnaire creator" />
<meta name="description" content="Create online surveys with SurveyPie and start collecting responses right away! View real-time results with graphs and detailed reports. Start your own customer satisfaction surveys today." />
<meta content="SurveyPie@surveypie.com" name="author" />
<meta content="Copyright www. surveypie.com。All Rights Reserved"  name="copyright" />
<link rel="icon" href="/logo.ico" type="image/x-icon" />
<link rel="dns-prefetch" href="//<?php echo $_SERVER['HTTP_HOST']; ?>">
<title>SurveyPie-Free online survey tool</title>
<link href="/css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="head">
<div class="login">
        <?php if (!Passport::instance()->sn): ?>
            <form method="post" action="http://www.surveypie.com/passport/login?ref=http://forum.surveypie.com/">
                Email:<input type="text" name="email" onfocus="javascript:this.select();"/>
                Password:<input type="password" name="passwd" onfocus="javascript:this.select();"/>
                <button type="submit">Login</button> 
                <a href="http://www.surveypie.com/passport/forget">Forget Password?</a>
            </form>

        <?php else: ?>
        <ul>
            <li><?php echo Passport::instance()->email; ?>,</li>
            <li><a href="http://www.surveypie.com/my/homepage">Home</a></li>
            <li><a href="http://www.surveypie.com/survey/edit">Create New Survey</a></li>
            <li><a href="http://www.surveypie.com/my/profile">My Account</a></li>
            <li><a href="http://www.surveypie.com/my/surveys">My Surveys</a></li>
            <li><a href="http://www.surveypie.com/passport/logout">Log Out</a></li>
        </ul>
        <?php endif; ?>
    </div>
    </div>
<div class="head_nav">
    <div class="hd">
        <div class="logo"><a href="http://www.surveypie.com"><img src="/img/logo.gif" alt="Free online survey tool" border="0" /></a></div>
        <div class="nav">
            <ul>
                <li class="current"><a href="http://www.surveypie.com">Home</a></li>
                <li><a href="http://www.surveypie.com/default/tour">Take a Tour</a></li>
                <li><a href="http://www.surveypie.com/default/pricing">Pricing</a></li>
                <li><a href="http://blog.surveypie.com">Blog</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="sub_content">
<div id="page">
<div class="main">
    <h1>Forums</h1>
    <div class="page-desc">All kinds of Questions, Discussions or Suggestions are welcomed.</div>
    <form class="search-box" action="/">
        <input size="57" value="" title="Search"
               class="search-input" name="q" maxlength="100" />
        <input type="submit" class="search-submit" value="Search"/>
    </form>
    <?php $this->_block('contents'); ?>
    <?php $this->_endblock(); ?>
</div>
</div>
</div>
<div class="footer">
    <div class="ft">
        <ul>
            <li>
                <h4>Site links</h4>
                <a href="http://www.surveypie.com/passport/register">Sign Up</a><br />
                <a href="http://www.surveypie.com/default/tour">Take a Tour</a><br />
                <a href="http://www.surveypie.com/default/pricing">Pricing</a><br />
                <a href="http://www.surveypie.com/default/features">Features</a></li>
            <li>
                <h4>About us</h4>
                <a href="http://www.surveypie.com/default/aboutus">About Us</a><br />
                <a href="http://blog.surveypie.com" target="_blank">Blog</a><br />
                <a href="http://www.facebook.com/pages/SurveyPie/122046584525053" target="_blank">Facebook</a><br />
                <a href="http://twitter.com/SurveyPie" target="_blank">Twitter</a></li>
            <li>
                <h4>Policies</h4>
                <a href="http://www.surveypie.com/default/terms">Terms of Service</a><br />
                <a href="http://www.surveypie.com/default/policy">Privacy policy</a> </li>
            <li>
                <h4>Help centre</h4>
                <a href="http://forum.surveypie.com" target="_blank">Forum</a><br />
                <a href="http://www.surveypie.com/help/index.html">Help</a><br />
                <a href="http://www.surveypie.com/help/faq.html">FAQ</a></li>

        </ul>
        <div class="copyright">© 2010 Copyright SurveyPie All Rights Reserved.</div>
    </div>
    </div>
<?php $this->_block('javascript', 'append'); ?>
<script type="text/javascript" src="/js/lib/mootools.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3028957-13']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php $this->_endblock(); ?>
</body>
</html>
