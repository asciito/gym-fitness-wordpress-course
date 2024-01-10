<?php
foreach ($args ?? [] as $key => $value) {
    $$key = $value;
}
?>

<ul class="listado-grid">
    <?php
    $args = [
        'post_type' => 'gymfitness_clases',
        'posts_per_page' => $cantidad ?? -1,
    ];

    $clases = new WP_Query($args);
    ?>

    <?php while($clases->have_posts()): $clases->the_post(); ?>
        <li class="card">
            <?php the_post_thumbnail('full'); ?>

            <div class="contenido">
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title() ?></h3>
                </a>

                <?php
                $horario     = get_field('horario');
                $hora_inicio = $horario['hora_inicio'];
                $hora_fin    = $horario['hora_fin'];
                ?>

                <p>
                    <?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?>
                </p>
            </div>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
