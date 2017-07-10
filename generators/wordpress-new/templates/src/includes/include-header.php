<?php
	$logo = ot_get_option( 'logo' );
?>

<header class="header">
	<div class="container">

<!-- LOGO start -->

		<?php if ( $logo ) : ?>
			<div class="header__logo">
				<a href="/">
					<img src="<?php echo $logo; ?>" alt="" />
				</a>
			</div>
		<?php endif; ?>

<!-- LOGO end -->

	</div>
</header>