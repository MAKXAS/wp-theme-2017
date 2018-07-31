        <?php 
        $customer_voice_name = get_sub_field('customer_voice_name');
        $customer_voice_thungs = get_sub_field('customer_voice_thungs');
        $customer_voice_price = get_sub_field('customer_voice_price');
        $customer_voice_coment = get_sub_field('customer_voice_coment');
        $buyer_name = get_sub_field('buyer_name');
        $buyer_voice_coment = get_sub_field('buyer_voice_coment');?>
  <!-- voice -->
<div class="voice-section">
<dl>
<dt>
          <?php echo $customer_voice_thungs;?>
          <?php if($customer_voice_name){echo $customer_voice_name;}?>さん 
          <?php if($customer_voice_price){echo $customer_voice_price;}?>円</dt>
          <dd><?php if($customer_voice_coment){echo $customer_voice_coment;}?></dd>
<dd class="voice-staff">
<strong>鑑定士: <?php if($buyer_name){echo $buyer_name;}?></strong>
<div><?php if($buyer_voice_coment){echo $buyer_voice_coment;}?>
<?php $img = get_sub_field('buyer_img');
$imgurl = wp_get_attachment_image_src($img, 'full'); //サイズは自由に変更してね
if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="">
<? }?>
</div></dd>
</dl>
</div>