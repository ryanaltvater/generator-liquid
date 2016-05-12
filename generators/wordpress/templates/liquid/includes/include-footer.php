<?php
	$company = get_field( 'company', 'option' );
?>

		<footer class="footer">
			<div class="container">
				<div class="copyright">
					<p>Copyright &copy; <span class="copyright__year"><?php echo date( 'Y' ); ?></span> <?php if ( $company ) : ?><span class="copyright__company"><?php echo $company; ?></span><?php endif; ?>. All rights reserved.</p>
				</div>
			</div>
		</footer>