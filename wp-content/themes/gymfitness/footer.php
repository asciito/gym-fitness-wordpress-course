    <footer class="footer contenedor">
        <hr>

        <div class="contenido-footer">
            <?php
                $args = array(
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal'
                );

                wp_nav_menu($args);
            ?>

            <p class="copyrights">Todos los derechos severvados. GymFitness <?php echo get_bloginfo('name') . ' ' . wp_date('Y') ?></p>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
