<?php

get_header('secondary');

if (have_posts()) :
	while (have_posts()) : the_post();
		?>

		<section class="page-content">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

		</section>

	<?php
	endwhile;
endif;

get_footer();
