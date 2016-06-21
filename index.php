<?php

	include_once __DIR__.'/data.php';

	$pagesize = 10;
	$page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
	$page < 1 && $page = 1;

	$totalnum = getCount();
	$pages = ceil($totalnum / $pagesize);

	if($pages < $page)
	{
		$data = array();
		exit('no data');
	}

	$data = getDataByPage($page);
	$pageStr = getPages($pages, $page);
?>

<!DOCTYPE html>
<!-- saved from url=(0028)http://www.indianfunpic.com/ -->
<html lang="en-US" prefix="og: http://ogp.me/ns#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="http://www.indianfunpic.com/xmlrpc.php">

		<!-- BEGIN Metadata added by the Add-Meta-Tags WordPress plugin -->
		<meta name="description" content="#1 Latest Indian Funny Images Hosting Website">
		<meta name="keywords" content="amazing images, arts &amp; paintings, baby pics, bollywood, cartoons, celebrity, comedy nights with kapil funny pics, cool pics, culture, facebook wall/post, festivals, funny advertisment, funny peoples, funny pictures, funny places, funny quotes, funny video, holi, jokes, misc pics, motivational, nature, old funny pics, pet-animals, political, religious pics, sports, temple, unseen pics, valentine s day special">
		<!-- END Metadata added by the Add-Meta-Tags WordPress plugin -->

		<!-- This site is optimized with the Yoast WordPress SEO plugin v1.4.4 - http://yoast.com/wordpress/seo/ -->
		<title>Indian Fun Pic - Indian Funny Pictures, Photos, Hindi Funny Pics Humor Images</title>
		<meta name="description" content="Daily Latest Indian Funny Photos Images Of People, Politics, Celebs For Facebook Sharing With Desi Quotes/Comments, Humor Pictures @IndianFunPic .Com">
		<link rel="canonical" href="/qsbk/">
		<link rel="next" href="/qsbk/page/2/">
		<meta property="og:locale" content="en_US">
		<meta property="og:title" content="Indian Fun Pic - Indian Funny Pictures, Photos, Hindi Funny Pics Humor Images">
		<meta property="og:description" content="Daily Latest Indian Funny Photos Images Of People, Politics, Celebs For Facebook Sharing With Desi Quotes/Comments, Humor Pictures @IndianFunPic .Com">
		<meta property="og:url" content="http://www.indianfunpic.com/">
		<meta property="og:site_name" content="IndianFunPic.com">
		<meta property="og:type" content="website">
		<!-- / Yoast WordPress SEO plugin. -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="alternate" type="application/rss+xml" title="IndianFunPic.com » Feed" href="http://www.indianfunpic.com/feed/">
		<link rel="alternate" type="application/rss+xml" title="IndianFunPic.com » Comments Feed" href="http://www.indianfunpic.com/comments/feed/">
		<link rel="stylesheet" id="contact-form-7-css" href="/qsbk/css/qsbk/styles.css" type="text/css" media="all">
		<link rel="stylesheet" id="social_comments_rtl-css" href="/qsbk/css/qsbk/social_comments.css" type="text/css" media="all">
		<link rel="stylesheet" id="mosaic-skeleton-css" href="/qsbk/css/qsbk/skeleton.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" id="mosaic-style-css" href="/qsbk/css/qsbk/style.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" id="mosaic-superfish-css" href="/qsbk/css/qsbk/superfish.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" id="mosaic-layout-css" href="/qsbk/css/qsbk/layout.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" id="sedlex_styles-css" href="/qsbk/css/qsbk/296ed5a19a64bf1bb1f6fc31198f5c27cd406b02.css" type="text/css" media="all">
		<script id="facebook-jssdk" src="/qsbk/js/qsbk/all.js"></script><script async="" src="/qsbk/js/qsbk/analytics.js"></script><script src="/qsbk/js/qsbk/ca-pub-2291758308437408.js"></script><script type="text/javascript" src="/qsbk/js/qsbk/jquery.js"></script>
		<script type="text/javascript" src="/qsbk/js/qsbk/a6996768533db6c9703b04ef0cf70e39d2fb9e83.js"></script>
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.indianfunpic.com/xmlrpc.php?rsd">
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.indianfunpic.com/wp-includes/wlwmanifest.xml">
		<meta name="generator" content="WordPress 3.5.1">
		<style type="text/css" id="custom-css">body {background-color: #ffffff}#header {background: #F5F5F5 url(http://indianfunpic.com/wp-content/themes/mosaic/images/header-footer-bg.png) repeat top left scroll}#footer {background: #F5F5F5 url(http://indianfunpic.com/wp-content/themes/mosaic/images/header-footer-bg.png) repeat top left scroll}a, a:link, a:visited, a:active, #content .gist .gist-file .gist-meta a:visited, .entry-title a:hover{color:#62A6E4;}.page-navigation .current, .page-navigation a:hover {background-color: #62A6E4; border-color: #62A6E4; }body{color:#575757;font:normal 15px georgia;line-height:150%}#site-title a{color:#696969;font:normal 40px georgia}#header span.site-desc{color:#949494;font:normal 15px georgia}#navigation ul li a{color:#62A6E4;font:normal 16px georgia}#navigation {border-color:#62A6E4}#navigation ul li.active > a, #navigation ul li.active > a:hover {background:#62A6E4}.entry-title, .entry-title a{color:#505050;font:normal 30px georgia}.entry-meta, .entry-meta span{color:#8a8888;font:normal 12px georgia}.entry-utility, .entry-utility span{color:#8a8888;font:normal 12px georgia}.widget-title{;font:normal 18px georgia}body {}</style>	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

		<style type="text/css">
			.a-stats {
				width: auto;
			}
			.a-stats a {
				background: #7CA821;
				background-image:-moz-linear-gradient(0% 100% 90deg,#5F8E14,#7CA821);
				background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#7CA821),to(#5F8E14));
				border: 1px solid #5F8E14;
				border-radius:3px;
				color: #CFEA93;
				cursor: pointer;
				display: block;
				font-weight: normal;
				height: 100%;
				-moz-border-radius:3px;
				padding: 7px 0 8px;
				text-align: center;
				text-decoration: none;
				-webkit-border-radius:3px;
				width: 100%;
			}
			.a-stats a:hover {
				text-decoration: none;
				background-image:-moz-linear-gradient(0% 100% 90deg,#6F9C1B,#659417);
				background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#659417),to(#6F9C1B));
			}
			.a-stats .count {
				color: #FFF;
				display: block;
				font-size: 15px;
				line-height: 16px;
				padding: 0 13px;
				white-space: nowrap;
			}
		</style>
	</head>

	<body class="home blog right-sidebar">
		<div id="header">
			<div class="inner container">
				<div id="logo">
					<h1 id="site-title">
						<a href="/qsbk/" title="qsbk"><img src="/qsbk/images/qsbk/Indian-Fun-Pic.jpg" alt="qsbk"></a>
					</h1>
				</div>
				<div id="header-extras">
					<div class="widget-content">
						<div class="textwidget">
							<script async="" src="/qsbk/js/qskb/adsbygoogle.js"></script>
							<!-- IFP new 1 -->
							<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2291758308437408" data-ad-slot="1892774761" data-ad-format="auto" data-adsbygoogle-status="done"></ins>
							<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div><!--/#header-->

		
<div id="wrap" class="container"> 

<script async="" src="/qsbk/js/qsbk/adsbygoogle.js"></script>
<!-- IFP new 1 -->
<ins class="adsbygoogle" style="display: block; height: 90px;" data-ad-client="ca-pub-2291758308437408" data-ad-slot="1892774761" data-ad-format="auto" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:960px;background-color:transparent"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:960px;background-color:transparent"><iframe width="960" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;"></iframe></ins></ins></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<div id="content-sidebar-wrap">
		<a id="top"></a>
	<div id="content" class="eleven columns">
		<?php foreach($data as $value) { ?>
		<div id="post-<?=$value['f_id']?>" class="post-<?=$value['f_id']?> post type-post status-publish format-standard hentry category-bollywood">
			<h2 class="entry-title">
				<?=$value['f_title']?>
			</h2>

			<div class="entry-meta">
				<?=$value['f_meta']?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
					$content = $value['f_content'];
					$content = preg_replace('/<h3>Related posts:<\/h3>.*<div class="clear"><\/div>/', '', $content);
					echo $content;
				?>
			</div><!-- .entry-content -->
	
			<div class="entry-utility">
				<?=$value['f_utility']?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->	
		<?php } ?>
		<div class="page-navigation">
			<?=$pageStr?>
		</div>
	</div><!-- /.columns (#content) -->
	<div id="sidebar" class="five columns" role="complementary">
		<ul>
			<li id="search-2" class="widget-container widget_search">
				<!--
				<form role="search" method="get" id="searchform" action="/qsbk/">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="" name="s" id="s">
						<input type="submit" id="searchsubmit" value="Search">
					</div>
				</form>
				-->
			</li>
			<li id="nav_menu-2" class="widget-container widget_nav_menu">
				<div class="menu-pages-container">
					<ul id="menu-pages" class="menu">
						<li id="menu-item-502" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-502">
							<a href="/qsbk/">Home</a>
						</li>
						<li id="menu-item-503" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-503">
							<a href="/qsbk/about-us/">About us</a>
						</li>
						<li id="menu-item-504" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504">
							<a href="/qsbk/contact-us/">Contact Us</a>
						</li>
						<li id="menu-item-505" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-505">
							<a href="/qsbk/privacy-policy/">privacy policy</a>
						</li>
					</ul>
				</div>
			</li>
			<li id="facebook_widget-2" class="widget-container widget_facebook_widget">
				<h3 class="widget-title">Like Us On Facebook</h3>
				<div id="fb-root"></div>
        		<div class="fb-like-box" data-href="https://www.facebook.com/Indianfunpic/" data-width="300" data-height="550" data-colorscheme="light" data-show-faces="1" data-header="1" data-stream="1" data-show-border="Yes" style=""></div>
			</li>
		</ul>
	</div><!-- /#sidebar -->
	<div class="clear"></div>
</div><!-- /#content-sidebar-wrap -->
	
</div><!--/#wrap.container-->


<script type="text/javascript" src="_wpcf7/jquery.form.min.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.indianfunpic.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ...","cached":"1"};
/* ]]> */
</script>
<script type="text/javascript" src="/qsbk/js/qsbk/scripts.js"></script>
<script type="text/javascript" src="/qsbk/js/qsbk/app.js"></script>
<script type="text/javascript" src="/qsbk/js/qsbk/superfish.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var vars = {"app_id":"240142789464310","select_lng":"en_US"};
/* ]]> */
</script>
<script type="text/javascript" src="./Indian Fun Pic - Indian Funny Pictures, Photos, Hindi Funny Pics Humor Images_files/fb.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39985649-1', 'indianfunpic.com');
  ga('send', 'pageview');

</script>


<!-- Dynamic page generated in 0.579 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2016-06-07 06:00:49 -->

<!-- Compression = gzip -->
<!-- super cache -->
<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
	<div id="cboxWrapper">
		<div>
			<div id="cboxTopLeft" style="float: left;"></div>
			<div id="cboxTopCenter" style="float: left;"></div>
			<div id="cboxTopRight" style="float: left;"></div>
		</div>
		<div style="clear: left;">
			<div id="cboxMiddleLeft" style="float: left;"></div>
			<div id="cboxContent" style="float: left;">
				<div id="cboxTitle" style="float: left;"></div>
				<div id="cboxCurrent" style="float: left;"></div>
				<button type="button" id="cboxPrevious"></button>
				<button type="button" id="cboxNext"></button>
				<button id="cboxSlideshow"></button>
				<div id="cboxLoadingOverlay" style="float: left;"></div>
				<div id="cboxLoadingGraphic" style="float: left;"></div>
			</div>
			<div id="cboxMiddleRight" style="float: left;"></div>
		</div>
		<div style="clear: left;">
			<div id="cboxBottomLeft" style="float: left;"></div>
			<div id="cboxBottomCenter" style="float: left;"></div>
			<div id="cboxBottomRight" style="float: left;"></div>
		</div>
	</div>
	<div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div>
</div>
</body>
</html>