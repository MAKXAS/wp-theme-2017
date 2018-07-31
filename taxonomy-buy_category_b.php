
<?php get_header();?>

<?php
	$post_type_name = get_post_type_object(get_post_type())->name; //投稿タイプ名取得
	$post_type_label = get_post_type_object(get_post_type())->label; //投稿タイプラベル取得
	$obj = get_queried_object(); //メインクエリオブジェクト取得
	$current_term_description = $obj->description; //現在のタームの説明取得
	$current_term_image_id = get_field('term_image','buy_category_'.$obj->term_id);
	$current_term_image = wp_get_attachment_image_src($current_term_image_id, 'full');
	$current_term_image_url = $current_term_image[0];//現在のタームの画像url取得
  $current_term_image_id2 = get_field('term_image2','buy_category_'.$obj->term_id);
  $current_term_image2 = wp_get_attachment_image_src($current_term_image_id2, 'full');
  $current_term_image_url2 = $current_term_image2[0];//現在のタームの画像url取得
	$knack = get_field('knack','buy_category_'.$obj->term_id); //カスタムフィールド「高く売るコツ」取得
  $goods_category_dtl = get_field('goods_category_dtl','buy_category_'.$obj->term_id); 
  $customer_voice = get_field('customer_voice','buy_category_'.$obj->term_id); // 買取実績
?>
<main role="main" class="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
    </div>
    </nav>
<!-- header -->
    <header class="slide">
    <div>
    <div>
    <h1><span class="h1-1">オンライン買取サービス<strong>「SEL-LIVE」</strong>は</span><br>
    <span class="h1-2"><strong>電話一本</strong>で
    <strong><?php single_term_title();?></strong>の</span>
    <span class="h1-2-2"><strong>確定買取<br>金額</strong>が<em>分かる。</em></span>
    <p class="goods-tile">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/txt_header3_bl.png" alt="">
    </p></h1>
    <div class="top-ctr">
        <a href="14.html" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>お申込み</a>
        <a href="tel:0120900602" class="top-ctr2">
        <i class="fa fa-mobile" aria-hidden="true"></i>電話する</a>
    </div>
    </div>
    <div>
    <h1 class="img-h1"><?php if($current_term_image_id2) :
    $thumbnail = wp_get_attachment_image_src($current_term_image_id2, 'full');
    echo '<img src="'.$thumbnail[0].'" alt="'.get_the_title().'" width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" />';endif;?></h1>
    </div>
    </div>
    </header>
    <section class="goods-txt section">
    <p>
    <?php if(!empty($current_term_description)):?><?php echo nl2br($current_term_description);?>
    <?php endif;?></p>
    </section>
    <section class="goods-only section">
      <p class="goods-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/only_for_goods_bl.png" alt="" class="hide-for-small-only"></p>
      <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
    <section class="goods section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の<strong>買取実績</strong></h1>
      </header>
      <div class="goods-section row columns">
      <?php
      while(have_rows('goods-section0')):the_row(); ?>
      <?php include('include/sec_results.php');?> 
      <?php endwhile; ?>
      </div>
      <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
    <!-- category -->
    <section class="top-category section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の買取価格を<strong>比較</strong>しよう・さらに<strong>絞り込む</strong></h1>
      </header>
      <div class="category-section row columns">
      </div>
      <div class="convertion-btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
  <section class="goods-txt section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の<strong>買取方法</strong></h1>
      </header>
      <p><?php if(!empty($knack)):?>
    <!--sec_knack-->
<?php echo $knack;?>
    <?php endif;?>
      </p>
    </section>
  <!-- voice -->
  <section class="voice section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の<strong>お客様の声</strong></h1>
      </header>
<?php if( have_rows('customer_voice_con') ):
      while(have_rows('customer_voice_con')):the_row(); ?>
        <?php 
        $customer_voice_name = get_sub_field('customer_voice_name','buy_category_'.$obj->term_id);
        $customer_voice_thungs = get_sub_field('customer_voice_thungs','buy_category_'.$obj->term_id);
        $customer_voice_price = get_sub_field('customer_voice_price','buy_category_'.$obj->term_id);
        $customer_voice_coment = get_sub_field('customer_voice_coment','buy_category_'.$obj->term_id);
        $buyer_name = get_sub_field('buyer_name','buy_category_'.$obj->term_id);
        $buyer_voice_coment = get_sub_field('buyer_voice_coment','buy_category_'.$obj->term_id);
        echo "test";
        ?>
  <!-- voice -->
<div class="voice-section">
<dl>
          <dt>
          <?php echo $customer_voice_thungs;?>在住　
          <?php if($customer_voice_name){echo $customer_voice_name;}?>さんお買取り 
          <?php if($buyer_name){echo $buyer_name;}?>点<?php if($customer_voice_price){echo $customer_voice_price;}?>円</dt>
          <dd><?php if($customer_voice_coment){echo $customer_voice_coment;}?></dd>
<dd class="voice-staff">
<strong>鑑定士：<?php if($buyer_name){echo $buyer_name;}?></strong>
<div>
<?php if($buyer_voice_coment){echo $buyer_voice_coment;}?>
<?php $img = get_sub_field('buyer_img');
$imgurl = wp_get_attachment_image_src($img, 'full'); //サイズは自由に変更してね
if($imgurl){ ?><img src="<?php echo $imgurl[0]; ?>" alt="">
<?php }?>
</div></dd>
</dl>
</div>
    <?php $customer_voice_thungs = get_sub_field('customer_voice_thungs'); ?>
    <?php echo $customer_voice_thungs;?>在住　
    <?php endwhile; endif; ?>
    <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>estimate/"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
  </section>
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>に関する<strong>記事</strong></h1>
      </header>
      <div class="news-section clearfix">
      <?php include('include/sec_column_list.php');?>
      </div>
      <div class="more-btn"><a href="<?php echo site_url( '/' ); ?>column/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>詳細はこちら</a></div>
  </section>
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?></main>
    <?php get_footer();?>

