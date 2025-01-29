<?php
/*
Template Name: Home
*/
get_header();
?>

<div class='w-4/5 mx-auto flex flex-col gap-8 mb-16'>
    <h2 class='text-3xl font-bold text-white'>
        <?php the_title()?>
    </h2>
    <div>
        <?php echo the_content()?>
    </div>

    <hr />
    <h3 class='text-2xl font-bold text-white'>Experiências</h3>
    <!-- <ul class='grid md:grid-cols-2 lg:grid-cols-3 gap-6'> -->
    <?php
        $args = array('post_type' => 'job', 'posts_per_page' => -1);
        $job_query = new WP_Query($args);

        if ($job_query->have_posts()) :
            while ($job_query -> have_posts()) : $job_query -> the_post();
                $company = get_post_meta(get_the_ID(), '_job_company', true);
                $start_date = get_post_meta(get_the_ID(), '_job_start_date', true);
                $finish_date = get_post_meta(get_the_ID(), '_job_finish_date', true);
                $description = get_post_meta(get_the_ID(), '_job_description', true);
                ?>
    <div>

        <h4 class='text-lg font-bold text-primary-carlos mb-1'><?php the_title() ?></h4>
        <h5 class='text-white font-medium mb-3'><?php echo $company ?> <span
                class='text-terciary-carlos'>(<?php echo $start_date ?> -
                <?php echo $finish_date ?>)</span></h5>

        <ul class='ml-6 list-disc text-terciary-carlos'>
            <?php echo $description ?>
        </ul>
    </div>
    <?php
        endwhile;
            wp_reset_postdata();
        else:
            echo '<p>Nenhuma experiência foi encontrada.</p>';
        endif;
    ?>
    <!-- </ul> -->
    <h3 class='text-2xl font-bold text-white'>Contato</h3>
    <p class='text-white'>Email: <a class='underline'
            href='mailto:carloseduardo.dev@gmail.com'>carloseduardo.dev@gmail.com</a></p>
</div>
<hr />
<?php get_footer(); ?>