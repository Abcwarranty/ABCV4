<?php
/**
 * Architects Certificate Theme Functions
 * 
 * @package ArchitectsCertificate
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('ARCHITECTS_CERTIFICATE_VERSION', '1.0.0');

/**
 * Theme setup
 */
function architects_certificate_setup() {
    // Make theme available for translation
    load_theme_textdomain('architects-certificate', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'architects-certificate'),
        'footer'  => esc_html__('Footer Menu', 'architects-certificate'),
        'social'  => esc_html__('Social Links Menu', 'architects-certificate'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'architects_certificate_setup');

/**
 * Enqueue scripts and styles
 */
function architects_certificate_scripts() {
    // Theme stylesheet
    wp_enqueue_style(
        'architects-certificate-style',
        get_stylesheet_uri(),
        array(),
        ARCHITECTS_CERTIFICATE_VERSION
    );

    // Tailwind CSS (consider using local build for production)
    wp_enqueue_style(
        'tailwind-css',
        'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css',
        array(),
        '2.2.19'
    );
    
    // Mobile-specific styles
    wp_enqueue_style(
        'architects-certificate-mobile',
        get_template_directory_uri() . '/assets/css/mobile.css',
        array('architects-certificate-style'),
        ARCHITECTS_CERTIFICATE_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'architects-certificate-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        ARCHITECTS_CERTIFICATE_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('architects-certificate-script', 'architects_certificate_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('architects_certificate_nonce'),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'architects_certificate_scripts');

/**
 * Custom post types
 */
function architects_certificate_custom_post_types() {
    // Testimonials post type
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => esc_html__('Testimonials', 'architects-certificate'),
            'singular_name'      => esc_html__('Testimonial', 'architects-certificate'),
            'menu_name'          => esc_html__('Testimonials', 'architects-certificate'),
            'add_new'            => esc_html__('Add New', 'architects-certificate'),
            'add_new_item'       => esc_html__('Add New Testimonial', 'architects-certificate'),
            'edit_item'          => esc_html__('Edit Testimonial', 'architects-certificate'),
            'new_item'           => esc_html__('New Testimonial', 'architects-certificate'),
            'view_item'          => esc_html__('View Testimonial', 'architects-certificate'),
            'search_items'       => esc_html__('Search Testimonials', 'architects-certificate'),
            'not_found'          => esc_html__('No testimonials found', 'architects-certificate'),
            'not_found_in_trash' => esc_html__('No testimonials found in Trash', 'architects-certificate'),
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'has_archive'  => false,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'    => 'dashicons-format-quote',
        'menu_position' => 25,
    ));

    // Services post type
    register_post_type('service', array(
        'labels' => array(
            'name'               => esc_html__('Services', 'architects-certificate'),
            'singular_name'      => esc_html__('Service', 'architects-certificate'),
            'menu_name'          => esc_html__('Services', 'architects-certificate'),
            'add_new'            => esc_html__('Add New', 'architects-certificate'),
            'add_new_item'       => esc_html__('Add New Service', 'architects-certificate'),
            'edit_item'          => esc_html__('Edit Service', 'architects-certificate'),
            'new_item'           => esc_html__('New Service', 'architects-certificate'),
            'view_item'          => esc_html__('View Service', 'architects-certificate'),
            'search_items'       => esc_html__('Search Services', 'architects-certificate'),
            'not_found'          => esc_html__('No services found', 'architects-certificate'),
            'not_found_in_trash' => esc_html__('No services found in Trash', 'architects-certificate'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'    => 'dashicons-admin-tools',
        'menu_position' => 26,
        'rewrite'      => array('slug' => 'services'),
    ));
}
add_action('init', 'architects_certificate_custom_post_types');

/**
 * Add meta boxes for custom post types
 */
function architects_certificate_add_meta_boxes() {
    // Testimonial meta boxes
    add_meta_box(
        'testimonial_details',
        esc_html__('Testimonial Details', 'architects-certificate'),
        'architects_certificate_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );

    // Service meta boxes
    add_meta_box(
        'service_details',
        esc_html__('Service Details', 'architects-certificate'),
        'architects_certificate_service_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'architects_certificate_add_meta_boxes');

/**
 * Testimonial meta box callback
 */
function architects_certificate_testimonial_meta_box($post) {
    wp_nonce_field('save_testimonial_details', 'testimonial_nonce');
    
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_title = get_post_meta($post->ID, '_client_title', true);
    $client_company = get_post_meta($post->ID, '_client_company', true);
    $rating = get_post_meta($post->ID, '_rating', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="client_name"><?php esc_html_e('Client Name', 'architects-certificate'); ?></label></th>
            <td><input type="text" id="client_name" name="client_name" value="<?php echo esc_attr($client_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="client_title"><?php esc_html_e('Client Title', 'architects-certificate'); ?></label></th>
            <td><input type="text" id="client_title" name="client_title" value="<?php echo esc_attr($client_title); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="client_company"><?php esc_html_e('Client Company', 'architects-certificate'); ?></label></th>
            <td><input type="text" id="client_company" name="client_company" value="<?php echo esc_attr($client_company); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="rating"><?php esc_html_e('Rating (1-5)', 'architects-certificate'); ?></label></th>
            <td>
                <select id="rating" name="rating">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> <?php echo $i === 1 ? esc_html__('Star', 'architects-certificate') : esc_html__('Stars', 'architects-certificate'); ?></option>
                    <?php endfor; ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Service meta box callback
 */
function architects_certificate_service_meta_box($post) {
    wp_nonce_field('save_service_details', 'service_nonce');
    
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    $service_features = get_post_meta($post->ID, '_service_features', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_icon"><?php esc_html_e('Service Icon Class', 'architects-certificate'); ?></label></th>
            <td>
                <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" class="regular-text" />
                <p class="description"><?php esc_html_e('Enter a CSS class for the service icon (e.g., "fas fa-certificate")', 'architects-certificate'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="service_features"><?php esc_html_e('Service Features', 'architects-certificate'); ?></label></th>
            <td>
                <textarea id="service_features" name="service_features" rows="5" class="large-text"><?php echo esc_textarea($service_features); ?></textarea>
                <p class="description"><?php esc_html_e('Enter one feature per line', 'architects-certificate'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function architects_certificate_save_meta_boxes($post_id) {
    // Check if nonce is valid
    if (isset($_POST['testimonial_nonce']) && wp_verify_nonce($_POST['testimonial_nonce'], 'save_testimonial_details')) {
        // Save testimonial data
        if (isset($_POST['client_name'])) {
            update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
        }
        if (isset($_POST['client_title'])) {
            update_post_meta($post_id, '_client_title', sanitize_text_field($_POST['client_title']));
        }
        if (isset($_POST['client_company'])) {
            update_post_meta($post_id, '_client_company', sanitize_text_field($_POST['client_company']));
        }
        if (isset($_POST['rating'])) {
            update_post_meta($post_id, '_rating', intval($_POST['rating']));
        }
    }

    if (isset($_POST['service_nonce']) && wp_verify_nonce($_POST['service_nonce'], 'save_service_details')) {
        // Save service data
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
        if (isset($_POST['service_features'])) {
            update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
        }
    }
}
add_action('save_post', 'architects_certificate_save_meta_boxes');

/**
 * Customizer additions
 */
function architects_certificate_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => esc_html__('Hero Section', 'architects-certificate'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => esc_html__("Architect's Certificate Services in the UK", 'architects-certificate'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => esc_html__('Hero Title', 'architects-certificate'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'           => esc_html__('Get your professional architect\'s certificate quickly and efficiently. We provide comprehensive certification services for architects across the United Kingdom.', 'architects-certificate'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_description', array(
        'label'   => esc_html__('Hero Description', 'architects-certificate'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));

    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title'    => esc_html__('Contact Information', 'architects-certificate'),
        'priority' => 35,
    ));

    // Phone Number
    $wp_customize->add_setting('phone_number', array(
        'default'           => '0800 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('phone_number', array(
        'label'   => esc_html__('Phone Number', 'architects-certificate'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('email_address', array(
        'default'           => 'info@architectscertificates.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('email_address', array(
        'label'   => esc_html__('Email Address', 'architects-certificate'),
        'section' => 'contact_info',
        'type'    => 'email',
    ));

    // Business Address
    $wp_customize->add_setting('business_address', array(
        'default'           => 'London, United Kingdom',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('business_address', array(
        'label'   => esc_html__('Business Address', 'architects-certificate'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Business Hours
    $wp_customize->add_setting('business_hours', array(
        'default'           => 'Mon-Fri: 9AM-6PM',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('business_hours', array(
        'label'   => esc_html__('Business Hours', 'architects-certificate'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'architects_certificate_customize_register');

/**
 * Widget areas
 */
function architects_certificate_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'architects-certificate'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in the first footer column.', 'architects-certificate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'architects-certificate'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here to appear in the second footer column.', 'architects-certificate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'architects-certificate'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here to appear in the third footer column.', 'architects-certificate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 4', 'architects-certificate'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here to appear in the fourth footer column.', 'architects-certificate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'architects_certificate_widgets_init');

/**
 * Custom excerpt length
 */
function architects_certificate_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'architects_certificate_excerpt_length');

/**
 * Custom excerpt more
 */
function architects_certificate_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'architects_certificate_excerpt_more');

/**
 * Add custom classes to body
 */
function architects_certificate_body_classes($classes) {
    // Add class for custom logo
    if (has_custom_logo()) {
        $classes[] = 'has-custom-logo';
    }

    // Add class for front page
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }

    return $classes;
}
add_filter('body_class', 'architects_certificate_body_classes');

/**
 * Enqueue admin styles
 */
function architects_certificate_admin_styles() {
    wp_enqueue_style(
        'architects-certificate-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        ARCHITECTS_CERTIFICATE_VERSION
    );
}
add_action('admin_enqueue_scripts', 'architects_certificate_admin_styles');

/**
 * Add mobile detection to body class
 */
function architects_certificate_mobile_body_class($classes) {
    // Check for mobile user agent
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
        
        // Add specific device classes
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        if (stripos($user_agent, 'iPhone') !== false || stripos($user_agent, 'iPad') !== false) {
            $classes[] = 'is-ios';
        } elseif (stripos($user_agent, 'Android') !== false) {
            $classes[] = 'is-android';
        }
    }
    
    return $classes;
}
add_filter('body_class', 'architects_certificate_mobile_body_class');

/**
 * Add touch detection script to head
 */
function architects_certificate_touch_detection() {
    ?>
    <script>
        // Add 'touch' or 'no-touch' class to html element
        (function() {
            var isTouch = ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch;
            document.documentElement.className += isTouch ? ' touch' : ' no-touch';
        })();
    </script>
    <?php
}
add_action('wp_head', 'architects_certificate_touch_detection', 0);
?>
