<?php
foreach ($args ?? [] as $key => $value) {
    $$key = $value;
}
?>

<ul class="grid-list instructores">
    <?php
    $args = [
        'post_type' => 'instructores',
        'posts_per_page' => $cantidad ?? -1,
    ];

    $instructores = new WP_Query($args);
    ?>

    <?php while($instructores->have_posts()): $instructores->the_post(); ?>
        <li class="instructor">
            <?php the_post_thumbnail('large'); ?>

            <div class="content text-center">
                <h3 class=""><?= get_the_title() ?></h3>

                <?php the_content(); ?>

                <div class="specialties">
                    <?php foreach( get_field('specialties') as $especialidad ): ?>
                        <span class="tag"><?= esc_html( $especialidad ); ?></span class="tag">
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
