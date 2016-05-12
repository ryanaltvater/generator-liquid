<?php
/**
 * Template Name: Custom &raquo; Home
 */

get_header(); ?>

<!-- MAIN start -->

		<main class="main">
			<div class="container">

<!-- CONTENT start -->

				<?php
					$contentPath = TEMPLATEPATH . '/includes/include-content.php';

					if ( file_exists( $contentPath ) ) {
						include( $contentPath );
					}
				?>

<!-- CONTENT end -->

			</div>
		</main>

<!-- MAIN end -->

<?php get_footer(); ?>