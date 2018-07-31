<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<title>
<?php wp_title(); ?>
</title>
<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Play|Roboto" rel="stylesheet">
<?php wp_enqueue_style( 'sub-style', get_stylesheet_directory_uri().'/common/css/style.css', array( 'app' ),'41' ); ?>
<?php wp_enqueue_style( 'app', get_stylesheet_directory_uri().'/common/css/app.css', false,'20170724' ); ?>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->









</head>
<?php
  if(is_archive())://アーカイブページのとき
    $cat_id=get_query_var('cat');
    $cat=get_category($cat_id);
    $pageId = $cat->slug;
    $pageClass = 'no2 own own-lib';

  elseif(is_single())://記事ページのとき
    $cat = get_the_category();
    $cat = $cat[0];
    $pageId = $cat->category_nicename;
    $pageClass = 'no2 own own-detail';

  elseif(is_search())://結果ページのとき
    $cat = get_the_category();
    $cat = $cat[0];
    $pageId = $cat->category_nicename;
    $pageClass = 'no2 own own-detail search';

  endif;
?>
<body class="<?php echo $pageClass ?>">
    <div id="banner" class="hide-for-small-only">
  <a href="<?php echo home_url( '/' ); ?>">
  <span>
  <img src="<?php echo assets_cdn_url('common/img/column/banner_1.png') ?>" alt=""></span>
  <span><img src="<?php echo assets_cdn_url('common/img/column/banner_2.png') ?>" alt=""></span>
  </a></div>
    <header id="header" class="site-header own-header-0">
<nav class="head-con">
        <ul>
        <li><h1>
        <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo assets_cdn_url('common/img/common/logo.png') ?>" alt=""/></a><sub class="hide-for-small-only">買取マクサス 最短30分で売却可能!<br>まとめて売るなら買取【マクサス】</sub><sub class="show-for-small-only">買取マクサス 最短30分で 売却可能!</sub></h1></li>
        <li class="header-tell-before1 hide-for-small-only">
        <a href="<?php echo home_url( '/' ); ?>before-tell/">
        <img src="<?php assets_cdn_url('common/img/common/btn_tel_before.png') ?>" alt=""></a></li>
        <li class="header-tell hide-for-small-only">
        <strong>0120-900-602</strong>
営業時間 10:00〜22:00 年中無休<span>「ホームページを見た」とお伝えください</span></li>
<li class="btn-header-tell show-for-small-only">
<a href="tel:0120900602" onclick="ga('send','event','click','tel-tap','right-top');"><img src="<?php echo assets_cdn_url('common/img/common/btn_tel_sp.png') ?>" alt=""></a></li>
    <li class="nav-sp show-for-small-only">
      <span></span>
      <span></span>
      <span></span>
    </li>
        <li class="mail-regist hide-for-small-only">
        <a href="<?php echo home_url( '/' ); ?>assessment/"><i class="fa fa-envelope-o" aria-hidden="true"></i>
        <span>メール無料査定</span>
        <span class="mail-copy1">24時間365日対応！</span>
        <span class="mail-copy2">カンタン60秒！<br>買取価格調査OK</span></a></li>
      </ul>
    </nav>
      <nav class="nav hide-for-small-only">
      <ul id="gNav" class="js-gloablNavi">
        <li><a href="<?php echo home_url( '/' ); ?>popular_list/popular/">人気記事</a>
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
          'limit' => 8, //表示数
          'post_html' => '<li>{title}</li>',
     );
     wpp_get_mostpopular($arg);} ?></li>
        <li><a href="<?php echo home_url( '/' ); ?>column/">新着記事</a>
        <ul class="clearfix">
      <?php query_posts('posts_per_page=8'); ?>
      <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!--item-->
         <?php if ( in_category( 99 )) : ?>
         <?php else : ?>
        <li>
          <a href="<?php the_permalink() ?>"><?php trim_str_by_chars( get_the_title(), 25 ); ?></strong></a></li>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
          </ul>
        </li>
        </li>
        <li class="own-h-3">
<!--           <form role="search" method="get" id="searchform" class="searchform" action="http://anipachi.jp/?post_type=model_top "> -->
        <form role="search" method="get" id="searchform" class="searchform hide-for-small-only" action="<?php echo home_url('/'); ?>">
          <input type="text" value="" name="s" id="s">
                    <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo assets_cdn_url('common/img/column/icon-seach.png') ?>" placeholder="記事を検索">
        </form></li></ul></nav></header>
