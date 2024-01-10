<?php

the_title('<h1 class="text-center text-primary">', '</h1>');

if ( has_post_thumbnail() ) {
    the_post_thumbnail('full', ['class' => 'imagen-destacada']);
}

$horario     = get_field('horario');
$hora_inicio = $horario['hora_inicio'];
$hora_fin    = $horario['hora_fin'];

?>

<p class="informacion-clase text-center">
    <?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?>
</p>

<?php the_content(); ?>