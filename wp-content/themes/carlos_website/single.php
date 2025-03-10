<?php get_header(); ?>
<article class='w-4/5 mx-auto mb-16'>
    <section>
        <h2 class="text-xl sm:text-2xl md:text-4xl font-bold text-white text-center pb-2"><?php the_title(); ?></h2>
        <p class="text-base font-medium text-terciary-carlos text-center pb-8"><?php echo get_the_date(); ?></p>
    </section>
    <section class='article-image md:h-[514px] overflow-hidden'>
        <?php
        if (has_post_thumbnail()) {
            echo the_post_thumbnail('full');
        } else {
            echo '<p class="text-center m-2 text-terciary-carlos">Nenhuma imagem foi adicionada.</p>';
        }
        ?>
    </section>
    <section class="text-terciary-carlos article-content pt-8 text-sm sm:text-base">
        <?php the_content('full'); ?>
    </section>

</article>
<?php get_footer(); ?>