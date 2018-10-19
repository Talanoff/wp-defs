<?php

get_header('secondary');

if (have_posts()) :
	while (have_posts()) : the_post();
		?>

        <section class="page-content">
            <div class="container">

                <h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

                <table class="table">
					<?php
					$skills = get_field('skills');

					foreach ($skills as $skill) :
						?>

                        <tr>
                            <td>
                                <img src="<?= $skill['icon'] ?>" style="width: 200px;" alt="">
                            </td>
                            <td>
                                <h3><?= $skill['title'] ?></h3>
                            </td>
                            <td>
								<?= $skill['description'] ?>
                            </td>
                        </tr>

					<?php endforeach; ?>
                </table>

            </div>
        </section>

	<?php
	endwhile;
endif;

get_footer();
