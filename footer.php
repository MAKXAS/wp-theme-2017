<!--footer-->
    <footer class="site-footer" role="contentinfo">
      <section class="footer-nav">
        <div class="row columns">
          <h1>買取マクサス 最短30分で売却可能! まとめて売るなら買取マクサス</h1>
          <div class="medium-3 columns">
            <h2>買取金額を調べる
            </h2>
            <h3>商品ジャンル </h3>
            <ul><?php include('include/nav_list.php');?></ul>
            </div>
          <div class="medium-3 columns">
            <h2>マクサスについて</h2>
            <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>only/">選ばれる理由</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>company/">会社概要</a>
              </li>
            </ul>
          </div>
          <div class="medium-3 columns">
            <h2><a href="<?php echo home_url( '/' ); ?>area_type/">買取りエリア</a></h2>
          </div>
          <div class="medium-3 columns">
            <h2>お問い合わせ・お役立ちコラム</h2>
            <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>assessment/">お問い合わせ</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>faq/">よくある質問</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>column/">お役立ち情報TOP</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>popular_list/popular/">人気記事</a>
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
                <a href="<?php echo home_url( '/' ); ?>column/">新着記事</a>
              </li>
              <ul>
      <?php query_posts('posts_per_page=4'); ?>
      <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!--item-->
        <li><a href="<?php the_permalink() ?>"><?php trim_str_by_chars( get_the_title(), 25 ); ?></strong></a></li>
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        </ul>
            </ul>
          </div>
          </div>
      </section>
      <p class="copyright">
      <strong>株式会社MAKXAS</strong> <br class="show-for-small-only"> TEL:0120-900-602 東京都品川区東五反田1-9-2ダイヤパレス五反田1F<br>
      <span style="font-size: 80%;padding: .5rem;">古物営業法に基づく表示 ＜古物商許可＞　氏名または名称：株式会社MAKXAS<br>東京都公安委員会 第302151307220号</span><br>
      ©2017 買取マクサス All Rights Reserved.
      </p>
    </footer>
    <p class="pagetop" id="pagetop">
      <a href="#"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </p>
<div class="drawer-close"></div>
<div class="drawer-body"><div class="drawer-scl">
<p class="show-for-small-only before-tell-header"><a href="<?php echo home_url( '/' ); ?>before-tell/"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i>お問い合わせの前にご確認ください</a></p>
          <h2 class="CLOSE">
          <strong>
          <img src="<?php echo assets_cdn_url('common/img/common/logo.png') ?>" alt=""/>
          <sub class="show-for-small-only">買取マクサス 最短30分で売却可能!</sub>
          </strong>
          <a href="#" class="close-menu">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
    </a>
    <ul>
      <li class="btn-header-tell">
      <a href="tel:0120900602" onclick="ga('send','event','click','tel-tap','right-top');"><img src="<?php echo assets_cdn_url('common/img/common/btn_tel_sp.png') ?>" alt=""></a></li>
    </ul>
    </h2>
          <nav class="sp-nav-menu">
<p class="form-ttl">サイト検索:</p>
          <form role="search" method="get" id="searchform" class="searchform-sp" action="/">
          <input type="text" value="" name="s" id="s">
          <!--<input type="hidden" name="post_type" value="model_top">-->
                    <input type="image" id="searchsubmit" alt="検索" width="32" height="30" src="<?php echo assets_cdn_url('common/img/column/icon-seach.png') ?>" placeholder="サイト検索">
        </form>
          <div class="medium-12 columns">
            <h2><a href="<?php echo home_url( '/' ); ?>buy/">買取金額を調べる</a></h2>
            <h3><a href="<?php echo home_url( '/' ); ?>buy/">商品ジャンル</a></h3>
            <h2><a href="<?php echo home_url( '/' ); ?>area_type/">買取りエリア</a></h2>
            <h2><a href="<?php echo home_url( '/' ); ?>only/">マクサスについて</a></h2>
            <ul>
              <li>
                <a href="<?php echo home_url( '/' ); ?>only/">選ばれる理由</a>
              </li>
              <li>
                <a href="<?php echo home_url( '/' ); ?>company/">会社概要</a>
              </li>
            </ul>
          </div>
          <div class="medium-12 columns">
            <h2><a href="<?php echo home_url( '/' ); ?>faq/">よくある質問</a></h2>
          </div>
          <div class="medium-12 columns">
            <h2><a href="<?php echo home_url( '/' ); ?>column/">お役立ち情報</a></h2>
            <ul>
              <li><a href="<?php echo home_url( '/' ); ?>column/popular/">人気記事</a></li>
              <li><a href="<?php echo home_url( '/' ); ?>column/">新着記事</a></li>
            </ul>
          </div>
          </nav>
</div></div>
    <script src="<?php echo assets_cdn_url('common/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
    <script src="<?php echo assets_cdn_url('common/js/app.js') ?>"></script>
    <script src="<?php echo assets_cdn_url('common/js/style.js') ?>"></script>
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.iframetracker/1.1.0/jquery.iframetracker.min.js"></script>
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
