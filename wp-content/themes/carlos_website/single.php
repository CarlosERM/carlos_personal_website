<?php get_header(); ?>
<section class='ponto-article'>
    <div class='d-flex flex-column gap-3'>
        <div class='d-flex justify-content-center align-items-center gap-3'>
            <?php
            $post_tags = get_the_tags();
            if ( $post_tags && isset( $post_tags[0] ) ) { ?>
            <span class="tag-post">
                <?php echo esc_html( $post_tags[0]->name ); ?>
            </span>
            <?php
            }
        ?>
            <p class='m-0 article-date'>
                <?php echo get_the_date(); ?>
            </p>
        </div>
        <div class='position-relative'>
            <h2 class="article-nome"><?php the_title(); ?></h2>
        </div>
    </div>
    <p class='article-excerpt mt-1'>
        <?php echo wp_trim_words( get_the_excerpt(), 35, '...' ); ?>
    </p>
    <?php
        $post_tags = get_the_tags();
        if ( $post_tags && isset( $post_tags[0] ) ) {
    ?>
    <?php
    }
    ?>
    <div class='article-body-ponto'>
        <?php
        if (has_post_thumbnail()) {
            echo the_post_thumbnail('full');
        } else {
            echo '<p class="text-center m-2">Nenhuma imagem foi adicionada.</p>';
        }
        ?>
        <?php
        echo the_content('full');
        ?>
    </div>

</section>

<?php get_footer(); ?>