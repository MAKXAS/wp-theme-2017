<?php get_header();?>
<?php
$tax = get_post_taxonomies( $post );
  $tax_name = $tax[0];
  $terms = get_the_terms( $post->ID, $tax_name );
  foreach ( $terms as $term ) {
  $term_name = $term->name;
  $term_slug = $term->slug;
  } ?>
<?php
 $obj = get_queried_object();
   $current_term_description = $obj->description;
   $current_term_image_id2 = get_field('term_image2','buy_category_'.$obj->term_id);
  $current_term_image2 = wp_get_attachment_image_src($current_term_image_id2, 'full');
  $current_term_image_url2 = $current_term_image2[0];
  ?>
<main role="main" class="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
        <div class="searchform-pc hide-for-small-only">
       <form role="search" method="get" id="searchform" class="searchform hide-for-small-only" action="/">
          <input type="text" value="" name="s" id="s">
          <!--<input type="hidden" name="post_type" value="model_top">-->
                    <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo assets_cdn_url('common/img/column/icon-seach.png') ?>" placeholder="記事を検索">
        </form>
    </div>
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
    <img src="<?php echo assets_cdn_url('common/img/other/txt_header3_bl.png') ?>" alt="">
    </p></h1>
    <div class="top-ctr">
        <a href="<?php echo home_url( '/' ); ?>assessment/" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>お申込み</a>
        <a href="tel:0120900602" class="top-ctr2" onclick="ga('send','event','click','tel-tap',,'home');">
        <i class="fa fa-mobile" aria-hidden="true"></i>電話する</a>
        <a href="https://line.me/R/ti/p/%40dgc5506k" class="top-ctr3" onclick="ga('send','event','click','line-tap','top');">LINE<br>友達追加</a>
    </div>
    </div>
    <div>
    <h1 class="img-h1">
    <?php if($current_term_image_id2) :
    $thumbnail = wp_get_attachment_image_src($current_term_image_id2, 'full');
    echo '<img src="'.$thumbnail[0].'" alt="'.get_the_title().'" width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" />';endif;?></h1>
    </div>
    </div>
    </header>
    <section class="goods-txt section">
    <p>
    <?php if(!empty($current_term_description)):?>
    <?php echo nl2br($current_term_description);?>
    <?php endif;?></p>
    </section>
    <section class="goods-only section">
      <p class="goods-only"><img src="<?php echo assets_cdn_url('common/img/other/only_for_goods_bl.png') ?>" alt="" class="hide-for-small-only"><img src="<?php echo assets_cdn_url('common/img/other/only_for_goods_bl.png') ?>" alt="" class="show-for-small-only"></p>
      <div class="convertion-btn"><a href="<?php echo home_url( '/' ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
    <!-- 買取実績 -->
<?php if( have_rows('related_results','buy_category_'.$obj->term_id) ): ?>
<?php $result_goods = get_field('related_results','buy_category_'.$obj->term_id); ?>
<section class="goods section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>関連の<strong>買取実績</strong></h1>
      </header>
      <div class="goods-section row columns goods-result">
<?php foreach((array)$result_goods as $value):?>
        <?php 
        $price = get_field('dt-goods-section-1',$value->ID);
        $area_goods = get_field('dt-goods-section-8',$value->ID);
        ?>
        <a href='<?php echo get_the_permalink($value->ID); ?>'>
        <dl class="medium-4 small-6 columns">
        
          <dt class="goods-section1"><?php trim_str_by_chars( get_the_title( $value->ID ), 25 ); ?></dt>
          <dd class="goods-section2">
          <?php $img = get_field('term_image2',$value->ID);
      $imgurl = wp_get_attachment_image_src($img, 'full');
      //if($imgurl !== false): ?>
          <img src="<?php echo $imgurl[0]; ?>" alt="">
      <?php //endif;?></dd>
          <dd class="goods-section3"><?php trim_str_by_chars( get_the_title( $value->ID ), 30 ); ?></dd>
          <dd class="goods-section4">買取金額:<span class="price"><strong><?php if($price){echo number_format($price);}?></strong>円</span></dd>
          <dd class="goods-section5"><?php if($area_goods){echo $area_goods;}?>のお客様</dd>
        </dl></a>
<?php endforeach; ?>
      </div>
      <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
<?php else: ?><?php endif; ?>
    <!-- 買取実績 -->
    <!-- category -->
<?php $terms = get_terms( 'buy_category_');?>
<?php $term_object = get_queried_object();?>
<?php
    $terms = get_terms( 'buy_category',
    array(
    'get' => 'all',
    'parent' => $term_object->term_id, ) );
    $start_flag = 1;
?>
<?php foreach ( $terms as $term ) : ?>
  <?php
  $post_type_name = get_post_type_object(get_post_type())->name; //投稿タイプ名取得
  $post_type_label = get_post_type_object(get_post_type())->label; //投稿タイプラベル取得
  $obj = get_queried_object(); //メインクエリオブジェクト取得
  $term_link = get_term_link( $term, $taxonomy );
          $term_image_id = get_field('term_image','buy_category_'.$term->term_id);
          $term_image = wp_get_attachment_image_src($term_image_id, 'thumbnail');
          $term_image_url = $term_image[0];
          $term_detail_txt = get_field('goods_category_dtl','buy_category_'.$term->term_id);
?>
<?php if(!empty( $post_type_name)):?>
    <?php if($start_flag == 1):?>
    <section class="top-category section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>を<strong>絞り込む</strong></h1>
      </header>
      <div class="category-section2 row columns responsive slider">
      <?php $start_flag = 0;?>
      <?php else:?>
      <?php endif;?>
<!-- さらに絞り込む -->
    <a href="<?php echo esc_url( $term_link ); ?>/">
    <dl>
    <dt class="category-img">
          <?php if(empty($term_image_id)): ?>
          <?php $imgurl = wp_get_attachment_image_src($term_image_id, 'full');?>
          <img src="<?php echo $imgurl[0]; ?>" alt="">
          <?php else:?>
          <?php $imgurl = wp_get_attachment_image_src($term_image_id, 'full');?>
          <img src="<?php echo $imgurl[0]; ?>" alt="">
        <?php endif;?>
    </dt>
    <dd>
      <span class="category-title"><?php echo $term->name;?></span>
      <span class="category-txt hide-for-small-only">
      <?php echo $term_detail_txt;?>
      </span>
    </dd>
    </dl></a>
      <?php else:?><?php endif;?>
        <?php $end_flag = 1;?>
        <?php endforeach; ?>
    <?php if($end_flag == 1):?>
    </div>
      <br style="clear: both;" />
      <div class="convertion-btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
  </section>
      <?php else:?>
      <?php endif;?>

<!-- さらに絞り込む -->
<?php $knack = get_field('knack','buy_category_'.$obj->term_id);
if(!empty($knack)):?><!--sec_knack-->
  <section class="goods-txt section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>を<strong>高く買い取るコツ</strong></h1>
      </header>
      <p><?php echo $knack;?></p>
    </section>
<?php endif;?>
<!-- voice -->
<?php if( have_rows('customer_voice_con','buy_category_'.$obj->term_id)): ?>
  <section class="voice section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の<strong>お客様の声</strong></h1>
      </header>
      <?php while(have_rows('customer_voice_con','buy_category_'.$obj->term_id)):
          the_row(); ?>
        <?php
        $customer_voice_name = get_sub_field('customer_voice_name','buy_category_'.$obj->term_id);
        $customer_voice_thungs = get_sub_field('customer_voice_thungs','buy_category_'.$obj->term_id);
        $customer_voice_price = get_sub_field('customer_voice_price','buy_category_'.$obj->term_id);
        $customer_voice_coment = get_sub_field('customer_voice_coment','buy_category_'.$obj->term_id);
        $buyer_name = get_sub_field('buyer_name');
        $buyer_img = get_sub_field('buyer_img');
        $buyer_voice_coment = get_sub_field('buyer_voice_coment','buy_category_'.$obj->term_id);?>
          <div class="voice-section">
          <dl>
          <dt>
          <?php if($customer_voice_name){echo $customer_voice_name;}?>さんお買取り
          <?php if($customer_voice_thungs){echo $customer_voice_thungs.'点';}?><?php if($customer_voice_price){echo $customer_voice_price.'円';}?></dt>
          <dd><?php if($customer_voice_coment){echo $customer_voice_coment;}?></dd>
          <dd class="voice-staff">
          <strong>鑑定士：<?php if($buyer_name){echo $buyer_name;}?></strong>
          <div>
          <?php if($buyer_voice_coment){echo $buyer_voice_coment;}?>
          <?php
              $img = get_field('buyer_img','buy_category_'.$obj->term_id);
              $img_url = wp_get_attachment_image_src($buyer_img, 'full');
           ?>
          <?php if($img_url):?>
              <img src="<?php echo $img_url[0]; ?>" alt="">
          <?php endif;?>
          </div></dd>
          </dl>
          </div>
      <?php endwhile; ?>
    <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>estimate/"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
  </section>
 <?php endif; ?><!-- voice -->
<!-- column -->
<?php if( have_rows('related_column','buy_category_'.$obj->term_id) ): ?>
<?php $kanren = get_field('related_column','buy_category_'.$obj->term_id); ?>
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>に関する<strong>記事</strong></h1>
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
            <figure style="background: url(<?php echo assets_cdn_url('images/top/no_image.jpg center center no-repeat;background-size: cover'); ?>"></figure>
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
      <div class="more-btn more-long-btn2"><a href="<?php echo home_url( '/' ); ?>column/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>詳細はこちら</a></div>
  </section>
<?php else: ?>
<?php endif; ?>
    <!--sec_cta-->
    <?php include('include/sec_cta.php');?>
    </main>
    <?php get_footer();?>
