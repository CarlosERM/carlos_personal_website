<?php
/*
Template Name: Articles
*/
get_header();
?>
<div class='w-4/5 mx-auto flex flex-col gap-8 mb-16'>
    <h2 class='text-3xl font-bold text-white'>
        <?php the_title()?>
    </h2>
    <ul class='grid md:grid-cols-2 lg:grid-cols-3 gap-6'>
        <?php
        // Query for other languages
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1, // Number of posts to show
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $articles_query = new WP_Query($args);

        if ($articles_query->have_posts()) :
            while ($articles_query -> have_posts()) : $articles_query -> the_post();
            ?>
        <a class="p-4 border border-transparent hover:border-light-grey hover:shadow-lg hover:bg-background-light-black active:bg-background-light"
            href="<?php the_permalink(); ?>">
            <li>
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium-large'); ?>
                <?php endif; ?>
                <p class="text-quartenary-carlos pb-1 pt-4 font-normal text-xs"><?php echo get_the_date(); ?></p>
                <h3 class="text-white pb-2 font-bold text-xl"><?php the_title(); ?></h3>
                <p class="text-terciary-carlos font-medium text-sm"><?php echo get_the_excerpt(); ?></p>
            </li>
        </a>

        <?php
                endwhile;
                wp_reset_postdata();
            else:
                if ($language == 'pt') {
                    echo '<p class="text-terciary-carlos">Nenhum projeto foi cadastrado.</p>';
                } else {
                    echo '<p class="text-terciary-carlos">No projects found.</p>';
                }
            endif;
        ?>
    </ul>
</div>


<?php get_footer(); ?>