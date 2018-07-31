<?php get_header('column');?>

<?php
// カテゴリーページ
$cat_id = get_query_var('cat');
$cat = get_category($cat_id);
$cat_slug = $cat->slug;
$cat_name = $cat->name;
?>

<main class="main" role="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
    </div>
    </nav>
    <header class="own-header">
    <div>
    </div>
    </header>
		<!--page_title-->
  <div class="row column own-main">
  <div class="large-8 medium-12 small-12 columns">  
  <section class="top-news section">
      <div class="news-section clearfix">
			<?php if(have_posts()) : while (have_posts()) : the_post();
			 ?>
			 <?php $obj = get_queried_object(); //メインクエリオブジェクト取得
  $current_term_description = $obj->description; //現在のタームの説明取得
  $current_term_image_id = get_field('term_image','buy_category_'.$obj->term_id);
  $current_term_image = wp_get_attachment_image_src($current_term_image_id, 'full');
  $current_term_image_url = $current_term_image[0];//現在のタームの画像url取得
  $current_term_image_id2 = get_field('term_image2');
  $current_term_image2 = wp_get_attachment_image_src($current_term_image_id2, 'full');
  $current_term_image_url2 = $current_term_image2[0];//現在のタームの画像url取得 ?>
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
								<figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat;    background-size: cover;"></figure>
							</dt>
						<?php elseif($current_term_image_id2) :?>
							
							<?php $thumbnail = wp_get_attachment_image_src($current_term_image_id2, 'full');?>
							<dt>
								<figure style="background: url(<?php echo $thumbnail[0] ?>) center center no-repeat;background-size: cover;"></figure>
							</dt>							
							<?php else:?>
							<dt>
								<figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat;background-size: cover;"></figure>
							</dt>
							<?php endif;?>								
								<dd><strong class="news-title">
									<?php trim_str_by_chars( get_the_title(), 35 ); ?></strong>
									<span class="news-txt hide-for-small-only"><?php echo get_the_custom_excerpt( get_the_content(), 100 ) ?></span>

<div>
<!-- カテゴリ一覧表示 -->
<?php
$cat = get_the_category(); // 情報取得
$catId = $cat[0]->cat_ID; // ID取得
$catName = $cat[0]->name; // 名称取得
$catSlug = $cat[0]->category_nicename; // スラッグ取得
?>
<?php
  for ($i = 0; $i < count($cat); ++$i) {
    $catID = $cat[$i]->cat_ID;
    $catID2 = floor( $catID / 10 );
	$link = get_category_link($catID); // リンクURL取得
  echo '<span class="cg-'.$catID2.'"><a href="'.$link.'"><span>'.$cat[$i]->cat_name.'</span></a></span>';
}?>
<!-- カテゴリ一覧表示 -->
</div>
          </dd>
          </dl>

<?php endwhile; else:?>
  <p style="padding: 1rem 2rem 0rem;margin-bottom: 1rem;">検索結果はありません。</p>
  <?php endif; ?>
</div>
<!--pagination--><?php echo my_pagination(); ?>
<!-- カテゴリタグ表示 -->
<div class="category-tag">
<h3>カテゴリからもお探しいただけます</h3>
<div>
<!-- カテゴリ一覧表示 -->
<?php if(have_posts()) : while (have_posts()) : the_post();?>
<?php
$cat = get_the_category(); // 情報取得
$catId = $cat[0]->cat_ID; // ID取得
$catName = $cat[0]->name; // 名称取得
$catSlug = $cat[0]->category_nicename; // スラッグ取得
?>
<?php
  for ($i = 0; $i < count($cat); ++$i) {
    $catID = $cat[$i]->cat_ID;
    $catID2 = floor( $catID / 10 );
	$link = get_category_link($catID); // リンクURL取得
  echo '<span class="cg-'.$catID2.'"><a href="'.$link.'"><span>'.$cat[$i]->cat_name.'</span></a></span>';
}?>
<?php endwhile; else:?>
  <p style="padding: 1rem 2rem 0rem;margin-bottom: 1rem;">検索結果はありません。</p>
  <?php endif; ?><?php wp_reset_postdata(); ?>
  </div>
  <!-- カテゴリ一覧表示 -->
</div>
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
 </div></div>
 </div>
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
<!-- / #contents_wrap .container -->
<?php get_footer('column');?>

