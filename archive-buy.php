<?php get_header();?>

<?php
	$post_type_name = get_post_type_object(get_post_type())->name; //投稿タイプ名取得
	$post_type_label = get_post_type_object(get_post_type())->label; //投稿タイプラベル取得
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
    </div>
    </nav>
<section class="top-category section">
    <header class="h-no2">
    <div>
    <h1 class="h1-notice"><sub><span>買取価格を調べよう・比較しよう</span></sub></h1>
    </div>
    </header>
      <div class="category-section row columns">
		<!--page_title-->
				<?php include('include/buy_category_list_0.php');?>
      </div><!--sec_cta-->
	</main>
	<!-- / #main_contents -->
<?php get_footer();?>
