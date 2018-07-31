<?php get_header('column');?>

<?php
// カテゴリーページ
$cat_id = get_query_var('cat');
$cat = get_category($cat_id);
$cat_slug = $cat->slug;
$cat_name = $cat->name;
?>
<main class="main" role="main">
archive_popular.php
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
    </div>
    </nav>
    <header class="own-header">
    <div>
  <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
  <?php if (is_first()) { ?>
                <?php if ( has_post_thumbnail() ): ?>
              <?php
                $thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
                $img = wp_get_attachment_image_src( $thumbnail_id , 'full' );//画像内容を取得
                $thumb_path = $img[0]
              ?>
      <h1 style="background: url(<?php echo $thumb_path; ?>) center center no-repeat;background-size: cover;">
      <?php else:?>
        <h1 style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat;">
      <?php endif;?>
    <div class="news-date"><?php the_time('Y/m/d'); ?></div>
    <span class="news-title"><?php trim_str_by_chars( get_the_title(), 35 ); ?></span>
    <div class="category news-section"><?php include('include/category.php');?>
    <span class="more"><a href="<?php the_permalink() ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>MORE</a></span></div></h1>
  <?php } else { ?>
  <?php } ?>
  <?php endwhile; else : ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
    </div>
    </header>
		<!--page_title-->
  <div class="row column own-main">
  <div class="large-8 medium-12 small-12 columns">  
  <section class="top-news section">
      <div class="news-section clearfix">
			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <?php if (is_first()) { ?><?php } else { ?>
				<!--item-->
				<dl>
					<a href="<?php the_permalink() ?>" class="link-news"></a>
							<?php if ( has_post_thumbnail() ): ?>
							<?php
								$thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
								$img = wp_get_attachment_image_src( $thumbnail_id , 'full' );//画像内容を取得
								$thumb_path = $img[0]
							?>
							<dt>
								<figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat;background-size: cover;"></figure>
							</dt>
							<?php else:?>
							<dt>
								<figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat;background-size: cover;"></figure>
							</dt>
							<?php endif;?>								
								<dd><strong class="news-title">
									<?php trim_str_by_chars( get_the_title(), 35 ); ?></strong>
									<span class="news-txt hide-for-small-only"><?php echo get_the_custom_excerpt( get_the_content(), 100 ) ?></span>
          <div class="news-cg"><?php include('include/category.php');?></div>
          <div class="news-date"><?php the_time('Y/m/d'); ?></div>
          </dd>
          </dl>
  <?php } ?>
  <?php endwhile; else : ?>
  <?php endif; ?>
			</div>
			<!-- / .buy_item_list_01 -->		
		<!--pagination-->
    <?php echo my_pagination(); ?>
      </div>
		<?php wp_reset_postdata(); ?>
			</section>
  <div class="large-4 medium-12 small-12 columns pick-column">
  <section class="recomend-column news-section clearfix">
    <h1><span>RECOMEND</span>おすすめ記事</h1>
    <?php include('include/recomend.php');?>
  </section>
  <section class="ranking-column news-section clearfix">
    <h1><span>RANKING</span>人気記事</h1>
    <?php include('include/ranking.php');?>
    </section>
</div>
      </div>
			</div>		
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
<!-- / #contents_wrap .container -->
<?php get_footer('column');?>

