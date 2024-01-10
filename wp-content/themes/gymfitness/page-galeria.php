<?php
/**
 * Template Name: Galería
 */

$galeria = get_post_gallery( get_the_ID(), html: false );
$galeria_imagenes = explode(',', $galeria['ids']);
?>

<?php get_header(); ?>

    <main class="contenedor seccion">
        <?php the_title('<h1 class="text-center text-primary">', '</h1>'); ?>

        <ul class="galeria-imagenes">
            <?php
            foreach ($galeria_imagenes as $id) :
                $imagen = wp_get_attachment_image_src($id, 'mediano')[0];
                $imagen_full = wp_get_attachment_image_src($id, 'full')[0];
            ?>
                <li>
                    <a href="<?php echo $imagen_full; ?>" data-lightbox="galeria">
                        <img src="<?php echo $imagen; ?>" alt="imagen galeria">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

<?php get_footer(); ?>
