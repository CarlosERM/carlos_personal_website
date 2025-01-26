<?php

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
  }
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


// REGISTER PROJECTS
function register_projects() {
    $args = array(
        'labels' => array(
            'name' => 'Projetos',
            'singular_name' => 'Projeto',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title'),
    );
    register_post_type('project', $args);
}

add_action('init', 'register_projects');

function project_custom_metabox() {
    add_meta_box(
        'project_info',
        'Informações do Projeto',
        'project_info_callback',
        'project',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'project_custom_metabox');

function project_info_callback($post) {
    $description = get_post_meta($post->ID, '_project_description', true);
    $link = get_post_meta($post->ID, '_project_link', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    ?>
<p>
    <label for="project_description">Descrição:</label><br>
    <input type="text" id="project_description" name="project_description" value="<?php echo esc_attr($description); ?>"
        size="30" />
</p>
<p>
    <label for="project_link">Link do Projeto:</label><br>
    <input type="url" id="project_link" name="project_link" value="<?php echo esc_attr($link); ?>" size="30" />
</p>
<p>
    <label for="project_year">Ano de Criação:</label><br>
    <input type="number" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" size="30" />
</p>
<?php
}

function project_save_meta_data($post_id) {
    if (isset($_POST['project_description'])) {
        update_post_meta($post_id, '_project_description', sanitize_text_field($_POST['project_description']));
    }

    if (isset($_POST['project_link'])) {
        update_post_meta($post_id, '_project_link', esc_url($_POST['project_link']));
    }

    if (isset($_POST['project_year'])) {
        update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
    }
}
add_action('save_post', 'project_save_meta_data');
// REGISTER PROJECTS
?>