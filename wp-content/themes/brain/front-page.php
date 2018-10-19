<?php

get_header();

$args = [
	'post_type' => 'team',
	'posts_per_page' => 5,
	'orderby' => 'date',
	'order' => 'desc',
];

if (!empty($_GET['team_type'])) {
	$args = array_merge($args, [
		'tax_query' => [
			[
				'taxonomy' => 'members',
				'field' => 'slug',
				'terms' => $_GET['team_type'],
			],
		],
	]);
}

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <section id="news" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
					<?php
					$team_types = get_terms([
						'taxonomy' => 'members',
						'hide_empty' => true,
					]);
					?>

                    <form action="" method="get">
                        <select name="team_type" class="form-control">
							<?php foreach ($team_types as $type) : ?>
                                <option value="<?= $type->slug ?>"<?= $type->slug === $_GET['team_type'] ? ' selected' : '' ?>>
									<?= $type->name; ?>
                                </option>
							<?php endforeach; ?>
                        </select>

                        <button>Sort</button>
                    </form>
                </div>
            </div>

            <div class="row">
				<?php while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    <a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>

                            <div class="card-body">
                                <p>
                                    <!--                                <img src="-->
									<?php //the_post_thumbnail_url('thumbnail') ?><!--" alt="">-->
									<?php the_post_thumbnail('thumb', ['class' => 'ggg jjj kkk']); ?>
                                </p>

                                <p class="mb-0">
									<?= wp_trim_words(get_the_content(), 10, '...'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

				<?php endwhile; ?>
            </div>
        </div>
    </section>

<?php

endif;

wp_reset_postdata();

get_footer(); ?>
