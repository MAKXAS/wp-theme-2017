<section id="sec_pickup">
	<h2 class="title_01 rem-bottom-mg-10">買取強化アイテム</h2>
	<div class="buy_item_list_01">
		<?php
					$args = array(
						'tax_query' => array(
							array (
							'taxonomy' => 'buy_tag',
							'field' => 'slug',
							'terms' => 'pickup',
							),
						),
						'post_type' => 'buy',
						'posts_per_page' => 8,
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
					?>
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
						<h3 class="name">
							<?php trim_str_by_chars( get_the_title(), 35 ); ?>
						</h3>
						<p class="description"><?php echo mb_substr(strip_tags($post-> post_content),0,100); ?></p>
						<p class="anchor">詳細を見る</p>
					</dd>
				</dl>
			</a>
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		  <!--コンテンツが無い時の表示--> 
		 
		<article>現在、投稿はありません。</article>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<!-- / .buy_item_list_01 -->
	
	<p class="anchor_01">
		<a href="<?php bloginfo('url'); ?>/buy_tag/pickup">
			<i class="fa fa-play-circle" aria-hidden="true"></i>もっと見る
		</a>
	</p>
	
</section>
