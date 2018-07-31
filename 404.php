<!-- 404.php -->
<?php get_header();?>

<!--breadcrumb-->
<!--contents_wrap-->
	<main class="main" role="main">
		<!--page_title-->
		<div class="page_404">
		<h2 class="page_title_02">指定されたページは存在しませんでした。</h2>
		<p>このページの URL ： <span class="error_msg"> http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
			</span></p>
		<p>現在表示する記事がありません。</p>
		<p>
			<a href="<?php echo home_url(); ?>">
				トップページへ戻る
			</a>
		</p>
		</div>
		<!--sec_cta-->
		<?php include('include/sec_cta.php');?>
		
	</main>
<!-- / #main_contents -->
<!-- / #contents_wrap .container -->

<?php get_footer();?>
