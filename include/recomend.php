<div>
<?php query_posts('category_name=recomend&posts_per_page=3'); ?>
    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!--item-->
        <dl>
          <a href="<?php the_permalink() ?>" class="link-news"></a>
              <?php if ( has_post_thumbnail() ): ?>
              <?php
                $thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
                $img = wp_get_attachment_image_src( $thumbnail_id , 'full' );//画像内容を取得
                $thumb_path = $img[0]
              ?>
              <dt>
                <figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat"></figure>
              </dt>
              <?php else:?>
              <dt>
                <figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat"></figure>
              </dt>
              <?php endif;?>                
                <dd><strong class="news-title">
                  <?php trim_str_by_chars( get_the_title(), 35 ); ?></strong>
                  
          <div class="news-date"><?php the_time('Y/m/d'); ?></div>
          </dd>
          </dl>
        <?php endwhile; ?>
        <?php else : ?>
        <article>現在、投稿はありません。</article>
        <?php endif; ?>
        </div>