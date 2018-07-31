<?php
$post = $wp_query->post;
if ( in_category('99') ) {
include(TEMPLATEPATH.'/single_popular.php');
} else {
include(TEMPLATEPATH.'/single_base.php');
}
?>
