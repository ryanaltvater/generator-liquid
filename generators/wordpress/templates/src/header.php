<?php
/**
 * The Header for the theme
 */
?>

<?php
	$favicon144x144 = get_field( 'favicon_144x144', 'option' );
	$favicon114x114 = get_field( 'favicon_114x114', 'option' );
	$favicon72x72 = get_field( 'favicon_72x72', 'option' );
	$favicon57x57 = get_field( 'favicon_57x57', 'option' );

	$googleAnalytics = get_field( 'google_analytics', 'option' );
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- ICONS start -->

		<?php if ( $favicon144x144 || $favicon114x114 || $favicon72x72 || $favicon57x57 ) : ?>
			<?php if ( $favicon144x144 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $favicon144x144['url']; ?>">
	        <?php endif; ?>
			<?php if ( $favicon114x114 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $favicon114x114['url']; ?>">
	        <?php endif; ?>
			<?php if ( $favicon72x72 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $favicon72x72['url']; ?>">
	        <?php endif; ?>
			<?php if ( $favicon57x57 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" href="<?php echo $favicon57x57['url']; ?>">
				<link rel="shortcut icon" href="<?php echo $favicon57x57['url']; ?>">
	        <?php endif; ?>
		<?php endif; ?>

<!-- ICONS end -->

<!-- FONTS | STYLESHEETS | LIBRARIES start -->

		<?php wp_head(); ?>

		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery.min.js"><\/script>')</script>

<!-- FONTS | STYLESHEETS | LIBRARIES end -->

<!-- GOOGLE ANALYTICS start -->

		<?php if ( $googleAnalytics ) : ?>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', '<?php echo $googleAnalytics; ?>']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php endif; ?>

<!-- GOOGLE ANALYTICS end -->
	</head>

	<body <?php echo body_class(); ?>>

<!-- HEADER start -->

		<?php
			$headerPath = TEMPLATEPATH . '/includes/include-header.php';

			if ( file_exists( $headerPath ) ) {
				include( $headerPath );
			}
		?>

<!-- HEADER end -->

<!-- NAVIGATION start -->

		<?php
			$navigationPath = TEMPLATEPATH . '/includes/include-navigation.php';

			if ( file_exists( $navigationPath ) ) {
				include( $navigationPath );
			}
		?>

<!-- NAVIGATION end -->