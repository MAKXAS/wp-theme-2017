	<?php
				// カスタム分類名
				$taxonomy = 'buy_category';
				// パラメータ
				$args = array(
					'parent' => 0, // 親タームのみ取得
					'hide_empty' => false, // 投稿記事がないタームも取得
				);
				// カスタム分類のタームのリストを取得
				$terms = get_terms( $taxonomy , $args );
				if ( count( $terms ) != 0 ):
					 foreach ( $terms as $term ): // 親タームのリスト $terms を $term に格納してループ 
					
					// 親タームのURLを取得
					$term = sanitize_term( $term, $taxonomy );
					$term_link = get_term_link( $term, $taxonomy );
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
					//　親タームの画像url取得
					$term_image_id = get_field('term_image','buy_category_'.$term->term_id);
					$term_image = wp_get_attachment_image_src($term_image_id, 'thumbnail');
					$term_image_url = $term_image[0];
			?>
			<li>
		<a href="<?php echo esc_url( $term_link ); ?>/">
			<?php echo $term->name;?>
			</dl>
		</a>
	</li>
	<?php endforeach; ?>
	<?php endif;?>
<!-- / .list -->