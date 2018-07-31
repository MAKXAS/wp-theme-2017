
<?php get_header();?>

<?php
	$post_type_name = get_post_type_object(get_post_type())->name; //投稿タイプ名取得
	$post_type_label = get_post_type_object(get_post_type())->label; //投稿タイプラベル取得
	$obj = get_queried_object(); //メインクエリオブジェクト取得
	$tag_name = $obj->name; //タグの名前取得
	$tag_slug = $obj->slug; //タグのslug取得
	$tag_description = $obj->description; //現在のタグの説明取得
	$goods_category_dtl = get_field('goods_category_dtl','buy_category_'.$obj->term_id); //
  ?>

testtesttst-taxonomy-buy-tag
<!--breadcrumb-->
<div class="breadcrumbs">
	<div class="container">
		<?php if(function_exists('bcn_display')) { bcn_display(); }?>
	</div>
</div>
<!--contents_wrap-->
<div id="contents_wrap" class="container">
	<main role="main" id="main_contents">
	
		<!--page_title-->
			<h2 class="page_title_02"><?php echo $tag_name;?></h2>			
		
		<?php if(!empty($tag_description)):?>
		<section>
			<div><?php echo $tag_description;?></div>
		</section>
		<?php endif;?>
	
		<!--sec_buy_categories-->
		<section id="sec_buy_categories">
			
				<div class="buy_item_list_01">
				<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="item">
					<a href="<?php the_permalink() ?>">
						<dl>
							<?php if ( has_post_thumbnail() ): ?>
							<?php
								$thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
								$img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );//画像内容を取得
								$thumb_path = $img[0]
							?>
							<dt class="image">
								<figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat"></figure>
							</dt>
							<?php else:?>
							<dt class="image">
								<figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat"></figure>
							</dt>
							<?php endif;?>
							<dd class="text">
								<h3 class="name"><?php trim_str_by_chars( get_the_title(), 35 ); ?> </h3>
								<p class="description"><?php echo mb_substr(strip_tags($post-> post_content),0,100); ?></p>
								<p class="anchor">詳細を見る</p>
							</dd>
						</dl>
					</a>
				</article>
				<?php endwhile; else: ?>
					<article>現在、買取品目はありません。</article>
				<?php endif;?>
				</div>
				<?php echo my_pagination(); ?>
			
			
		</section>
		<!-- / #sec_buy_categories -->
		
			
		<!--sec_flow-->
		<?php include('include/sec_flow.php');?>
		
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
		
		
		<!--sec_popular_categories-->
		<section id="sec_popular_categories">
			<h2 class="title_01">その他人気の買取品目もチェック</h2>
			<!--buy_categories_list_01-->
			<div class="buy_categories_list_01">
				<?php include('include/buy_category_list.php');?>
			</div>
			<!-- / .buy_categories_list_01 -->
		</section>
		
		<!--sec_cannot-->
		<?php include('include/sec_cannot.php');?>
		
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
		
		<!--sec_note-->
		<?php include('include/sec_note.php');?>
		<!--movie_btn-->
		<?php include('include/movie_btn.php');?>	
	</main>
	<!-- / #main_contents -->
		
	
	<?php get_sidebar();?>
</div>
<!-- / #contents_wrap .container -->

<?php get_footer();?>

