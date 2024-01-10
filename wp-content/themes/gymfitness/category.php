<?php
get_header();

$categoria = get_queried_object();
?>

<main class="container section">
    <h2 class="text-center">
        <span>Categoría:</span>

        <span class="text-primary">
            <?= $categoria->name?>
        </span>
    </h2>

    <ul class="grid-list">
        <?php while ( have_posts() ): the_post(); ?>
            <?php get_template_part('template-parts/blog'); ?>
        <?php endwhile; ?>
    </ul>
</main>

<?php get_footer(); ?>
