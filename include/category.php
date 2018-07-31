<?php
$cat = get_the_category(); // 情報取得
$catId = $cat[0]->cat_ID; // ID取得
$catName = $cat[0]->name; // 名称取得
$catSlug = $cat[0]->category_nicename; // スラッグ取得
?>
<?php
  for ($i = 0; $i < count($cat); ++$i) {
    $catID = $cat[$i]->cat_ID;
    $catID2 = floor( $catID / 10 );
	$link = get_category_link($catID); // リンクURL取得
  echo '<span class="cg-'.$catID2.'"><a href="'.$link.'"><span>'.$cat[$i]->cat_name.'</span></a></span>';
}?>