<?php get_header();?>
<?php
	$tax = get_post_taxonomies( $post );
	$tax_name = $tax[0];
	$terms = get_the_terms( $post->ID, $tax_name );
	foreach ( $terms as $term ) {
	$term_name = $term->name;
	$term_slug = $term->slug;
	}	
?>
<?php
  $post_type_name = get_post_type_object(get_post_type())->name; //投稿タイプ名取得
  $post_type_label = get_post_type_object(get_post_type())->label; //投稿タイプラベル取得
  $obj = get_queried_object(); //メインクエリオブジェクト取得
  $current_term_description = $obj->description; //現在のタームの説明取得
  $current_term_image_id = get_field('term_image','buy_category_'.$obj->term_id);
  $current_term_image = wp_get_attachment_image_src($current_term_image_id, 'full');
  $current_term_image_url = $current_term_image[0];//現在のタームの画像url取得
  $current_term_image_id2 = get_field('term_image2');
  $current_term_image2 = wp_get_attachment_image_src($current_term_image_id2, 'full');
  $current_term_image_url2 = $current_term_image2[0];//現在のタームの画像url取得
  $knack = get_field('knack'); //カスタムフィールド「高く売るコツ」取得
  $goods_category_dtl = get_field('goods_category_dtl','buy_category_'.$obj->term_id); 
  $customer_voice = get_field('customer_voice','buy_category_'.$obj->term_id); // 買取実績
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
                    <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo get_stylesheet_directory_uri() ?>/common/img/column/icon-seach.png" placeholder="記事を検索">
        </form>
    </div>
    <!--  -->
    </div>
    </nav>
<!-- header -->
    <header class="slide">
    <div>
    <div>
    <h1><span class="h1-1">オンライン買取サービス<strong>「SEL-LIVE」</strong>は</span><br>
    <span class="h1-2"><strong>電話一本</strong>で<br>
      <strong><?php the_title(); ?></strong>の</span>
    <span class="h1-2-2"><strong>確定買取金額</strong>が<em>分かる。</em></span></h1>
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
    echo '<img src="'.$thumbnail[0].'" />';endif;?></h1>
    </div>
    </div>
    </header>
        <?php $dt_goods_section_1 = get_field('dt-goods-section-1');?>
        <?php $dt_goods_section_3 = get_field('dt-goods-section-3');?>
        <?php $dt_goods_section_4 = get_field('dt-goods-section-4');?>
        <?php $dt_goods_section_5 = get_field('dt-goods-section-5');?>
        <?php $dt_goods_section_6 = get_field('dt-goods-section-6');?>
        <?php $dt_goods_section_7 = get_field('dt-goods-section-7');?>
        <?php $dt_goods_section_8 = get_field('dt-goods-section-8');?>
        <?php $dt_goods_section_9 = get_field('dt-goods-section-9');?>
    <section class="table-hikaku section">
      <header class="table-header">
      <h1 class="first-h1"><strong><?php the_title(); ?></strong>の<strong>買取例</strong></h1>
      </header>
      <div class="hikaku-section hikaku-section2">
  <table class="hide-for-small-only">
  <tbody>
    <?php if($dt_goods_section_1):?>
  <tr>
             <th class="pk-th">買取金額</th>
             <td class="pk-td"><?php echo number_format($dt_goods_section_1);?>円</td>
           </tr>
           <?php endif; ?>
  <tr>
             <th><span class="another-company">カテゴリ・ジャンル</span></th>
             <td><?php echo $term_name;
?></td>
           </tr>
           <?php if($dt_goods_section_3):?>
           <tr>
             <th>メーカー</th>
             <td><?php if($dt_goods_section_3){echo $dt_goods_section_3;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_4):?>
           <tr>
             <th>モデル</th>
             <td><?php if($dt_goods_section_4){echo $dt_goods_section_4;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_5):?>
           <tr>
             <th>特徴</th>
             <td><?php if($dt_goods_section_5){echo $dt_goods_section_5;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_6): ?>
           <tr>
             <th>状態</th>
             <td><?php if($dt_goods_section_6){echo $dt_goods_section_6;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_7): ?>
           <tr>
             <th>買取方法</th>
             <td><?php if($dt_goods_section_7){echo $dt_goods_section_7;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_8): ?>
           <tr>
             <th>地域名</th>
             <td><?php if($dt_goods_section_8){echo $dt_goods_section_8;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_9): ?>
           <tr>
             <th>商品紹介</th>
             <td class="textLeft"><?php if($dt_goods_section_9){echo $dt_goods_section_9;}?></td>
           </tr>
           <?php endif; ?>
         </tbody></table>
<table class="show-for-small-only sp">
  <tbody>
  <tr>
             <th class="pk-th">買取金額</th>
           </tr>
           <?php if($dt_goods_section_1): ?>

           <tr>
             <td class="pk-td"><?php if($dt_goods_section_1){echo number_format($dt_goods_section_1);}?>円</td>
           </tr>
                      <?php endif; ?>

  <tr>
             <th><span class="another-company">カテゴリ・ジャンル</span></th>

           </tr>
           <tr>
             <td><?php echo $term_name;
?></td>
           </tr>
                     <!--未入力の時非表示-->
           <tr>
             <th>メーカー</th>

           </tr>
           <?php if($dt_goods_section_3):?>
           <tr>
             <td><?php if($dt_goods_section_3){echo $dt_goods_section_3;}?></td>
           </tr>
           <?php endif;?>
           <?php if($dt_goods_section_4):?>
           <tr>
             <th>モデル</th>
           </tr>
           <tr>
             <td><?php if($dt_goods_section_4){echo $dt_goods_section_4;}?></td>
           </tr>
           <?php endif;?>
           <?php if($dt_goods_section_5): ?>
           <tr>
             <th>特徴</th>
           </tr>
           <tr>
             <td><?php if($dt_goods_section_5){echo $dt_goods_section_5;}?></td>
           </tr>
           <?php endif; ?>
           <?php if($dt_goods_section_6):?>
           <tr>
             <th>状態</th>
           </tr>
           <tr>
             <td><?php if($dt_goods_section_6){echo $dt_goods_section_6;}?></td>
           </tr>
           <?php endif;?>
           <?php if($dt_goods_section_7):?>
           <tr>
             <th>買取方法</th>
           </tr>
           <tr>
             <td><?php if($dt_goods_section_7){echo $dt_goods_section_7;}?></td>
           </tr>
           <?php endif;?>
           <?php if($dt_goods_section_8):?>
           <tr>
             <th>地域名</th>
           </tr>
           <tr>
             <td><?php if($dt_goods_section_8){echo $dt_goods_section_8;}?></td>
           </tr>
           <?php endif;?>
           <?php if($dt_goods_section_9):?>
                         <tr>
             <th>商品紹介</th>
           </tr>
           <tr>
             <td class="textLeft"><?php if($dt_goods_section_9){echo $dt_goods_section_9;}?></td>
           </tr>
           <?php endif;?>
         </tbody></table>
      </div>
      <?php include('include/sec_cta_2.php');?>
    </section>
    <section class="goods-txt section">
    <?php the_content(); ?>
    <p>
    <?php if(!empty($current_term_description)):?><?php echo nl2br($current_term_description);?>
    <?php endif;?></p>
    </section>
    <section class="goods-only section">
      <p class="goods-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/only_for_goods_gr.png" alt="" class="hide-for-small-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/only_for_goods_gr.png" alt="" class="show-for-small-only"></p>
    <?php include('include/sec_cta_2.php');?> 
    </section>
    <?php if( have_rows('goods-section0')): ?>
    <section class="goods section">
      <header class="contents-header">
      <h1><strong><?php the_title(); ?></strong>の<strong>買取実績</strong></h1>
      </header>
      <div class="goods-section row columns goods-result">
      <?php
      while(have_rows('goods-section0')):the_row(); ?>
      <?php include('include/sec_results.php');?> 
      <?php endwhile; ?>
      </div>
      <div class="convertion-btn"><a href="<?php echo home_url( '/' ); ?>"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
    </section>
    <?php endif;?>
    <section class="table-hikaku section">
      <header class="table-header">
      <h1 class="color-y table-header-h1-2"><strong>他社と比べてみてください！</strong>業界最高峰のサービス<strong></strong></h1>
      </header>
      <div class="hikaku-section">
  <table>
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td><span class="self-company">買取マクサス</span></td>
      <td><span class="another-company">B社</span></td>
      <td><span class="another-company">A社</span></td>
    </tr>
    <tr>
      <td>ビデオチャットによる査定</td>
      <td>◎</td>
      <td>×</td>
      <td>×</td>
    </tr>
    <tr>
      <td>速さ</td>
      <td>◎</td>
      <td>△</td>
      <td>△</td>
    </tr>
    <tr>
      <td>価格</td>
      <td>〇</td>
      <td>△</td>
      <td>〇</td>
    </tr>
  </tbody>
</table>

      </div>
      <?php include('include/sec_cta_2.php');?>
    </section>
    <!-- 買取実績 -->
<?php if( have_rows('related_results') ): ?>
<?php $result_goods = get_field('related_results'); ?>
<section class="goods section">
      <header class="contents-header">
      <h1><strong><?php the_title(); ?></strong>関連の<strong>買取実績</strong></h1>
      </header>
      <div class="goods-section row columns">
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
      if($imgurl){ ?><img src="<?php echo $imgurl[0]; ?>" alt="">
      <?php }?></dd>
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
    <?php if(!empty($knack)):?>
  <section class="goods-txt section">
      <header class="contents-header">
      <h1><strong><?php the_title(); ?></strong>の<strong>買取方法</strong></h1>
      </header>
      <p>
    <!--sec_knack-->
<?php echo $knack;?>    
      </p>
    </section><?php endif;?>
<!-- column -->
<?php if( have_rows('related_column') ): ?>
<?php $kanren = get_field('related_column'); ?>
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1><strong><?php the_title(); ?></strong>に関する<strong>記事</strong></h1>
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
      <div class="more-btn more-long-btn2"><a href="<?php echo home_url( '/' ); ?>column/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>詳細はこちら</a></div>
  </section>
<?php else: ?>
<?php endif; ?>
    <!--sec_cta-->
    <?php include('include/sec_cta.php');?></main>
    <?php get_footer();?>