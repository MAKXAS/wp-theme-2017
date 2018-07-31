<?php
include_once TEMPLATEPATH . '/icf/icf-loader.php';

// アイキャッチ画像有効化
add_theme_support( 'post-thumbnails' );

// 固定ページ設定
function cms_init_settings() {
  $spp = new ICF_SettingsPage_Parent( 'site_settings', 'サイト設定' );
  $page_list = array();
  foreach ( get_posts( array( 'post_type' => 'page', 'orderby' => 'menu_order', 'numberposts' => -1 ) ) as $page ) {
    $page_list[ $page->post_title ] = $page->ID;
  }
  $sec = $spp->s( 'リンク先設定' );

  // 固定ページリンク紐付け
  $navs = array(
    'リフォームについて' => 'reformpage',
    '会社概要' => 'aboutpage'
  );
  foreach ( $navs as $name => $slug ) {
    $sec->c( $name )
    ->select( 'url_' . $slug, $page_list, array( 'empty' => true ) )->nbsp( 3 )
    ->checkbox( 'url_' . $slug . '_is_outer', 1, array( 'label' => '%s 外部リンク - URL：' ) )->nbsp( 2 )
    ->text( 'url_' . $slug . '_outer', null, array( 'style' => 'width: 30%', 'validation' => 'url' ) )->nbsp( 2 );
  }
}
