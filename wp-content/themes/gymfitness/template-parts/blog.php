<li class="card">
    <?php the_category(); ?>

    <?php the_post_thumbnail('full'); ?>

    <div class="content">
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title() ?></h3>
        </a>

        <p class="meta">
            <span>Por:</span>

            <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?= get_the_author_meta('display_name') ?>
            </a>
        </p>

        <p class="meta">
            <span>Fecha:</span>

            <?php the_time( get_option('date_format') ); ?>
        </p>
    </div>
</li>