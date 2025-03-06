<?php
/*
Template Name: Home
*/
get_header();
?>

<div class='w-4/5 mx-auto flex flex-col gap-8 mb-16'>
    <?php $language = pll_current_language() ?>
    <h2 class='text-3xl font-bold text-white'>
        <?php the_title()?>
    </h2>
    <div>
        <?php echo the_content()?>
    </div>

    <hr />
    <h3 class='text-2xl font-bold text-white'>
        <?php
            if ($language == 'pt') {
                echo 'Experiências';
            } else {
                echo 'Experiences';
            }
        ?>
    </h3>
    <!-- <ul class='grid md:grid-cols-2 lg:grid-cols-3 gap-6'> -->
    <?php
      // Busca primeiro os trabalhos em andamento (sem _job_finish_date)
        $ongoing_jobs = new WP_Query(array(
            'post_type'      => 'job',
            'posts_per_page' => -1,
            'meta_query'     => array(
                array(
                    'key'     => '_job_finish_date',
                    'compare' => '=',
                    'value'   => '', // Captura registros onde a data está vazia
                ),
            ),
        ));

        // Agora, busca os trabalhos finalizados, ordenados pela data de término
        $finished_jobs = new WP_Query(array(
            'post_type'      => 'job',
            'posts_per_page' => -1,
            'meta_key'       => '_job_finish_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => '_job_finish_date',
                    'compare' => '!=',
                    'value'   => '', // Captura registros onde a data está vazia
                ),
            ),
        ));

        $job_query = array_merge($ongoing_jobs->posts, $finished_jobs->posts);

        if (!empty($job_query)) :
            foreach ($job_query as $post) :
                setup_postdata($post);
                $company = get_post_meta(get_the_ID(), '_job_company', true);
                $start_date = get_post_meta(get_the_ID(), '_job_start_date', true);
                $finish_date = get_post_meta(get_the_ID(), '_job_finish_date', true);
                $description = get_post_meta(get_the_ID(), '_job_description', true);

                $formatted_start_date = date_i18n( 'F Y', strtotime( $start_date ) );
                $formatted_finish_date = date_i18n( 'F Y', strtotime( $finish_date ) );

                if(empty($finish_date)) {
                    if ($language == 'pt') {
                        $formatted_finish_date = "Presente";
                    } else {
                        $formatted_finish_date = "Present";
                    }
                }
                ?>
    <div>

        <h4 class='text-lg font-bold text-primary-carlos mb-1'><?php the_title() ?></h4>
        <h5 class='text-white font-medium mb-3'><?php echo $company ?> <span
                class='text-terciary-carlos'>(<?php echo $formatted_start_date ?> -
                <?php echo $formatted_finish_date ?>)</span></h5>
        <ul class='ml-6 list-disc text-terciary-carlos'>
            <?php echo $description ?>
        </ul>
    </div>
    <?php
        endforeach;
            wp_reset_postdata();
        else:
            if ($language == 'pt') {
                echo '<p class="text-terciary-carlos">Nenhuma experiência foi encontrada.</p>';
            } else {
                echo '<p class="text-terciary-carlos">No experience found.</p>';
            }
        endif;
    ?>
    <!-- </ul> -->
    <h3 class='text-2xl font-bold text-white'>
        <?php
            if ($language == 'pt') {
                echo 'Contato';
            } else {
                echo 'Contact';
            }
        ?>
    </h3>
    <p class='text-white'>Email: <a class='underline'
            href='mailto:carloseduardo.dev@gmail.com'>carloseduardo.dev@gmail.com</a></p>
</div>
<hr />
<?php get_footer(); ?>
