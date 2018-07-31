<?php get_header(); the_post();?>

<!--breadcrumb-->
<div class="breadcrumbs">
	<div class="container">
		<?php if(function_exists('bcn_display')) { bcn_display(); }?>
	</div>
</div>
test
<!--contents_wrap-->
<div id="contents_wrap" class="container">
	<!--main_contents-------------------------------------------------------------------------------------------->
	<main role="main" id="main_contents">
		
		<!--page_title-->
		<h2 class="page_title_02"><?php the_title(); ?></h2>
		
		<!--content-->
		<?php the_content(); ?>
		
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
		
	</main>
	<!-- / #main_contents -->
	
	<?php get_sidebar();?>
</div>
<!-- / #contents_wrap .container -->

<?php get_footer();?>
