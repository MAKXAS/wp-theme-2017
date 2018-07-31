<?php get_header(); the_post();?>
<!--contents_wrap-->
	<main class="main" role="main">
  <!-- STATUS -->
    <nav class="bread-crumb-wr hide-for-small-only bread-crumb-home">
    <div class="bread-crumb">
        <div class="searchform-pc hide-for-small-only">
       <form role="search" method="get" id="searchform" class="searchform hide-for-small-only" action="/">
          <input type="text" value="" name="s" id="s">
           <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo assets_cdn_url('common/img/column/icon-seach.png') ?>" placeholder="記事を検索">
        </form>
    </div>
    </div>
    </nav>
    <header class="top-header">
    <div>
    <h1>
    <!-- title1-->
    <img src="<?php echo assets_cdn_url('common/img/top/title_header_0.png') ?>" alt="" class="hide-for-small-only" />
    <img src="<?php echo assets_cdn_url('common/img/top/title_header_0_sp.png') ?>" alt="" class="show-for-small-only" />
    <!-- title2-->
    <img src="<?php echo assets_cdn_url('common/img/top/title_header_1.png') ?>" alt="" class="hide-for-small-only title2" />
    <img src="<?php echo assets_cdn_url('common/img/top/title_header_1_sp.png') ?>" alt="" class="show-for-small-only title2" />
    </h1>
    <div class="top-ctr">
        <a href="<?php echo home_url( '/' ); ?>assessment/" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>お申込み</a>
        <a href="tel:0120900602" class="top-ctr2" onclick="ga('send','event','click','tel-tap','home');"><i class="fa fa-mobile" aria-hidden="true"></i>電話する</a>
        <a href="https://line.me/R/ti/p/%40dgc5506k" class="top-ctr3" onclick="ga('send','event','click','line-tap','top');">LINE<br>友達追加</a>
    </div>
    <section class="section value row">
      <div class="small-12 medium-4 lauge-4 columns">
          wp_get_attachment_image_src
      <img src="<?php echo assets_cdn_url('common/img/top/img_value_1.png') ?>" alt="" class="hide-for-small-only" />
      <img src="<?php echo assets_cdn_url('common/img/top/img_value_1_sp.png') ?>" alt="" class="show-for-small-only" />
      </div>
      <div class="small-12 medium-4 lauge-4 columns">
      <img src="<?php echo assets_cdn_url('common/img/top/img_value_2.png') ?>" alt="" class="hide-for-small-only" />
      <img src="<?php echo assets_cdn_url('common/img/top/img_value_2_sp.png') ?>" alt="" class="show-for-small-only" />
      </div>
      <div class="small-12 medium-4 lauge-4 columns">
        <img src="<?php echo assets_cdn_url('common/img/top/img_value_3.png') ?>" alt="" class="hide-for-small-only" />
        <img src="<?php echo assets_cdn_url('common/img/top/img_value_3_sp.png') ?>" alt="" class="show-for-small-only" />
      </div>
    </section>
    </div>
      <div class="top-sel">
      <a href="<?php echo home_url( '/' ); ?>only/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>SEL-LIVEについて、もっと知る</a></div>
      <p class="show-for-small-only top-br"></p>
      </header>
          <section class="section top-recommend">
	  <img src="<?php echo assets_cdn_url('common/img/top/title_recommend.png') ?>" class="hide-for-small-only" />
	  <img src="<?php echo assets_cdn_url('common/img/top/title_recommend_sp.png') ?>" class="show-for-small-only" />
    <ul>
      <li><i class="fa fa-check-square-o" aria-hidden="true"></i>お急ぎで処分をお考えの方</li>
      <li><i class="fa fa-check-square-o" aria-hidden="true"></i>まずはプロの査定士にいろいろ見てもらいたい！</li>
      <li><i class="fa fa-check-square-o" aria-hidden="true"></i>引っ越しだから、売りたいものと処分したいもの、両方ある！</li>
    </ul>
     </section>
    <section class="section top-flow">
		<h1>
		  <img src="<?php echo assets_cdn_url('common/img/top/title_flow.png') ?>" class="hide-for-small-only" />
		  <img src="<?php echo assets_cdn_url('common/img/top/title_flow_sp.png') ?>" class="show-for-small-only" />
		</h1>
		<p>
	    <img src="<?php echo assets_cdn_url('common/img/top/img_flow_2.png') ?>" alt="" class="hide-for-small-only" />
<img src="<?php echo assets_cdn_url('common/img/top/img_flow_2_sp.png') ?>" alt="" class="show-for-small-only" />
      </p>
      <?php include('include/sec_cta_2.php');?>
     </section>
		<!--sec_buy_categories-->
      <section class="top-category section">
      <header class="contents-header">
      <h1>CATEGORY<span class="a-more-link"><a href="<?php echo home_url( '/' ); ?>buy/">+</a></span></h1>
      <sub>カテゴリーから商品を探す</sub>
      </header>
			<!--buy_categories_list_01-->
			<div class="category-section row columns">
				<?php include('include/buy_category_list_0.php');?>
			</div>
      <?php include('include/sec_cta_2.php');?>
			</section>
			<!-- / .buy_categories_list_01 -->
      <div style="text-align: center;margin:1rem auto 2rem;width: auto; ">
      <a href="<?php echo home_url( '/' ); ?>column/how-much-drone/">
      <img src="<?php echo assets_cdn_url('common/img/lp/banner.png') ?>" alt="ドローン強化買取中" style="width:75%;max-width: 500px;height: auto;"></a>
      </div>
		</section>
  <!-- STATUS -->
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1><strong>M</strong>agazine<span class="a-more-link"><a href="<?php echo home_url( '/' ); ?>/column/">+</a></span></h1>
      <sub>マクサスマガジン 人気記事</sub>
      </header>
<!-- ranking -->
<div class="news-section clearfix">
        <!--item-->
        <?php
if (function_exists('wpp_get_mostpopular')) {

     $arg = array (
          'range' => 'weekly',//集計する期間
          'order_by' => 'views',//閲覧数で集計
          'post_type' => 'post',//ポストタイプを指定
          'stats_views' => '0',
          'excerpt_length' => '180',
          'range' => 'all',
          'stats_date' => 1,
          'stats_date_format' => 'Y/n/j',
          'thumbnail_width' => '140',
          'thumbnail_height' => '96',
          'title_length' => '25',//表示させるタイトル文字数
          'limit' => 10, //表示数
          'stats_category' => 1,
          'post_html' => '<dl><a href="{url}"></a><dt>
          <figure>{thumb_img}</figure></dt><dd><strong class="news-title">{text_title}</strong><span class="news-txt hide-for-small-only">{summary}</span>
      <div class="news-date">{date}</div></dd></dl>',
     );
     wpp_get_mostpopular($arg);
} ?>
      </div>
      <?php wp_reset_postdata(); ?>

	<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
	<!-- / #main_contents -->
<!-- / #contents_wrap .container -->

<?php get_footer();?>
