<?php
include_once dirname(__FILE__) . '/settings/setting-functions.php';
include_once dirname(__FILE__) . '/settings/setting-theme.php';
include_once dirname(__FILE__) . '/settings/setting-hooks.php';


if (!(is_admin() )) {
  function add_async_to_enqueue_script( $url ) {
      if ( FALSE === strpos( $url, '.js' ) ) return $url;
      if ( strpos( $url, 'jquery.min.js' ) ) return $url;
      return "$url' async charset='UTF-8";
  }
  add_filter( 'clean_url', 'add_async_to_enqueue_script', 11, 1 );
}

//----------------------------------------------
// フッターテキスト変更（左）
//----------------------------------------------
function custom_footer_admin () {
  return '<a href="http://kaitorimakxas.com/">買取りマクサス</a>';
}
add_filter( 'admin_footer_text', 'custom_footer_admin' );

//----------------------------------------------
// フォントサイズボタン追加
//----------------------------------------------
function ilc_mce_buttons( $buttons ) {
  array_push( $buttons, "fontsizeselect" );
  return $buttons;
}
add_filter( "mce_buttons", "ilc_mce_buttons" );

//----------------------------------------------
// アイキャッチ画像サイズ指定
//----------------------------------------------
add_image_size( 'casesize', 250, 250, true );

//----------------------------------------------
// ページング
//----------------------------------------------
function cms_pagination( $pages = '', $range = 5 ) {
  global $paged;
  if ( empty( $paged ) ) {
    $paged = 1;
  }
  if ( $showitems === NULL ) {
    $showitems = 0;
  }
  if ( $pages == '' ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if ( !$pages ) {
      $pages = 1;
    }
  }
  $content = '';
  if( 1 != $pages ) {
    ob_start();
    echo '<div class="number">';
    if ( $paged > 1 && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; 前ページ</a>";
    }
    echo "<a href='".get_pagenum_link( 1 )."'>最新</a>";
    if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
      echo "<a href='".get_pagenum_link( 1 )."'>&laquo;</a>";
    }
    for ( $i = 1; $i <= $pages; $i++ ) {
      if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) ) {
        echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>";
      }
    }
    echo "<a href='".get_pagenum_link( $pages )."'>最初</a>";
    if ( $paged < $pages && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link( $paged + 1 )."'>次ページ &rsaquo;</a>";
    }
    echo "</div>";
    $content = ob_get_clean();
  }
  return $content;
}

function add_files()
{

}
add_action('wp_enqueue_scripts', 'add_files');

//----------------------------------------------
// 管理画面メニュー「投稿」テキスト変更
//----------------------------------------------
function edit_admin_menus() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'お役立ち情報';
}
add_action( 'admin_menu', 'edit_admin_menus' );

//----------------------------------------------
// 投稿表示文字数制限
//----------------------------------------------
function trim_str_by_chars( $str, $len, $echo = true, $suffix = '...', $encoding = 'UTF-8' ) {
  if ( ! function_exists( 'mb_substr' ) || ! function_exists( 'mb_strlen' ) ) {
    return $str;
  }
  $len = ( int )$len;
  if ( mb_strlen( $str = wp_specialchars_decode( strip_tags( $str ), ENT_QUOTES, $encoding ), $encoding ) > $len ) {
    $str = esc_html( mb_substr( $str, 0, $len, $encoding ) . $suffix );
  }
  if ( $echo ) {
    echo $str;
  } else {
    return $str;
  }
}

//----------------------------------------------
// 固定ページ画像のパスをフルパスから相対へ置換
//----------------------------------------------
function replaceImagePath( $arg ) {
  $content = str_replace( '"images/', '"' . get_bloginfo( 'template_directory' ) . '/images/', $arg );
  return $content;
}
add_action( 'the_content', 'replaceImagePath' );


//----------------------------------------------
// 固定ページのみ自動整形機能を無効化
//----------------------------------------------
function disable_page_wpautop() {
  if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );

//----------------------------------------------
// アーカイブのリンク修正
//----------------------------------------------
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset( $r[ 'post_type' ] ) ) {
    $my_archives_post_type = $r[ 'post_type' ];
    $where = str_replace( '\'post\'', '\'' . $r[ 'post_type' ] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( $my_archives_post_type != '' ) {
    $add_link = '?post_type=' . $my_archives_post_type;
    $link_html = preg_replace( "/href=\'(.+)\'/", "href='$1" . $add_link ."'", $link_html );
  }
  return $link_html;
}



//----------------------------------------------
// 固定ページのビジュアルモード非表示
//----------------------------------------------
//function disable_visual_editor_in_page() {
  //global $typenow;
  //if( $typenow == 'page' ) {
    //add_filter( 'user_can_richedit', 'disable_visual_editor_filter' );
 // }
//}
//function disable_visual_editor_filter() {
  //return false;
//}
//add_action( 'load-post.php', 'disable_visual_editor_in_page' );
//add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );


//----------------------------------------------
// ページネーション
//----------------------------------------------
function my_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="more-btn number">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1).
        "'>&laquo;</a>";
        if ($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1).
        "'>&lsaquo;</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo($paged == $i) ? "".'<p>'.$i.'</p>'.
                "": "<a href='".get_pagenum_link($i).
                "'>".$i.
                '</a>';
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1).
        "'>&rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages).
        "'>&raquo;</a>";
        echo "</div>\n";
    }
}
//----------------------------------------------
// サムネイルサイズ
//----------------------------------------------
/*<?php the_post_thumbnail(); ?>z*/
add_theme_support( 'post-thumbnails' );
// set_post_thumbnail_size( 340, 200, true );


//----------------------------------------------
//スマホ表示分岐
//----------------------------------------------
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser

    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
// 記事1件目
function is_first(){
  global $wp_query;
  return ($wp_query->current_post === 0);
}
//----------------------------------------------
//カスタム投稿にアイキャッチ追加
//----------------------------------------------
register_post_type(
'purchase',
  array(
  // 'supports'に'thumbnail'を追記
  'supports' => array('title','editor','thumbnail')
  )
);

//----------------------------------------------
//ログイン時のみスタイル適用
//----------------------------------------------
add_action('wp_head', 'header_custom');
function header_custom() {
if ( is_user_logged_in() && is_mobile() ):
echo '<style type="text/css">@media (max-width: 768px) { .header_fixed {top: 46px !important;} .mobile_menu {top: 46px !important;} .drawer-menu {margin-top: 46px !important;} html #wpadminbar { position: fixed; }  }</style>';
endif;
}

//----------------------------------------------
//メインクエリの制御
//----------------------------------------------
function custom_main_query( $query ) {
  if ( is_admin() || ! $query->is_main_query() )
    return;
    if ( $query->is_category('useful_information') ) {
      is_mobile() ? $per_page = 15 : $per_page = 20;
      $query->set( 'posts_per_page', $per_page );
      $query->set( 'paged',get_query_var( 'paged' ) );
      return;
    }
    if ( $query->is_tax('buy_category') ) {
      is_mobile() ? $per_page = 15 : $per_page = 20;
      $query->set( 'posts_per_page', $per_page );
      $query->set( 'paged',get_query_var( 'paged' ) );
      return;
    }
    if ( $query->is_tax('buy_tag') ) {
      is_mobile() ? $per_page = 15 : $per_page = 20;
      $query->set( 'posts_per_page', $per_page );
      $query->set( 'paged',get_query_var( 'paged' ) );
      return;
    }
}
add_action( 'pre_get_posts', 'custom_main_query' );

//----------------------------------------------
//カスタム投稿にカテゴリー絞り込み追加
//----------------------------------------------
// add_action( 'restrict_manage_posts', 'refineSearchPosts' );
// // 投稿で絞り込み項目の表示
// function refineSearchPosts() {
// global $typenow;
// $args =array( 'public' => true, '_builtin' => false );
// $post_types = get_post_types($args);
// if ( in_array($typenow, $post_types) ) {
// $filters = get_object_taxonomies($typenow);
// foreach ($filters as $tax_slug) {
// $tax_obj = get_taxonomy($tax_slug);

// // 値が入っているか確認する
// if (isset($_GET[$tax_obj->query_var])){
// $var = $_GET[$tax_obj->query_var];
// }else{
// $var = $tax_obj->query_var;
// }
// wp_dropdown_categories(array(
// 'show_option_all' => __('すべての'.$tax_obj->label ),
// 'taxonomy' => $tax_slug,
// 'name' => $tax_obj->name,
// 'orderby' => 'term_order',
// 'selected' => $var,
// 'hierarchical' => $tax_obj->hierarchical,
// 'show_count' => true, //カテゴリーに属する投稿数の表示
// 'hide_empty' => false, //カテゴリー・タグが存在しなくても項目を表示する（何もない場合空のフォームができてしまうため）
// ));
// }
// }
// }
// // 絞り込み検索内容の変換処理
// add_filter('parse_query','convertRefineContent');
// function convertRefineContent($query) {
// global $pagenow;
// global $typenow;
// if ($pagenow=='edit.php') {
// $filters = get_object_taxonomies($typenow);
// foreach ($filters as $tax_slug) {
// $var =& $query->query_vars[$tax_slug];
// if ( isset($var) && $var>0) {
// $term = get_term_by('id',$var,$tax_slug);
// $var = $term->slug;
// }
// }
// }
// return $query;
// }


//----------------------------------------------
//ウィジェットカスタマイズ
//----------------------------------------------
////新規ウィジェットエリアを追加
register_sidebar(array(
     'name' => 'メインスライド' ,
     'id' => 'top_slide' ,
     'description' => '画像サイズ w800px h400px ※タイトルを非表示にするには先頭に「!」を入力',
     'before_widget' => '<li class="slide">',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => 'カルーセル' ,
     'id' => 'top_carousel' ,
     'description' => '画像サイズ w250px h100px ※タイトルを非表示にするには先頭に「!」を入力',
     'before_widget' => '<li>',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => '買取方法' ,
     'id' => 'way_list' ,
     'description' => '画像サイズ w265px ※タイトルを非表示にするには先頭に「!」を入力',
     'before_widget' => '<li>',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => '広告バナーなど' ,
     'id' => 'banner_list' ,
     'description' => '画像サイズ w265px ※タイトルを非表示にするには先頭に「!」を入力',
     'before_widget' => '<li>',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));

//----------------------------------------------
//image-widget　ウィジェットのタイトルを消す
//----------------------------------------------
add_filter( 'widget_title', 'remove_widget_title' );
function remove_widget_title( $widget_title ) {
  if ( substr ( $widget_title, 0, 1 ) == '!' )
    return;
  else
    return ( $widget_title );
}

//----------------------------------------------
//image-widget スタイルとクラスを無効化
//----------------------------------------------

if (function_exists('tribe_load_image_widget') && !is_admin()) {
  add_filter ('image_widget_image_attributes',function($attr,$instance){
    $attr['style'] = '';
    $attr['class'] = '';
    return $attr;
  },10,2);
  add_filter ('image_widget_link_attributes',function($attr,$instance){
    $attr['style'] = '';
    if(strpos($attr['href'],'www.youtube.com/watch') !== false) {
      $attr['class'] = 'popup-iframe';
    } else {
      $attr['class'] = '';
    }
    return $attr;
  },10,2);
}


//----------------------------------------------
//カテゴリー選択を１つに制限
//----------------------------------------------

//----------------------------------------------
//固定ページでphpファイルをインクルード
//----------------------------------------------
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}

add_shortcode('myphp', 'Include_my_php');

/**
 * 画像・サイトURLショートコード
 */
function fn_image() {
    $path = get_stylesheet_directory_uri();
    // $dir  = '/common/img/';
    $dir  = '/common/img/';
    return $path.$dir;
}
add_shortcode('image','fn_image');

function fn_url() {
    $path = get_site_url();
    return $path.'/';
}
add_shortcode('url','fn_url');

/**
 * 固定ページタイトルショートコード
 */
function fn_title() {
    return get_the_title();
}
add_shortcode('title','fn_title');



//----------------------------------------------
//一覧でタグの表示をなくす
//
//使用方法：http://nelog.jp/get_the_custom_excerpt
function get_the_custom_excerpt($content, $length) {
  $length = ($length ? $length : 70);//デフォルトの長さを指定する
  $content =  preg_replace('/<!--more-->.+/is',"",$content); //moreタグ以降削除
  $content =  preg_replace('/^.*画像出典.*$/um',"",$content); //moreタグ以降削除
  $content =  strip_shortcodes($content);//ショートコード削除
  $content =  strip_tags($content);//タグの除去
  $content =  str_replace("&nbsp;","",$content);//特殊文字の削除（今回はスペースのみ）
  $content =  mb_substr($content,0,$length);//文字列を指定した長さで切り取る
  return $content;
}

// 検索フォーム
function custom_search($search, $wp_query) {
    global $wpdb;

    //サーチページ以外だったら終了
    if (!$wp_query->is_search)
        return $search;
    if (!isset($wp_query->query_vars))
        return $search;

    // ユーザー名とか、タグ名・カテゴリ名も検索対象に
    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if ( count($search_words) > 0 ) {
        $search = '';
        foreach ( $search_words as $word ) {
            if ( !empty($word) ) {
                $search_word = $wpdb->escape("%{$word}%");
                $search .= " AND (
 {$wpdb->posts}.post_title LIKE '{$search_word}'
 OR {$wpdb->posts}.post_content LIKE '{$search_word}'
 OR {$wpdb->posts}.ID IN (
   SELECT distinct r.object_id
   FROM {$wpdb->term_relationships} AS r
   INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
   INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
   WHERE t.name LIKE '{$search_word}'
     OR t.slug LIKE '{$search_word}'
     OR tt.description LIKE '{$search_word}'
   )
) ";

            }
        }
    }


    return $search;
}
function assets_cdn_url($path){
    $assets_global_cdn_domain = "//assets-home.kaitorimakxas.com/wp-content/themes/makxas/";
    return $assets_global_cdn_domain.$path;
}

add_filter('posts_search','custom_search', 10, 2);

// 共有ボタンの位置を変更
if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 );
if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 );
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( $scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery-migrate');
    }
}



?>
