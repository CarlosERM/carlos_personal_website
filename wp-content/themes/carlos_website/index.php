<?php get_header(); ?>

<div style="padding-top: 7.5rem; margin-bottom:6rem;" class='container'>
    <div class='text-center'>
        <h1 class="titulo-com-ponto"><?php echo get_the_title()?></h1>
        <p class="ponto-descricao">
            <?php
                echo wp_strip_all_tags( get_the_content() );
            ?>
        </p>
    </div>
    <div class='row row-cols-lg-2 row-cols-xl-3 gap-3 justify-content-center'>
        <?php
      //Protect against arbitrary paged values
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

      $args = array(
        'posts_per_page' => 9,
        'post_type' => 'post',
        'paged' => $paged
      );

      $lastposts_query = new WP_Query( $args );

      if ( $lastposts_query -> have_posts() ) {
        while ($lastposts_query -> have_posts()) : $lastposts_query -> the_post() ?>
        <div style='max-width: 25rem;'>
            <a class='post-ponto d-block' href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                    echo the_post_thumbnail('thumb-large');
                } else {
                    echo '<p>Nenhuma imagem foi adicionada.</p>';
                }
              ?>
                <p class='author_date_post'>
                    <?php the_author(); ?>
                    <span class='post-metadata-decoration'>•</span>
                    <?php echo get_the_date(); ?>
                </p>
                <h2 class="post-title">
                    <?php
                      echo wp_trim_words( get_the_title(), 11, '...' );
                    ?>
                </h2>
                <p class='post-excerpt'>
                    <?php
                      echo wp_trim_words( get_the_excerpt(), 27, '...' );
                    ?>
                </p>

                <?php
                  $post_tags = get_the_tags();
                  if ( $post_tags && isset( $post_tags[0] ) ) { ?>
                <span class="tag-post">
                    <?php echo esc_html( $post_tags[0]->name ); ?>
                </span>
                <?php
                  }
                ?>
            </a>
        </div>

        <?php
        endwhile;
        wp_reset_postdata();

      }
      ?>
    </div>

    <div class='container d-flex justify-content-center gap-3 my-3'>
        <?php
    $big = 999999999;
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $lastposts_query->max_num_pages
      ));
    ?>
    </div>
</div>

<?php get_footer(); ?>