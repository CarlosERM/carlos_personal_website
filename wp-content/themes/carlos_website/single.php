<?php get_header(); ?>
<article class='w-4/5 mx-auto flex flex-col gap-8 mb-16'>
    <h2 class="text-4xl font-bold text-white text-center"><?php the_title(); ?></h2>
    <?php
        if (has_post_thumbnail()) {
            echo the_post_thumbnail('full');
        } else {
            echo '<p class="text-center m-2">Nenhuma imagem foi adicionada.</p>';
        }
        ?>
    <section class="text-terciary-carlos article-content">
        <?php the_content('full'); ?>

    </section>

</article>
<?php get_footer(); ?>