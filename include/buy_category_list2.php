
	<?php if($term->slug != 'pickup'):?>
		<a href="<?php echo esc_url( $term_link ); ?>/">
		<dl class="medium-4 small-6 columns">
		<dt class="category-img">
					<?php if(empty($term_image_id)): ?>
					<?php $imgurl = wp_get_attachment_image_src($term_image_id, 'full');?>
					<img src="<? echo $imgurl[0]; ?>" alt="">
					<?php else:?>
					<?php $imgurl = wp_get_attachment_image_src($term_image_id, 'full');?>
					<img src="<? echo $imgurl[0]; ?>" alt="">
				<?php endif;?>
					</dt>
					<dd><span class="category-title">
					<?php echo $term->name;?></span>
					<span class="category-txt hide-for-small-only">
					<?php echo $term_detail_txt;?>
					</span></dd>
		</dl></a>
	<?php endif;?>
	<?php endforeach; ?>
	<?php endif;?>