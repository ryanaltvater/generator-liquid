				<section class="content">
					<h1>Headline</h1>

					<h2>Headline</h2>

					<h3>Headline</h3>

					<h4>Headline</h4>

					<h5>Headline</h5>

					<h6>Headline</h6>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<p>
						<strong>Lorem ipsum dolor sit amet</strong>
						<br />
						<em>Lorem ipsum dolor sit amet</em>
						<br />
						<u>Lorem ipsum dolor sit amet</u>
						<br />
						<a href="#">Lorem ipsum dolor sit amet</a>
					</p>

					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>1</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>2</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>3</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>4</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>5</sup></li>
					</ul>

					<ol>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>6</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>7</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>8</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>9</sup></li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit<sup>10</sup></li>
					</ol>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</section>