<?php
foreach ($args ?? [] as $key => $value) {
    $$key = $value;
}
?>

<ul class="listado-testimoniales swiper-wrapper">
    <?php
    $args = [
        'post_type' => 'testimoniales',
        'posts_per_page' => $cantidad ?? -1,
    ];

    $testimoniales = new WP_Query($args);
    ?>

    <?php while($testimoniales->have_posts()): $testimoniales->the_post(); ?>
        <li class="testimonial swiper-slide">
            <blockquote>
                <?php the_content(); ?>
            </blockquote>

            <footer class="testimonial-footer">
                <?php the_post_thumbnail('thumbnail'); ?>

                <p><?php the_title() ?></p>
            </footer>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
