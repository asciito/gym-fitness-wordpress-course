<?php

if ( ! defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget {

    function __construct()
    {
        parent::__construct(
            'gymfitness_widget',
            esc_html__( 'GymFitness Clases', 'gymfitness' ),
            [ 'description' => esc_html__( 'Agrega las Clases como Widget', 'gymfitness' ) ]
        );
    }

    public function widget( $args, $instance )
    {
        $args = [
            'post_type'      => 'gymfitness_clases',
            'posts_per_page' => (int) $instance['cantidad'],
            'order'          => 'ASC',
            'orderby'        => 'title',
        ];

        $clases = new WP_Query($args);

        echo '<ul class="clases-sidebar">';

        while ( $clases->have_posts() ): $clases->the_post(); ?>
            <li>
                <div class="imagen">
                    <? the_post_thumbnail('thumbnail'); ?>
                </div>

                <div class="contenido-clase">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title() ?></h3>
                    </a>

                    <?php
                        $horario     = get_field('horario');
                        $hora_inicio = $horario['hora_inicio'];
                        $hora_fin    = $horario['hora_fin'];
                    ?>

                    <p>
                        <? the_field('dias_clase'); ?> - <?= $hora_inicio . " a " . $hora_fin; ?>
                    </p>
                </div>
            </li>
        <? endwhile; wp_reset_postdata();

        echo '</ul>';
    }

    public function form( $instance ): void
    {
        $id       = esc_attr($this->get_field_id('cantidad'));
        $name     = esc_attr($this->get_field_name('cantidad'));
        $cantidad = $instance['cantidad'] ? esc_attr($instance['cantidad']) : 0;

        ?>

        <div style="padding: 1rem 0">
            <label for="<?= $id ?>">
                <? esc_attr_e('¿Cuántas clases deseas mostrar?'); ?>
            </label>

            <input
                id="<?= $id ?>"
                name="<?= $name ?>"
                type="number"
                value="<?= $cantidad ?>"
                class="widefat" style="margin-top: .5rem">
        </div>

        <?php
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = [];

        $instance['cantidad'] = $new_instance['cantidad'] ? sanitize_text_field($new_instance['cantidad']) : '';

        return $instance;
    }
}

function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_Widget' );
}

add_action( 'widgets_init', 'gymfitness_registrar_widget' );