<?php
/**
 * The Header for the theme
 */
?>

<?php
	$favicon144x144 = ot_get_option( 'favicon_144x144' );
	$favicon114x114 = ot_get_option( 'favicon_114x114' );
	$favicon72x72 = ot_get_option( 'favicon_72x72' );
	$favicon57x57 = ot_get_option( 'favicon_57x57' );

	$googleAnalytics = ot_get_option( 'google_analytics' );
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
	        	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $favicon144x144; ?>">
	        <?php endif; ?>
			<?php if ( $favicon114x114 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $favicon114x114; ?>">
	        <?php endif; ?>
			<?php if ( $favicon72x72 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $favicon72x72; ?>">
	        <?php endif; ?>
			<?php if ( $favicon57x57 ) : ?>
	        	<link rel="apple-touch-icon-precomposed" href="<?php echo $favicon57x57; ?>">
				<link rel="shortcut icon" href="<?php echo $favicon57x57; ?>">
	        <?php endif; ?>
		<?php endif; ?>

<!-- ICONS end -->

<!-- FONTS | STYLESHEETS | LIBRARIES start -->

		<?php wp_head(); ?>

		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery.min.js"><\/script>')</script>

<!-- FONTS | STYLESHEETS | LIBRARIES end -->

<!-- ANALYTICS start -->

		<?php if ( $googleAnalytics ) : ?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo $googleAnalytics; ?>', 'auto');
				ga('send', 'pageview');
			</script>
		<?php endif; ?>

<!-- ANALYTICS end -->

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