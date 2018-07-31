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
    <!-- 買取実績 -->
    <?php if( have_rows('related_results') ): ?>
    <?php $result_goods = get_field('related_results'); ?>
    <div class="bg-gray">
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
    <?php endforeach; ?><?php else: ?><?php endif; ?>

          </div>
     <div class="top-ctr ctr">
        <a href="tel:0120900602" class="top-ctr2 show-for-small-only">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/tel_sp.png" alt=""></a>
          <span class="hide-for-small-only">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/bg_tel_2.png" alt="">
          </span>
        <div class="display-flex">
        <a href="<?php echo home_url( '/' ); ?>assessment/" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>Webで申込み</a>
        <a href="https://line.me/R/ti/p/%40dgc5506k" class="top-ctr3" target="_blank">LINE友達追加</a>
      </div>
      <div class="top-sel">
      <a href="<?php echo home_url( '/' ); ?>only/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>SEL-LIVEについて、もっと知る</a></div>
    </div>
        </section>
    <!-- 買取実績 -->
    </div>
    <section class="section top-flow">
    <h1>
      <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/top/title_flow.png" class="hide-for-small-only" />
      <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/top/title_flow_sp.png" class="show-for-small-only" />
    </h1>
    <p>
      <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_flow_2.png" alt="" class="hide-for-small-only" />
<img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_flow_2_sp.png" alt="" class="show-for-small-only" />
      <strong>査定価格にご満足いただけたら、最短３０分で引き取りに伺います。</strong>
      </p>
     </section>
  <section class="lp-brand section bg-pink">
  <header class="contents-header">
      <h1><?php the_title(); ?>買取強化ブランド紹介</h1>
      </header>
      <div class="section clearfix row">
        <div>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_01.png" alt=""></dt>
        <dd><strong>DJI</strong>ドローンでは最も有名なメーカーと言えるでしょう。<br>
コスパのよいドローンが多く、初心者モデルからハイエンドモデルまで幅広くラインナップしています。<br><br>
マクサスでも買取実績が豊富で、自信を持って高額査定価格を提案することができます。<br>
</dd>
        </dl>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_02.png" alt=""></dt>
        <dd><strong>Parrot</strong>アンリ・セイドゥが1994年に創業したパロット社は、先進的なテクノロジーを搭載し優れたデザインのドローンを出すメーカーとして知られています。<br>
Parrot Bebop 2やDISCO FPVは手軽に長距離の飛行が可能で、高画質な映像を撮影することができます。<br>
人気の商品のためマクサスでは高額査定価格をだすことができます。

</dd>
        </dl>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_03.png" alt=""></dt>
        <dd><strong>3D Robotics</strong>3DR-3D Roboticsはカリフォルニアのバークレーに本拠地があり、ドローン技術の研究を進めています。一般ユーザー向けドローンとして、高機能な性能と操作性を兼ね備えた製品を出しています。
マクサスでもドローンの買取実績が多く、人気なメーカーのため、高額査定価格のご提案ができます。
</dd>
        </dl>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_04.png" alt=""></dt>
        <dd><strong>Syma</strong>Symaは中国の大手おもちゃメーカーのドローンのブランドです。
基本的な機能をおさえつつ、コスパのよい製品を出しています。
マクサスでもお手軽な価格で手にいれられる人気商品なので、買取実績が多く、高額査定を出すことができます。
</dd>
        </dl>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_05.png" alt=""></dt>
        <dd><strong>Walkera</strong>Walkeraは元々ラジコンヘリの会社でしたが、その技術を活かしてドローンに参入。QR X350PROやScoutといった高性能な製品を次々にリリースしています。
性能に定評のある人気メーカーなので、マクサスでも自身を持って高額査定価格をご提案できます。
</dd>
        </dl>
        <dl>
        <dt><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_brand_06.png" alt=""></dt>
        <dd><strong>Hitec</strong>HitecはWeekenderやNine EaglesRC Loggerといった製品ラインナップで知られ、手軽な価格ながらも、高い性能と高品質を兼ね備えたメーカーと知られています。
マクサスでも買取実績が多い人気のメーカーです。

</dd>
        </dl>
      </div>
      </div>
     <div class="top-ctr ctr">
        <a href="tel:0120900602" class="top-ctr2 show-for-small-only">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/tel_sp.png" alt=""></a>
          <span class="hide-for-small-only">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/bg_tel_2.png" alt="">
          </span>
        <div class="display-flex">
        <a href="<?php echo home_url( '/' ); ?>assessment/" class="top-ctr1"><i class="fa fa-envelope-o" aria-hidden="true"></i>Webで申込み</a>
        <a href="https://line.me/R/ti/p/%40dgc5506k" class="top-ctr3" target="_blank">LINE友達追加</a>
      </div>
      <div class="top-sel">
      <a href="<?php echo home_url( '/' ); ?>only/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>SEL-LIVEについて、もっと知る</a></div>
    </div>
  </section>
  <section class="strengthen section">
  <header class="contents-header">
      <h1>買取強化エリア</h1>
      </header>
      <div class="section clearfix row">
        <dl>
        <dt>首都圏全域で対応！東京23区内は買取強化中！</dt>
        <dd><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_map.png" alt=""></dd>
        </dl>
        <dl>
        <dt>五反田店では店舗で買取査定も行なっています。</dt>
        <dd><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/lp/img_shop.png" alt=""></dd>
        </dl>
      </div>
  </section>
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
  </section>
<?php else: ?>
<?php endif; ?>

		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
	</main>
	<!-- / #main_contents -->
<?php get_footer();?>
