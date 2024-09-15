<?php

// Load css
function my_load_css() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_enqueue_style('main', get_template_directory_uri(). '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'my_load_css');

// Load js
function my_load_js() {
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, 'all');
    wp_enqueue_script('bootstrap');

    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'my_load_js');

// Theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Menu location
register_nav_menus(array(
    'top-menu' => 'Top Menu Location',
    'mobile-menu' => 'Mobile Menu Location',
    'button' => 'Button archive',
    'post' => 'Post Menu',
    'post-button' => 'Post Button Menu',
));

add_image_size('blog-large', 100, 100, true);


function registra_pagina_personalizzata() {
    add_menu_page(
        'Settings',                 // Titolo della pagina
        'Settings',                 // Titolo del menu
        'manage_options',           // Capacità richiesta
        'settings-page',            // Slug della pagina
        'settings_creator',         // Funzione di callback che genera il contenuto della pagina
        'dashicons-admin-generic',  // Icona del menu (opzionale)
        6                           // Posizione nel menu (opzionale)
    );
}
add_action( 'admin_menu', 'registra_pagina_personalizzata' );

function settings_creator() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" action="options.php">
            <?php
            // Usare lo slug corretto della pagina per settings_fields
            settings_fields( 'settings-page' );
            // Usare lo slug corretto della pagina per do_settings_sections
            do_settings_sections( 'settings-page' );
            // Output del pulsante di salvataggio
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function set_settings() {
    $setting_page_slug = "settings-page";

    // Aggiungi una sezione alla pagina
    add_settings_section(
        'front_page_section',           // ID della sezione
        'Front Page Settings',          // Titolo della sezione
        'desc_front_page_section',      // Funzione di callback per la descrizione della sezione
        $setting_page_slug              // Pagina in cui aggiungere la sezione
    );

    // Aggiungi il campo "Titolo"
    add_settings_field(
        'front_page_title',             // ID del campo
        'Titolo',                       // Etichetta del campo
        'front_page_title_callback',    // Funzione di callback per la visualizzazione del campo
        $setting_page_slug,             // Pagina in cui aggiungere il campo
        'front_page_section'            // ID della sezione a cui il campo appartiene
    );

    // Aggiungi il campo "Sotto titolo"
    add_settings_field(
        'front_page_subtitle',          // ID del campo
        'Sotto titolo',                 // Etichetta del campo
        'front_page_subtitle_callback', // Funzione di callback per la visualizzazione del campo
        $setting_page_slug,             // Pagina in cui aggiungere il campo
        'front_page_section'            // ID della sezione a cui il campo appartiene
    );

    // Registra le impostazioni
    register_setting( $setting_page_slug, 'front_page_title' );
    register_setting( $setting_page_slug, 'front_page_subtitle' );
}
add_action( 'admin_init', 'set_settings' );

function desc_front_page_section() {}

function front_page_title_callback() {
    $value = get_option( 'front_page_title' );
    echo '<input type="text" name="front_page_title" value="' . esc_attr( $value ) . '" />';
}

function front_page_subtitle_callback() {
    $value = get_option( 'front_page_subtitle' );
    echo '<input type="text" name="front_page_subtitle" value="' . esc_attr( $value ) . '" />';
}


function get_admin_email() {

    $email = get_option('admin_email');

    return '<p class="inline">[</p>
            <p class="inline">' . $email . '</p>
            <p class="inline">]</p><p></p>';
}
add_shortcode('admin_email', 'get_admin_email');


/* CONTACT PAGE EMAIL DOESN'T WORK
add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_aja_nopriv_enquiry', 'enquiry_form');

function enquiry_form() {

    $formData = [];
    wp_parse_str($_POST['enquiry'], $formData);

    $admin_email = get_option('admin_email');

    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Texture Wiki' . '<' . $admin_email . '>';
    $headers[] = 'Replay-to:' . $formData['email'];

    $send_to = $admin_email;


    $subject = "Enquiry from " . $formData['fname'] . " " . $formData['lname'];

    $message = '';

    foreach($formData as $index => $field) {
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
    }

    try {
        if (wp_mail($send_to, $subject, $message, $headers)) {
            wp_send_json_success("Email sent");
        } else {
            wp_send_json_error("Email error");
        }
    } catch (Excetion $e) {
        wp_send_json_error( $e -> getMessage() );
    }

    wp_send_json_success($formData['fname']);
}*/