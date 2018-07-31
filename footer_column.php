<!--footer-->
    <footer class="site-footer" role="contentinfo">
      <section class="footer-nav">
        <div class="row columns">
          <h1>買取マクサス 最短30分で売却可能! まとめて売るなら買取マクサス</h1>
          <div class="medium-3 columns">
            <h2>買取金額を調べる
            </h2>
            <h3>商品ジャンル </h3>
            <?php include('include/nav_list.php');?>

            <h2>マクサスについて</h2>
            <ul>
              <li>
                <a href="<?php echo site_url( '/' ); ?>only/">選ばれる理由</a>
              </li>
              <li>
                <a href="<?php echo site_url( '/' ); ?>company/">会社概要</a>
              </li>
            </ul>
            </div>
          <div class="medium-3 columns">
            <h2>こんな場合の買取
            </h2>
            <ul class="">
              <li>
                <a href="#">引っ越しの場合</a>
              </li>
              <li>
                <a href="#">まとめて買取査定でお得</a>
              </li>
            </ul>
          </div>
          <div class="medium-3 columns">
            <h2><a href="<?php echo site_url( '/' ); ?>area_type/">買取りエリア</a></h2>
            </div>
          <div class="medium-3 columns">
            <h2>お問い合わせ・お役立ちコラム</h2>
            <ul>
              <li>
                <a href="<?php echo site_url( '/' ); ?>assessment/">お問い合わせ</a>
              </li>
              <li>
                <a href="<?php echo site_url( '/' ); ?>faq/">よくある質問</a>
              </li>
              <li>
                <a href="<?php echo site_url( '/' ); ?>column/">お役立ち情報TOP</a>
              </li>
              <li>
                <a href="<?php echo site_url( '/' ); ?>popular_list/popular/">人気記事</a>
              </li>
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
          'limit' => 4, //表示数
          'post_html' => '<li>{title}</li>',
     );
     wpp_get_mostpopular($arg);} ?>
     <li>
                <a href="<?php echo site_url( '/' ); ?>column/">新着記事</a>
              </li>
              <ul>
      <?php query_posts('posts_per_page=4'); ?>
      <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!--item-->
        <li><a href="<?php the_permalink() ?>">
        <?php trim_str_by_chars( get_the_title(), 25 ); ?></strong></a></li>
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        </ul>
            </ul>
          </div>
          </div>
      </section>
      <p class="copyright"> <strong>株式会社MAKXAS</strong> <br class="show-for-small-only"> TEL:0120-900-602 <br>東京都品川区東五反田1-9-2ダイヤパレス五反田1F<br>
      ©2017 買取マクサス All Rights Reserved.
      </p>
    </footer>
    <p class="pagetop" id="pagetop">
      <a href="#"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </p>
<div class="drawer-close"></div>
<div class="drawer-body"><div class="drawer-scl">
<p class="show-for-small-only before-tell-header"><a href="<?php echo site_url( '/' ); ?>assessment/"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i>お問い合わせの前にご確認ください</a></p>
          <h2 class="CLOSE">
          <strong>
          <img src="<?php echo assets_cdn_url('common/img/common/logo.png') ?>" alt=""/>
         </strong>
          <a href="#" class="close-menu">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
    </a>
    </h2>
          <nav class="sp-nav-menu">
          <div class="medium-12 columns">
            <h2><a href="<?php echo site_url( '/' ); ?>buy/">買取金額を調べる</a></h2>
            <h3><a href="<?php echo site_url( '/' ); ?>buy/">商品ジャンル</a></h3>
            <ul><?php include('include/nav_list.php');?></ul>
            <h2><a href="#">こんな場合の買取</a></h2>
            <ul class="coming-soon">
            <li><a href="#">引っ越しの場合</a></li>
            <li><a href="#">まとめて査定する場合</a></li>
            <li><a href="#">遺品整理</a></li>
            </ul>
            <h2><a href="<?php echo site_url( '/' ); ?>area_type/">買取りエリア</a></h2>
            <ul>
            <li><a href="<?php echo site_url( '/' ); ?>area_type/shinagawa/">品川区</a></li>  
            </ul>            
            <h2><a href="<?php echo site_url( '/' ); ?>only/">マクサスについて</a></h2>
            <ul>
              <li>
                <a href="<?php echo site_url( '/' ); ?>only/">選ばれる理由</a>
              </li>
              <li>
                <a href="<?php echo site_url( '/' ); ?>company/">会社概要</a>
              </li>

            </ul>
          </div>
          <div class="medium-12 columns">
            <h2><a href="<?php echo site_url( '/' ); ?>faq/">よくある質問</a></h2>
            <ul>
              <li>
                <a href="<?php echo site_url( '/' ); ?>faq/">よくある質問TOP</a>
              </li>
            </ul>
          </div>
          <div class="medium-12 columns">
            <h2><a href="<?php echo site_url( '/' ); ?>column/">お役立ち情報</a></h2>
            <ul>
              <li>
                <a href="<?php echo site_url( '/' ); ?>column/">お役立ち情報TOP</a>
              </li>
              <li><a href="<?php echo site_url( '/' ); ?>column/">人気記事</a></li>
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
          'limit' => 4, //表示数
          'post_html' => '<li>{title}</li>',
     );
     wpp_get_mostpopular($arg);} ?>
<li><a href="<?php echo site_url( '/' ); ?>column/">新着記事</a></li>
     <?php query_posts('posts_per_page=4'); ?>
      <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!--item-->
        <li>
          <a href="<?php the_permalink() ?>"><?php trim_str_by_chars( get_the_title(), 25 ); ?></strong></a></li>
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
            </ul>
          </div>
          </nav>
</div></div>
<script src="https://log.ma-jin.jp/ma.js?acid=352"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/common/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/common/bower_components/foundation-sites/dist/foundation.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/common/bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/common/js/app.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/common/js/style_column.js"></script>
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="jquery.iframetracker.js"></script>
<script>
jQuery(document).ready(function($){
$('.iframe_wrap iframe').iframeTracker({
blurCallback: function(){
ga('send', 'event', 'iframe', 'click');
}
});
});
</script>
</body></html>