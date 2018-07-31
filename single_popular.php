<?php get_header('column');?>

<?php
// カテゴリーページ
$cat_id = get_query_var('cat');
$cat = get_category($cat_id);
$cat_slug = $cat->slug;
$cat_name = $cat->name;
?>
<main class="main popular" role="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
    </div>
    </nav>
    <header class="own-header">
    <div>
        <h1 style="height: 60px;">
    <span class="news-title">人気記事</span></h1>
    </div>
    </header>
		<!--page_title-->
  <div class="row column own-main">
  <div class="large-8 medium-12 small-12 columns"> 
  <section class="top-news section"> <!-- 
      <div class="news-section clearfix"> -->
<?php 
if (function_exists('wpp_get_mostpopular')) {

     $arg = array (
          'range' => 'weekly',//集計する期間
          'order_by' => 'views',//閲覧数で集計
          'post_type' => 'post',//ポストタイプを指定
          'stats_views' => '0',
          'range' => 'all',
          'stats_date' => 1,
          'stats_date_format' => 'Y/n/j',
          'thumbnail_width' => '140',
          'thumbnail_height' => '96',
          'title_length' => '25',//表示させるタイトル文字数
          'limit' => 10, //表示数
          'post_html' => '<dl class="clearfix"><a href="{url}"></a><dt>
          <figure>{thumb_img}</figure></dt><dd><strong class="news-title">{text_title}</strong>
      <div class="news-date">{date}</div></dd></dl>',
     );
     wpp_get_mostpopular($arg);
} ?>
  </section></div>
  <div class="large-4 medium-12 small-12 columns pick-column">
  <section class="recomend-column news-section clearfix">
    <h1><span>RECOMEND</span>おすすめ記事</h1>
    <?php include('include/recomend.php');?>
  </section>
</div>
      </div>
			</div>		
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
<!-- / #contents_wrap .container -->
<?php get_footer('column');?>

