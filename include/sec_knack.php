<section id="sec_knack_01">
	<h2 class="title_01 rem-bottom-mg-10">大公開！高価買取のコツ教えます</h2>
	<div class="default_post_list_01">
		<?php
								$args = array(
								'category_name' => 'column',
								'posts_per_page' => 9,
								'paged' => $paged,
								);
								$loop = new WP_Query( $args );
								if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
							?>
		<?php if($loop->current_post === 0):?>
		<!--item-->
		<article class="item">
			<a href="<?php the_permalink() ?>">
				<dl>
					<?php if ( has_post_thumbnail() ): ?>
					<?php
								$thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
								$img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );//画像内容を取得
								$thumb_path = $img[0]
							?>
					<dt class="image">
						<figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat"></figure>
					</dt>
					<?php else:?>
					<dt class="image">
						<figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat"></figure>
					</dt>
					<?php endif;?>
					<dd class="text">
						<h3 class="date">
							<?php the_modified_date('Y/m/d') ?>
						</h3>
						<p class="title">
							<?php trim_str_by_chars( get_the_title(), 35 ); ?>
						</p>
						<p class="description"><?php echo mb_substr(strip_tags($post-> post_content),0,100); ?></p>
					</dd>
				</dl>
			</a>
		</article>
		<?php else:?>
		<!--item-->
		<article class="item">
			<a href="<?php the_permalink() ?>">
				<dl>
					<?php if ( has_post_thumbnail() ): ?>
					<?php
												$thumbnail_id = get_post_thumbnail_id();// アイキャッチ画像のIDを取得
												$img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );//画像内容を取得
												$thumb_path = $img[0]
												?>
					<dt class="image">
						<figure style="background: url(<?php echo $thumb_path; ?>) center center no-repeat"></figure>
					</dt>
					<?php else:?>
					<dt class="image">
						<figure style="background: url(<?php echo get_stylesheet_directory_uri() ?>/images/top/no_image.jpg) center center no-repeat"></figure>
					</dt>
					<?php endif;?>
					<dd class="text">
						<h3 class="date">
							<?php the_time('Y.m.d'); ?>
						</h3>
						<p class="title">
							<?php trim_str_by_chars( get_the_title(), 35 ); ?>
						</p>
					</dd>
				</dl>
			</a>
		</article>
		<?php endif;?>
		<?php endwhile; ?>
		<?php else : ?>
		<article>現在、投稿はありません。</article>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<!-- / .buy_item_list_01 -->
	
	<p class="anchor_01">
		<a href="<?php bloginfo('url'); ?>/category/column">
			<i class="fa fa-play-circle" aria-hidden="true"></i>もっと見る
		</a>
	</p>
</section>
<!-- / #sec_knack_01 -->