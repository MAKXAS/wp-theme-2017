        <?php 
        $goods_section1 = get_sub_field('goods-section1','buy_category_'.$obj->term_id);
        $price = get_sub_field('price-goods-section4','buy_category_'.$obj->term_id);
        $area_goods = get_sub_field('area-goods-section5','buy_category_'.$obj->term_id);
        $link_goods = get_sub_field('link-goods-section6','buy_category_'.$obj->term_id);
        ?>

        <?php if($link_goods){?>
        <a href='<?php echo $link_goods; ?>'><? }?>
	      <dl class="medium-4 small-6 columns">
        
	        <dt class="goods-section1"><?php if($goods_section1){echo $goods_section1;}?></dt>
	        <dd class="goods-section2">
	        <?php $img = get_sub_field('img_goods-section2','buy_category_'.$obj->cat_ID);
			$imgurl = wp_get_attachment_image_src($img, 'full'); 
			if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="">
			<? }?></dd>
          <dd class="goods-section3"><?php if($goods_section1){echo $goods_section1;}?></dd>
          <dd class="goods-section4">買取金額:<span class="price"><strong><?php if($price){echo number_format($price);}?></strong>円</span></dd>
          <dd class="goods-section5"><?php if($area_goods){echo $area_goods;}?>のお客様</dd>
	      </dl><?php if($link_goods){?>
        </a><? }?>