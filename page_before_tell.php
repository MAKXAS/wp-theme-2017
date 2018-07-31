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
                              <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo get_stylesheet_directory_uri() ?>/common/img/column/icon-seach.png" placeholder="記事を検索">
        </form>
    </div>
    </div>
    </nav>
		<!--content-->
		<?php the_content(); ?>
<section id="good-bad-goods" class="good-bad-goods">
<h1 class="h1-bad"><i class="fa fa-times-circle" aria-hidden="true"></i>買取が難しいもの</h1>
<img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/bad-goods.png" alt="" />

上記は、1点の場合お問い合わせいただいてもお引き取りが難しいことがほとんどですが、<br>下記のような高額買取出来るモノがあれば買取が可能な場合が多いです。<br>そのため、あわせて買取されることをおすすめします。
<h1 class="h1-good"><i class="fa fa-circle-o" aria-hidden="true"></i>買取を強化しているもの</h1>
<img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/good-goods.png" alt="" />
<div class="box-wr-good">
<ul>
  <li>年式が新しいモノ</li>
  <li>定価が高かったモノ</li>
  <li>状態が良いモノ</li>
  <li>元箱、付属品が全部揃っているモノ</li>
  <li>定価50000円以上の商品</li>
  <li>季節的にあっているモノ</li>
</ul>
</div>
買取りやすいモノの基準は、定価が一万以上で大きすぎたり、古すぎたりしないモノが目安になります。<br>また、一回の買取でまとめて商品をお売り頂いたほうが高価買取になりやすいです。
</section>
<!-- 買取強化ピックアップ -->
<?php if( have_rows('related_column') ): ?>
<?php $kanren = get_field('related_column'); ?>
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1 class="h1-notice"><sub><strong>買取強化ピックアップ記事</strong><strong>・こちらもご確認ください</strong></sub></h1>
      </header>
      <div class="news-section clearfix">

<?php foreach((array)$kanren as $value):?>
<dl>
<a href="<?php echo get_the_permalink($value->ID); ?>" class="link-news"></a>
          <dt><?php if ( has_post_thumbnail( $value->ID ) ): ?>
          <?php $thumbnail_id = get_post_thumbnail_id( $value->ID );// アイキャッチ画像のIDを取得
                $img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );//画像内容を取得
                $thumb_path = $img[0]
              ?>
              <figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat;   background-size: cover;"></figure>
          <?php else:?>
            <figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat;background-size: cover;"></figure>
          <?php endif;?></dt>
          <dd><strong class="news-title"><?php trim_str_by_chars( get_the_title( $value->ID ), 35 ); ?></strong>
<span class="news-txt hide-for-small-only"><?php echo get_the_custom_excerpt( $value->post_content, 130 ) ?></span>
<div class="news-date"><?php echo get_post_time('Y/n/j','', $value->ID); ?></div>
<?php
$cat = get_the_category($value->ID); // 情報取得
$catId = $cat[0]->cat_ID; // ID取得
$catName = $cat[0]->name; // 名称取得
$catSlug = $cat[0]->category_nicename; // スラッグ取得
?>
<div>
<?php
  for ($i = 0; $i < count($cat); ++$i) {
    $catID = $cat[$i]->cat_ID;
    $catID2 = floor( $catID / 10 );
  $link = get_category_link($catID); // リンクURL取得
  // echo $catSlug;echo $link;echo $catName;
  echo '<span class="cg-';
  echo $catID2;
  echo '"><a href="';
  echo $link;
  echo '"><span>';
  echo $cat[$i]->cat_name;
  echo '</span></a></span>';
}?></div>
</dd></dl>
<?php endforeach; ?>
      </div>
  </section>
<?php else: ?>
<?php endif; ?>
<section class="about-sel-live"><header class="contents-header">
<h1><strong>ご安心</strong>ください！<strong>買取金額が事前</strong>に分かる<strong>買取査定Sel-live</strong></h1>
<img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/about-sel-live.png" alt="" />

</header></section><section class="good-bad-goods">
<h1 class="title-contents">STAFF紹介</h1>
<sub class="sub-ttl-contents">私たちがお伺いします。</sub>
<img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/staff.png" alt="" />

</section>
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
	<!-- / #main_contents -->
<?php get_footer();?>
