<?php
/**
 * Policy Pilots Coming Soon Theme Functions
 * 
 * @package PolicyPilots
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('POLICY_PILOTS_VERSION', '1.0.0');

/**
 * Theme setup
 */
function policy_pilots_setup() {
    // Make theme available for translation
    load_theme_textdomain('policy-pilots', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 400,
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
        'default-color' => 'd5d8e0',
        'default-image' => '',
    ));

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Set content width
    if (!isset($content_width)) {
        $content_width = 800;
    }
}
add_action('after_setup_theme', 'policy_pilots_setup');

/**
 * Enqueue scripts and styles
 */
function policy_pilots_scripts() {
    // Theme stylesheet
    wp_enqueue_style(
        'policy-pilots-style',
        get_stylesheet_uri(),
        array(),
        POLICY_PILOTS_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'policy-pilots-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        POLICY_PILOTS_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('policy-pilots-script', 'policy_pilots_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('policy_pilots_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'policy_pilots_scripts');

/**
 * Customizer additions
 */
function policy_pilots_customize_register($wp_customize) {
    // Coming Soon Section
    $wp_customize->add_section('coming_soon_section', array(
        'title'    => esc_html__('Coming Soon Settings', 'policy-pilots'),
        'priority' => 30,
    ));

    // Main Title
    $wp_customize->add_setting('coming_soon_title', array(
        'default'           => esc_html__('Coming Soon', 'policy-pilots'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('coming_soon_title', array(
        'label'   => esc_html__('Main Title', 'policy-pilots'),
        'section' => 'coming_soon_section',
        'type'    => 'text',
    ));

    // Description
    $wp_customize->add_setting('coming_soon_description', array(
        'default'           => esc_html__('Your AI co-pilot for smarter insurance decisions is preparing for takeoff', 'policy-pilots'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('coming_soon_description', array(
        'label'   => esc_html__('Description', 'policy-pilots'),
        'section' => 'coming_soon_section',
        'type'    => 'textarea',
    ));

    // Email Settings Section
    $wp_customize->add_section('email_settings', array(
        'title'    => esc_html__('Email Settings', 'policy-pilots'),
        'priority' => 35,
    ));

    // Admin Email for notifications
    $wp_customize->add_setting('admin_notification_email', array(
        'default'           => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('admin_notification_email', array(
        'label'   => esc_html__('Admin Notification Email', 'policy-pilots'),
        'section' => 'email_settings',
        'type'    => 'email',
        'description' => esc_html__('Email address to receive notifications when someone subscribes', 'policy-pilots'),
    ));

    // Success Message
    $wp_customize->add_setting('success_message', array(
        'default'           => esc_html__('We\'ll notify you as soon as Policy Pilots is ready for takeoff.', 'policy-pilots'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('success_message', array(
        'label'   => esc_html__('Success Message', 'policy-pilots'),
        'section' => 'email_settings',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'policy_pilots_customize_register');

/**
 * Handle email subscription via AJAX
 */
function policy_pilots_handle_subscription() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'policy_pilots_nonce')) {
        wp_die(esc_html__('Security check failed', 'policy-pilots'));
    }

    $email = sanitize_email($_POST['email']);
    
    if (!is_email($email)) {
        wp_send_json_error(array('message' => esc_html__('Please enter a valid email address', 'policy-pilots')));
    }

    // Check if email already exists
    global $wpdb;
    $table_name = $wpdb->prefix . 'policy_pilots_subscribers';
    
    $existing = $wpdb->get_var($wpdb->prepare(
        "SELECT email FROM $table_name WHERE email = %s",
        $email
    ));

    if ($existing) {
        wp_send_json_error(array('message' => esc_html__('This email is already subscribed', 'policy-pilots')));
    }

    // Insert email into database
    $result = $wpdb->insert(
        $table_name,
        array(
            'email' => $email,
            'subscribed_at' => current_time('mysql'),
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ),
        array('%s', '%s', '%s')
    );

    if ($result === false) {
        wp_send_json_error(array('message' => esc_html__('Failed to save subscription. Please try again.', 'policy-pilots')));
    }

    // Send notification email to admin
    $admin_email = get_theme_mod('admin_notification_email', get_option('admin_email'));
    $subject = esc_html__('New Policy Pilots Subscription', 'policy-pilots');
    $message = sprintf(
        esc_html__('New subscription received: %s', 'policy-pilots'),
        $email
    );
    
    wp_mail($admin_email, $subject, $message);

    wp_send_json_success(array('message' => esc_html__('Thank you for subscribing!', 'policy-pilots')));
}
add_action('wp_ajax_policy_pilots_subscribe', 'policy_pilots_handle_subscription');
add_action('wp_ajax_nopriv_policy_pilots_subscribe', 'policy_pilots_handle_subscription');

/**
 * Create subscribers table on theme activation
 */
function policy_pilots_create_subscribers_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'policy_pilots_subscribers';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(100) NOT NULL,
        subscribed_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        ip_address varchar(45),
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'policy_pilots_create_subscribers_table');

/**
 * Add admin menu for subscribers
 */
function policy_pilots_admin_menu() {
    add_theme_page(
        esc_html__('Email Subscribers', 'policy-pilots'),
        esc_html__('Subscribers', 'policy-pilots'),
        'manage_options',
        'policy-pilots-subscribers',
        'policy_pilots_subscribers_page'
    );
}
add_action('admin_menu', 'policy_pilots_admin_menu');

/**
 * Subscribers admin page
 */
function policy_pilots_subscribers_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'policy_pilots_subscribers';
    
    $subscribers = $wpdb->get_results("SELECT * FROM $table_name ORDER BY subscribed_at DESC");
    
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Email Subscribers', 'policy-pilots'); ?></h1>
        
        <?php if ($subscribers) : ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Email', 'policy-pilots'); ?></th>
                        <th><?php esc_html_e('Subscribed Date', 'policy-pilots'); ?></th>
                        <th><?php esc_html_e('IP Address', 'policy-pilots'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscribers as $subscriber) : ?>
                        <tr>
                            <td><?php echo esc_html($subscriber->email); ?></td>
                            <td><?php echo esc_html(date('F j, Y g:i a', strtotime($subscriber->subscribed_at))); ?></td>
                            <td><?php echo esc_html($subscriber->ip_address); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <p>
                <strong><?php printf(esc_html__('Total Subscribers: %d', 'policy-pilots'), count($subscribers)); ?></strong>
            </p>
            
            <p>
                <a href="<?php echo admin_url('admin.php?page=policy-pilots-subscribers&export=csv'); ?>" class="button">
                    <?php esc_html_e('Export to CSV', 'policy-pilots'); ?>
                </a>
            </p>
        <?php else : ?>
            <p><?php esc_html_e('No subscribers yet.', 'policy-pilots'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Handle CSV export
 */
function policy_pilots_handle_csv_export() {
    if (isset($_GET['page']) && $_GET['page'] === 'policy-pilots-subscribers' && isset($_GET['export']) && $_GET['export'] === 'csv') {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have permission to access this page.', 'policy-pilots'));
        }
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'policy_pilots_subscribers';
        $subscribers = $wpdb->get_results("SELECT * FROM $table_name ORDER BY subscribed_at DESC");
        
        if ($subscribers) {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="policy-pilots-subscribers.csv"');
            
            $output = fopen('php://output', 'w');
            fputcsv($output, array('Email', 'Subscribed Date', 'IP Address'));
            
            foreach ($subscribers as $subscriber) {
                fputcsv($output, array(
                    $subscriber->email,
                    $subscriber->subscribed_at,
                    $subscriber->ip_address
                ));
            }
            
            fclose($output);
            exit;
        }
    }
}
add_action('admin_init', 'policy_pilots_handle_csv_export');

/**
 * Add custom body classes
 */
function policy_pilots_body_classes($classes) {
    // Add class for custom logo
    if (has_custom_logo()) {
        $classes[] = 'has-custom-logo';
    }

    return $classes;
}
add_filter('body_class', 'policy_pilots_body_classes');

/**
 * Force background color
 */
function policy_pilots_force_background_color() {
    echo '<style type="text/css">
        html, body, .site, #page {
            background: #d5d8e0 !important;
            background-color: #d5d8e0 !important;
        }
    </style>';
}
add_action('wp_head', 'policy_pilots_force_background_color');
?>
