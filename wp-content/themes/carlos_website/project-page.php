<?php
/*
Template Name: Projects
*/
get_header();
?>

<div class='w-4/5 mx-auto flex flex-col gap-8 mb-16'>
    <?php $language = pll_current_language() ?>
    <h2 class='text-3xl font-bold text-white'>
        <?php the_title()?>
    </h2>
    <ul class='grid md:grid-cols-2 lg:grid-cols-3 gap-6'>
        <?php

        // Query for other languages
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_key' => '_project_date',
        );

        $projects_query = new WP_Query($args);

        if ($projects_query->have_posts()) :
            while ($projects_query -> have_posts()) : $projects_query -> the_post();
                $description = get_post_meta(get_the_ID(), '_project_description', true);
                $link = get_post_meta(get_the_ID(), '_project_link', true);
                $date = get_post_meta(get_the_ID(), '_project_date', true);

                if ($language == 'pt') {
                    $formatted_date = date( 'd/m/Y', strtotime( $date ) );
                } else {
                    $formatted_date = date( 'm/d/Y', strtotime( $date ) );
                }
            ?>
        <a href=<?php echo esc_html($link); ?> target="_blank" rel="noopener noreferrer">
            <li
                class='flex flex-col gap-4 p-4 relative bg-background-light rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition-all group'>
                <div class='flex justify-between items-center'>
                    <h3 class='text-2xl font-bold text-white'><?php the_title(); ?></h3>
                    <p class='text-secondary-carlos'><?php echo esc_html($formatted_date); ?></p>
                </div>
                <p class='text-terciary-carlos mb-16'><?php echo esc_html($description); ?></p>

                <svg class='absolute bottom-4 right-4 size-6 text-terciary-carlos group-hover:text-white transition-all'
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
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