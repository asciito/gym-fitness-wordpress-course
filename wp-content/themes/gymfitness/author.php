<?php
get_header();

$autor = get_queried_object();
$autor_meta = get_the_author_meta('user_description', $autor->ID);
?>

    <main class="container section">
        <h2 class="text-center">
            <span>Autor:</span>

            <span class="text-primary">
                <?= $autor->display_name?>
            </span>
        </h2>

        <p class="text-center">
            <?= $autor_meta ?>
        </p>

        <ul class="grid-list">
            <?php while ( have_posts() ): the_post(); ?>
                <?php get_template_part('template-parts/blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

<?php get_footer(); ?>
