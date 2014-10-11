<?php
/**
 * The Template for displaying all single posts.
 *
 * @package flatsome
 */

get_header(); 

global $flatsome_opt;
if(!isset($flatsome_opt['blog_layout'])){$flatsome_opt['blog_layout'] = '';}
?>

<?php // ADD BLOG HEADER IF SET
if(isset($flatsome_opt['blog_header'])){ echo do_shortcode($flatsome_opt['blog_header']);}
?>

<div class="page-wrapper page-<?php if($flatsome_opt['blog_layout']){ echo $flatsome_opt['blog_layout'];} else {echo 'right-sidebar';} ?>">
	<div class="row">


		<?php if($flatsome_opt['blog_layout'] == 'left-sidebar') {
		 	echo '<div id="content" class="large-9 right columns" role="main">';
		 } else if($flatsome_opt['blog_layout'] == 'right-sidebar'){
		 	echo '<div id="content" class="large-9 left columns" role="main">';
		 } else if($flatsome_opt['blog_layout'] == 'no-sidebar'){
		 	echo '<div id="content" class="large-10 columns large-offset-1" role="main">';
		 } else {
		 	echo '<div id="content" class="large-9 left columns" role="main">';
		 }
		?>
		
		<div class="page-inner">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
<style>
.div-logo{
width:33%;
float:left;
}
.div-fb{
width:130px;
float:left;
}
.div-fb2{
width:150px;
float:left;
margin-left:50px;
}
.div-Google{
width:200px;
float:left;
}
.div-fb3{
width:180px;
float:left;
}
</style>

<table width="80%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"><div class="div-logo"> <a href="javascript: void(window.open('https://plus.google.com/share?url='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'));">
<img title="分享到Google+！" src="http://itees.com.tw/wp-content/uploads/2014/03/g+2.png" border="0" width="212" height="37" /></a>
</div>
  <div class="div-logo"><a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'));">
  <img title="分享到臉書！" src="http://itees.com.tw/wp-content/uploads/2014/03/fb2.png" border="0" width="210" height="37" /></a>
  </div>
  <div class="div-logo"><a href="javascript: void(window.open('http://www.plurk.com/?qualifier=shares&status=' .concat(encodeURIComponent(location.href)) .concat(' ') .concat('&#40;') .concat(encodeURIComponent(document.title)) .concat('&#41;')));">
<img title="分享到噗浪！" src="http://itees.com.tw/wp-content/uploads/2014/03/pk2.png" border="0" width="198" height="37" /></a>
</div></th>
  </tr>
  <tr>
  
    <td><div class="div-fb">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=1418913235009358";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://www.itees.com.tw" data-width="130" data-layout="button_count" data-action="recommend" data-show-faces="false" data-share="false"></div></div>

<!-- Place this tag where you want the +1 button to render. -->
<div class="div-Google"><div class="g-plusone" data-size="tall" data-annotation="inline" data-width="200"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'zh-TW'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div></div>
<div class="div-fb"></div>
<div class="div-fb2">玩機殼‧秀創意 ▶</div>
<div class="div-fb3"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://www.facebook.com/itees.case" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></td>
  </tr>
</table>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>
		</div><!-- .page-inner -->
	</div><!-- #content -->

	<div class="large-3 columns left">
		<?php if($flatsome_opt['blog_layout'] == 'left-sidebar' || $flatsome_opt['blog_layout'] == 'right-sidebar'){
			get_sidebar();
		}?>
	</div><!-- end sidebar -->


</div><!-- end row -->	
</div><!-- end page-wrapper -->


<?php get_footer(); ?>