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
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title'),
        'show_in_rest' => true
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
    $date = get_post_meta($post->ID, '_project_date', true);
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
    <label for="project_date">Data de Conclusão:</label><br>
    <input type="date" id="project_date" name="project_date" value="<?php echo esc_attr($date); ?>" size="30" />
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

    if (isset($_POST['project_date'])) {
        update_post_meta($post_id, '_project_date', $_POST['project_date']);
    }
}

add_action('save_post', 'project_save_meta_data');
// REGISTER PROJECTS

// REGISTER JOB EXPERIENCES
function register_jobs() {
    $args = array(
        'labels' => array(
            'name' => 'Experiências',
            'singular_name' => 'Experiência',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'supports' => array('title'),
        'show_in_rest' => true
    );
    register_post_type('job', $args);
}

add_action('init', 'register_jobs');

function job_custom_metabox() {
    add_meta_box(
        'job_info',
        'Informações da Experiência',
        'job_info_callback',
        'job',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'job_custom_metabox');

function job_info_callback($post) {
    $company = get_post_meta($post->ID, '_job_company', true);
    $start_date = get_post_meta($post->ID, '_job_start_date', true);
    $finish_date = get_post_meta($post->ID, '_job_finish_date', true);
    $description = get_post_meta($post->ID, '_job_description', true);
    $year = get_post_meta($post->ID, '_job_year', true);
    ?>
<p>
    <label for="job_company">Nome da Empresa:</label><br>
    <input type="text" id="job_company" name="job_company" value="<?php echo esc_attr($company); ?>" size="30" />
</p>
<p>
    <label for="job_start_date">Data de início:</label><br>
    <input type="date" id="job_start_date" name="job_start_date" value="<?php echo esc_attr($start_date); ?>"
        size="30" />
</p>
<p>
    <label for="job_finish_date">Data de encerramento:</label><br>
    <input type="date" id="job_finish_date" name="job_finish_date" value="<?php echo esc_attr($finish_date); ?>"
        size="30" />
</p>
<p>
    <label for="job_description">Descrição: </label><br>
    <textarea id="job_description" name="job_description" rows="5"
        style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
</p>
<?php
}

function job_save_meta_data($post_id) {
    if (isset($_POST['job_company'])) {
        update_post_meta($post_id, '_job_company', sanitize_text_field($_POST['job_company']));
    }
    if (isset($_POST['job_start_date'])) {
        update_post_meta($post_id, '_job_start_date', $_POST['job_start_date']);
    }
    if (isset($_POST['job_finish_date'])) {
        update_post_meta($post_id, '_job_finish_date', $_POST['job_finish_date']);
    }
    if (isset($_POST['job_description'])) {
        update_post_meta($post_id, '_job_description', $_POST['job_description']);
    }

}
add_action('save_post', 'job_save_meta_data');
// REGISTER JOB EXPERIENCES

// TITLE
function title_template() {
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'title_template' );
// TITLE
?>