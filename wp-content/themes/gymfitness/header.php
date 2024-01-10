<?php
$body_classes = get_body_class();

if ( is_front_page() ) {
    $hero_image = get_field('hero_imagen');
}
?>

<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body class="<?= implode(' ', $body_classes); ?>" style="--hero-image: url(<?= $hero_image ?? '' ?>)">
<header class="header">
    <div class="container navbar">
        <a href="<?= site_url('/') ?>" class="logo">
            <img class="logo" src="<?php echo get_template_directory_uri().'/images/logo.svg' ?> " alt="">
        </a>

        <div class="burger-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64" height="64" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </div>

        <div class="menu-container">
            <?php
            $args = [
                'theme_location' => 'menu-principal',
                'container' => 'nav',
                'container_class' => 'primary-menu',
            ];

            wp_nav_menu($args);
            ?>
        </div>
    </div>

    <?php if (is_front_page()): ?>
        <div class="tagline text-center container">
            <h1 class="ml2"><?php the_field('hero_heading'); ?></h1>

            <p><?php the_field('hero_texto'); ?></p>
        </div>
    <?php endif; ?>
</header>
