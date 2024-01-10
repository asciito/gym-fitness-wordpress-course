<?php get_header(); ?>

<section class="bienvenida section container text-center">
    <h2 class="text-primary"><?php the_field('encabezado_bienvenida') ?></h2>

    <p><?php the_field('texto_bienvenida'); ?></p>
</section>

<section class="areas">
    <?php foreach (range(1, 4) as $i): ?>
        <?php $area = get_field("area_$i") ?>

        <div class="area">
            <img src="<?php echo esc_attr( $area['imagen']['sizes']['medium_large'] ); ?>" alt="Imagen área <?= $i ?>" class="area-img">

            <p><?= esc_html( $area['texto'] ); ?></p>
        </div>
    <?php endforeach; ?>
</section>

<main class="container section">
    <h2 class="text-center text-primary">Nuestras clases</h2>

    <?php get_template_part('template-parts/listado-clases', args: ['cantidad' => 4]) ?>

    <div class="flex justify-end" style="margin-top: 2rem">
        <a class="btn btn-primary" href="<?= get_permalink( get_page_by_path('clases') ) ?>">Ver todas las clases</a>
    </div>
</main>

<section class="container section instructores">
    <h2 class="text-center text-primary">Nuestros instructores</h2>

    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi necessitatibus, nihil non tenetur? Ipsam, sed.</p>

    <?php get_template_part('template-parts/listado-instructores') ?>
</section>

<section class="testimonials">
    <h2 class="text-center text-white">Testimoniales</h2>

    <div class="testimonial-container">
        <?php get_template_part('template-parts/listado-testimoniales') ?>
    </div>
</section>

<section class="container section">
    <h2 class="text-primary text-center">Nuestro Blog</h2>

    <p class="text-center">Aprende de nuestros instructores expertos</p>

    <?php
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 4,
    ];

    $blog = new WP_Query($args);
    ?>

    <ul class="grid-list">
        <?php while ( $blog->have_posts() ): $blog->the_post(); ?>
            <?php get_template_part('template-parts/blog'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</section>

<?php get_footer(); ?>
