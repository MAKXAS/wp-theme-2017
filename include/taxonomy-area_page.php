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
  $knack = get_field('knack','area_type_'.$obj->term_id); //カスタムフィールド「高く売るコツ」取得
  $customer_voice = get_field('customer_voice','area_type_'.$obj->term_id); //カスタムフィールド「お客様の声」取得
  $appraiser_voice = get_field('appraiser_voice','area_type_'.$obj->term_id); //カスタムフィールド「鑑定士の声」取得
  
?>
<main role="main" class="main">
<!--breadcrumb-->
    <nav class="bread-crumb-wr">
    <div class="bread-crumb">
      <?php if(function_exists('bcn_display')) { bcn_display(); }?>
        <div class="searchform-pc hide-for-small-only">
       <form role="search" method="get" id="searchform" class="searchform hide-for-small-only" action="https://kaitorimakxas.com/">
          <input type="text" value="" name="s" id="s">
          <!--<input type="hidden" name="post_type" value="model_top">-->
                    <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo get_stylesheet_directory_uri() ?>/common/img/column/icon-seach.png" placeholder="記事を検索">
        </form>
    </div>
    </div>
    </nav>
    <header class="h-no2">
    <div>
    <h1 class="title-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/header_area_img.png" class="hide-for-small-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/header_area_img_sp.png" class="show-for-small-only"></h1>
    </div>
    </header>
    <section class="section area-overture-box">
    <ul>
      <?php
      while(have_rows('outline')):the_row(); ?>
      <?php $outline_li = get_sub_field('outline_li');?>
      <li><?php if($outline_li){echo $outline_li;}?></li>
      <?php endwhile; ?>
    </ul>
    <h3>不用品処分は、ぜひ買取マクサスをご利用ください！</h3>
    <div class="area-link">
      <h3>リサイクル買取強化地域</h3>
      <ul>
<?php $args = array(
                'posts_per_page'   => -1, //表示件数
                'post_type' => 'area_type'    //カスタム投稿タイプの指定
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
    </section>
    <section class="goods-only section">
      <p class="goods-only"><img src="<?php echo get_stylesheet_directory_uri() ?>/common/img/other/only_for_goods.png" alt="" class="hide-for-small-only"></p>
<?php include('include/sec_cta_2.php');?>
</section>
<section class="goods-txt section">
<div class="yellow-box">
<dl>
<dd>エアコン、テレビ（ブラウン管式、液晶式、プラズマ式）、冷蔵庫、冷凍庫、洗濯機、衣類乾燥機は家電リサイクル法の対象品目となっています。家電リサイクル法の対象品目は、メーカーで回収し、資源として再利用します。<br>強化買取地域の粗大ごみ等では収集しませんので、ご注意ください。</dd>
</dl></div></section>
<section class="goods-txt section">
      <header class="contents-header">
      <h1><strong>リサイクル買取強化地域</strong></h1>
      </header>
      <div class="area-link">
      <ul>
<?php $args = array(
        'posts_per_page'   => -1, //表示件数
        'post_type' => 'area_type'    //カスタム投稿タイプの指定
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