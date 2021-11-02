<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->
<?php echo '<script type="text/javascript">
      var ajaxurl = "'.get_bloginfo('url').'/wp-admin/admin-ajax.php";
      var base_url = "'.get_template_directory_uri().'";
    </script>'; ?>
	<?php
	  do_action('get_header');
	  get_template_part('templates/header');
	?>
	<main>
	<?php include roots_template_path(); ?>
	</main>
	<?php get_template_part('templates/footer'); ?>
</body>
</html>
