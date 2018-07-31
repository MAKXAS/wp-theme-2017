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
<!--  -->
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
    </div>
    </nav>
    <header class="slide">
    <div>
    <div>
    <h1 class="h1-1 <?php if(mb_strlen(get_the_title()) == 3) { ?>size_3<?php } elseif(mb_strlen(get_the_title()) == 4){ ?>size_4<?php }elseif(mb_strlen(get_the_title()) == 5){ ?>size_5<?php }
    ?>"><?php the_title(); ?>の不用品処分は、<br>ぜひ買取マクサスを<br>ご利用ください！</h1>
    <ul>
      <?php
      while(have_rows('outline')):the_row(); ?>
      <?php $outline_li = get_sub_field('outline_li');?>
      <li><?php if($outline_li){echo $outline_li;}?></li>
      <?php endwhile; ?>
    </ul>
    <p><?php the_title(); ?>の不用品処分は、ぜひ買取マクサスをご利用ください！</p>
    <div class="top-ctr">
        <a href="<?php echo home_url( '/' ); ?>assessment/" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>お申込み</a>
        <a href="tel:0120900602" class="top-ctr2" onclick="ga('send','event','click','tel-tap',,'home');">
        <i class="fa fa-mobile" aria-hidden="true"></i>電話する</a>
        <a href="https://line.me/R/ti/p/%40dgc5506k" class="top-ctr3" onclick="ga('send','event','click','line-tap','top');">LINE<br>友達追加</a>
    </div>
    </div>
    <div>
    <h1 class="img-h1">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/header_area.png" alt="" /></h1>
    </div>
    </div>
    </header>
    <section class="goods-only section">
      <p class="goods-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/only_for_goods.png" alt="" class="hide-for-small-only"></p>
<?php include('include/sec_cta_2.php');?>     </section>
  <section class="top-news section bg-pink">
      <header class="contents-header">
      <h1><strong>買取マクサス・<?php the_title(); ?></strong>に関する<strong>記事</strong></h1>
      </header>
      <div class="news-section clearfix">
<?php if( have_rows('related_column') ): ?>
	<?php $kanren = get_field('related_column'); ?>
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
  <?php endif; ?>
    </div>
  </section>
  <section class="goods-txt section">
      <header class="contents-header">
      <h1><strong><?php the_title(); ?></strong>の<strong>中古品・不用品買取可能地域</strong></h1>
      </header>
      <p class="area-contents-box">
      <?php $area_list = get_field('area_list');?>
      <?php if($outline_li){echo $area_list;}?></p></section>
<section class="goods-txt section">
      <header class="contents-header">
<h4 class="area">マクサスの買取で処分をお考えでない場合は<?php the_title(); ?>の不用品処分も可能です。方法は以下のとおりです。</h4>
<h1><strong><?php the_title(); ?></strong>の<strong>粗大ごみの出し方</strong></h1>
      </header>
      <p>粗大ごみとして処分できるものは、家庭から出る一辺が30センチ以上のもので、家具・寝具・電化製品（家電リサイクル4品目を除く）・自転車などです。<br>
家電リサイクル４品目（エアコン・ブラウン管式テレビ・冷蔵庫・洗濯機）・家庭用パソコンは粗大ごみとして出すことはできません。<br>以下の手順が粗大ごみの出し方になります。</p>
    <div class="pink-box">
     <h1><?php the_title(); ?>の粗大ごみの出し方</h1>
		<?php the_content();?>
    </div>
</section>
<!-- voice -->
<?php if( have_rows('customer_voice_con')): ?>
  <section class="voice section">
      <header class="contents-header">
      <h1><strong><?php single_term_title();?></strong>の<strong>お客様の声</strong></h1>
      </header>
      <?php while(have_rows('customer_voice_con')): ?>
          <?php the_row(); ?>
        <?php
        $customer_voice_name = get_sub_field('customer_voice_name');
        $customer_voice_thungs = get_sub_field('customer_voice_thungs');
        $customer_voice_price = get_sub_field('customer_voice_price');
        $customer_voice_coment = get_sub_field('customer_voice_coment');
        $buyer_name = get_sub_field('buyer_name');
        $buyer_voice_coment = get_sub_field('buyer_voice_coment');?>
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
<?php $img = get_sub_field('buyer_img','buy_category_'.$obj->term_id);
$imgurl = wp_get_attachment_image_src($img, 'full'); //サイズは自由に変更してね
if($imgurl): ?><img src="<?php echo $imgurl[0]; ?>" alt="">
<?php endif;?>
</div></dd>
</dl>
</div>
<?php endwhile; ?>
    <div class="convertion-btn"><a href="<?php echo site_url( '/' ); ?>estimate/"><i class="fa fa-coffee" aria-hidden="true"></i>簡単60秒。無料お見積りはコチラ</a></div>
  </section>  
 <?php endif; ?><!-- voice -->
<!-- リサイクル法 -->
<section class="goods-txt section">
<div class="yellow-box">
<dl>
<dd>エアコン、テレビ（ブラウン管式、液晶式、プラズマ式）、冷蔵庫、冷凍庫、洗濯機、衣類乾燥機は家電リサイクル法の対象品目となっています。家電リサイクル法の対象品目は、メーカーで回収し、資源として再利用します。<br>
<?php the_title(); ?>の粗大ごみ等では収集しませんので、ご注意ください。</dd>
</dl></div></section>
<section class="goods-txt section">
      <header class="contents-header">
      <h1><strong>家電リサイクル法対象品目</strong>の<strong>処分方法(<?php the_title(); ?>エリア)</strong></h1>
      </header>
      <div class="yellow-box02">
	<?php $howtore = get_field('howtorecycle');?>
    <?php echo $howtore;?>
</div>
</section>
<section class="goods-txt section">
      <header class="contents-header">
      <h1><strong>東京都のリサイクル買取強化地域</strong></h1>
      </header>
      <div class="area-link">
      <ul>
<?php $args = array(
        'posts_per_page'   => -1, //表示件数
        'post_type' => 'area_type',    //カスタム投稿タイプの指定
    );
    $customPosts = get_posts($args);
    if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
        <li>
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </li>
    <?php endforeach; ?>
    <?php else : //記事が無い場合 ?>
        <p>表示できる記事がありません。</p>
    <?php endif;
    wp_reset_postdata(); ?>
      </ul>
      </div>
</section>
		<?php include('include/sec_cta.php');?>
	</main>
<!-- / #contents_wrap .container -->
<?php get_footer();?>
