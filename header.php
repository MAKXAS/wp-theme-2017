<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KHQQQL3');</script>
<!-- End Google Tag Manager -->
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
	if (is_front_page() && $post->post_parent)://トップページの場合
		$pageId = 'top';

	elseif(is_page())://固定ページのとき
		$page = get_post( get_the_ID() );// 現在表示している固定ページ情報を取得
		$slug = $page->post_name;// slug取得
		$pageId = $slug;
		if(!isset($tax_name)){
            $tax_name = '';
        }
		$pageClass = $tax_name.$slug.' '.'no2';

	elseif(is_post_type_archive())://カスタム投稿アーカイブページのとき
		$obj = get_queried_object();
		$post_type_name = $obj->name;
		$pageId = $post_type_name;
		$pageClass = 'no2 archive';

	elseif(is_tax())://カスタム投稿分類ページのとき
		$obj = get_queried_object();
		$taxonomy = $obj->taxonomy;
		$post_type_name = get_taxonomy($taxonomy)->object_type[0];//投稿タイプ名取得
		$pageId = $post_type_name;
		$pageClass = $taxonomy.' '.$term.' blue goods-page no2';

	elseif(is_archive())://アーカイブページのとき
		$cat_id=get_query_var('cat');
		$cat=get_category($cat_id);
		$pageId = $cat->slug;
		$pageClass = 'no2';

    elseif(is_single())://記事ページのとき
      $cat = get_the_category();
      $cat = $cat[0];
      $pageId = $cat->category_nicename;
      if (get_post_type() === 'area_type'):
        $pageClass = 'area no2';
      else:
        $pageClass = 'green no2';
      endif;
    else:
      $pageId = '';
      $pageClass = '';
    endif;
?>
<body id="<?php echo $pageId;?>" class="<?php echo $pageClass ?><?php if(!is_front_page()) echo ' sub_page';?>">
<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHQQQL3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->
    <header id="header" class="site-header">
    <p class="show-for-small-only before-tell-header">
    <a href="<?php echo home_url( '/' ); ?>before-tell/">
    <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
    お問い合わせの前にご確認ください</a></p>
    	<nav class="head-con">
    		<ul>
				<li><h1>
        <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo assets_cdn_url('common/img/common/logo.png') ?>" alt=""/></a><sub class="hide-for-small-only">買取マクサス 最短30分で売却可能!<br>まとめて売るなら買取【マクサス】</sub><sub class="show-for-small-only">買取マクサス 最短30分で 売却可能!</sub></h1></li>
        <li class="header-tell-before1 hide-for-small-only">
        <a href="<?php echo home_url( '/' ); ?>before-tell/">
        <img src="<?php echo assets_cdn_url('common/img/common/btn_tel_before.png') ?>" alt=""></a></li>
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
        <li><a href="<?php echo home_url( '/' ); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="<?php echo home_url( '/' ); ?>buy/">買取金額を調べる</a>
          <ul class="clearfix">
            <li><a href="<?php echo home_url( '/' ); ?>buy/">買取ジャンル一覧</a></li></ul>
        </li>
        <li><a href="<?php echo home_url( '/' ); ?>area_type/">買取りエリア</a>
        <ul><?php query_posts( array(
'post_type' => 'area_type',
)); ?>
            <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
              <!--item-->
              <li><a href="<?php the_permalink() ?>"><?php trim_str_by_chars( get_the_title(), 25 ); ?></strong></a></li>
              <?php endwhile; ?>
              <?php else : ?>
              <?php endif; ?>
              <?php wp_reset_query(); ?></ul></li>
        <li><a href="<?php echo home_url( '/' ); ?>only/">マクサスについて</a>
        <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>only/">選ばれる理由</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>company/">会社概要</a>
              </li>
        </ul>
        </li>
        <li><a href="<?php echo home_url( '/' ); ?>faq/">よくある質問</a>
                <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>faq/">よくある質問TOP</a>
              </li>
        </ul></li>
        <li><a href="<?php echo home_url( '/' ); ?>column/">お役立ち情報</a>
              <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>column/">お役立ち情報TOP</a>
              </li>
        <li><a href="<?php echo home_url( '/' ); ?>column/">新着記事</a></li>
<li><a href="<?php echo home_url( '/' ); ?>popular_list/popular/">人気記事</a></li>
</nav></header>
