<?php
if (is_page('before-tell')):
include(TEMPLATEPATH.'/page_before_tell.php');
elseif (is_page('drone')):
include(TEMPLATEPATH.'/page_drone.php');
else : ?>
<?php get_header(); the_post();?>
<!-- page -->
<!--contents_wrap-->
	<main role="main" class="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
        <div class="searchform-pc hide-for-small-only">
       <form role="search" method="get" id="searchform" class="searchform hide-for-small-only" action="/">
          <input type="text" value="" name="s" id="s">
                              <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo assets_cdn_url('common/img/column/icon-seach.png') ?>" placeholder="記事を検索">
        </form>
    </div>
    </div>
    </nav>
		<!--content-->
		<?php the_content(); ?>
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
	<!-- / #main_contents -->
<?php get_footer();?>
<?php endif ;?>
