<?php
  if (is_front_page() && $post->post_parent)://トップページの場合
    get_header('column');
    else: ?>
<?php get_header('column');?>
<main class="main" role="main">
		<!--page_title-->
    <header class="own-header">
    <div>
			<!--eye_catch-->
      <?php if ( has_post_thumbnail() ): ?>
      <?php
                $thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
                $img = wp_get_attachment_image_src( $thumbnail_id , 'full' );//画像内容を取得
                $thumb_path = $img[0]
              ?>
    <h1 style="background: url(<?php echo $thumb_path; ?>) center center no-repeat;background-size:cover;">
<?php else:?>
      <?php
                $thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
                $img = wp_get_attachment_image_src( $thumbnail_id , 'full' );//画像内容を取得
                $thumb_path = $img[0]
              ?>
    <h1 style="background: url(<?php echo get_stylesheet_directory_uri() ?>/common/img/column/header_column.png) center center no-repeat;background-size:cover;">
    <?php endif;?>
    <div class="news-date"><?php the_time('Y.m.d'); ?>最終更新日：<?php the_modified_date('Y/m/d') ?></div>
    <span class="news-title"><?php the_title(); ?></span>
    </h1>
     <div class="category news-section">
      <?php include('include/category.php');?>
    </div> 
    </div></header>
    <!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
    </div>
    </nav>
	<!-- contents -->
		  <div class="row column own-main">
  <div class="large-8 medium-12 small-12 columns">  
  <section class="contetns">
			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>			
			<!--content-->
			<section class="contetns-column">
				<?php the_content(); ?>        
                            <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
			</section>
			<?php endwhile; ?>
			<?php endif;?>
			</section>
			<!--pager-->
      <?php related_posts(); ?>
			<div class="more-btn number deatai-more more-long-btn">
					<?php next_post_link('%link','<i class="fa fa-long-arrow-left" aria-hidden="true"></i>前の記事', TRUE) ?>
					<a href="<?php bloginfo('url'); ?>/column/">
						<i class="fa fa-long-arrow-up" aria-hidden="true"></i>一覧へ</a>				
					<?php previous_post_link('%link','次の記事<i class="fa fa-long-arrow-right" aria-hidden="true"></i>', TRUE) ?>
			</div>
      <?php wp_reset_postdata(); ?>
  </div>
  <div class="large-4 medium-12 small-12 columns pick-column">
  <section class="recomend-column news-section clearfix">
    <h1><span>RECOMEND</span>おすすめ記事</h1>
    <?php include('include/recomend.php');?>
  </section>
  </div>
  </div>
  </section>
	</main>
	<!-- / #main_contents -->
<?php get_footer();?>
<?php endif; ?>