<?php
/**
 * Template Name: Listado de Clases
 */
?>

<?php get_header(); ?>

<main class="contenedor seccion">
    <?php
    the_title('<h1 class="text-center text-primary">', '</h1>');

    the_content();
    ?>

    <?php get_template_part('template-parts/listado-clases') ?>
</main>

<?php get_footer(); ?>
