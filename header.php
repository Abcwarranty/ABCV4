<?php
/**
 * The header for Policy Pilots Coming Soon theme
 *
 * @package PolicyPilots
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#3b82f6">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/policy-pilots-logo.png'); ?>" as="image">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link sr-only" href="#main"><?php esc_html_e('Skip to content', 'policy-pilots'); ?></a>

    <!-- Header -->
    <header id="masthead" class="site-header bg-white border-b shadow-sm" role="banner">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Site Title -->
                <div class="site-branding flex items-center space-x-3">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo-container">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-.181h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <?php if (is_front_page() && is_home()) : ?>
                                <h1 class="site-title text-xl font-bold">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title text-xl font-bold">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <nav id="site-navigation" class="main-navigation desktop-menu hidden md:flex items-center space-x-8" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'architects-certificate'); ?>">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'flex items-center space-x-8',
                            'container'      => false,
                            'depth'          => 2,
                            'link_before'    => '<span class="text-gray-700 hover:text-blue-600 font-medium transition-colors">',
                            'link_after'     => '</span>',
                        ));
                    } else {
                        // Fallback menu
                        ?>
                        <ul class="flex items-center space-x-8">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-blue-600 font-medium transition-colors"><?php esc_html_e('Home', 'architects-certificate'); ?></a></li>
                            <li><a href="#services" class="text-gray-700 hover:text-blue-600 font-medium transition-colors"><?php esc_html_e('Services', 'architects-certificate'); ?></a></li>
                            <li><a href="#about" class="text-gray-700 hover:text-blue-600 font-medium transition-colors"><?php esc_html_e('About', 'architects-certificate'); ?></a></li>
                            <li><a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors"><?php esc_html_e('Contact', 'architects-certificate'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions flex items-center space-x-4">
                    <!-- Contact Info -->
                    <div class="contact-info hidden lg:flex items-center space-x-2 text-sm text-gray-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span><?php echo esc_html(get_theme_mod('phone_number', '0800 123 4567')); ?></span>
                    </div>

                    <!-- CTA Button -->
                    <button class="btn-primary no-print" onclick="scrollToSection('cta')">
                        <?php esc_html_e('Get Quote', 'architects-certificate'); ?>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button class="mobile-menu-button md:hidden p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-expanded="false" aria-controls="mobile-menu">
                        <span class="sr-only"><?php esc_html_e('Open main menu', 'architects-certificate'); ?></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <nav id="mobile-menu" class="mobile-menu md:hidden" role="navigation" aria-label="<?php esc_attr_e('Mobile Menu', 'architects-certificate'); ?>">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'mobile-primary-menu',
                            'menu_class'     => 'space-y-1',
                            'container'      => false,
                            'depth'          => 2,
                            'link_before'    => '<span class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md font-medium transition-colors">',
                            'link_after'     => '</span>',
                        ));
                    } else {
                        // Fallback mobile menu
                        ?>
                        <ul class="space-y-1">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md font-medium transition-colors"><?php esc_html_e('Home', 'architects-certificate'); ?></a></li>
                            <li><a href="#services" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md font-medium transition-colors"><?php esc_html_e('Services', 'architects-certificate'); ?></a></li>
                            <li><a href="#about" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md font-medium transition-colors"><?php esc_html_e('About', 'architects-certificate'); ?></a></li>
                            <li><a href="#contact" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md font-medium transition-colors"><?php esc_html_e('Contact', 'architects-certificate'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                    
                    <!-- Mobile Contact Info -->
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-600">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span><?php echo esc_html(get_theme_mod('phone_number', '0800 123 4567')); ?></span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main id="main" class="site-main" role="main">
