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
          'post_html' => '<dl><a href="{url}"></a><dt>
          <figure>{thumb_img}</figure></dt><dd><strong class="news-title">{text_title}</strong>
      <div class="news-date">{date}</div></dd></dl>',
     );
     wpp_get_mostpopular($arg);
} ?>
