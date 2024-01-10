<?php get_header(); ?>

<main class="container section">
    <?php get_template_part('template-parts/post'); ?>

    <div class="comments">
        <?php comment_form(); ?>

        <h3 class="text-center" style="margin-top: 4rem">comments</h3>

        <ul class="comment-lists">
            <?php
                $comments = get_comments([
                    'post_id' => $post->ID,
                    'status' => 'approve'
                ]);

                wp_list_comments([
                    'per_page' => 10,
                    'reverse_top_level' => false,
                ], $comments)
            ?>
        </ul>
    </div>
</main>

<?php get_footer(); ?>
