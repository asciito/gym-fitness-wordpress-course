<?php
foreach ($args ?? [] as $key => $value) {
    $$key = $value;
}
?>

<ul class="listado-grid instructores">
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

            <div class="contenido text-center">
                <h3 class=""><?= get_the_title() ?></h3>

                <?php the_content(); ?>

                <div class="especialidades">
                    <?php foreach( get_field('especialidades') as $especialidad ): ?>
                        <span class="etiqueta"><?= esc_html( $especialidad ); ?></span class="etiqueta">
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
