<?php
/**
 * The footer for the Architects Certificate theme
 *
 * @package ArchitectsCertificate
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

    </main><!-- #main -->

    <!-- Footer -->
    <footer id="colophon" class="site-footer bg-gray-900 text-white py-16 no-print" role="contentinfo">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Footer Column 1 - Company Info -->
                <div class="footer-column">
                    <div class="footer-branding flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold"><?php bloginfo('name'); ?></span>
                    </div>
                    
                    <p class="text-gray-400 mb-4">
                        <?php 
                        $description = get_bloginfo('description');
                        if ($description) {
                            echo esc_html($description);
                        } else {
                            esc_html_e('Professional architect certification services across the United Kingdom. Trusted by architects nationwide.', 'architects-certificate');
                        }
                        ?>
                    </p>
                    
                    <div class="contact-info space-y-2">
                        <div class="flex items-center space-x-2 text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('phone_number', '0800 123 4567'))); ?>" class="hover:text-white transition-colors">
                                <?php echo esc_html(get_theme_mod('phone_number', '0800 123 4567')); ?>
                            </a>
                        </div>
                        
                        <div class="flex items-center space-x-2 text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('email_address', 'info@architectscertificates.com')); ?>" class="hover:text-white transition-colors">
                                <?php echo esc_html(get_theme_mod('email_address', 'info@architectscertificates.com')); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Column 2 - Services -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3 class="text-lg font-semibold mb-4"><?php esc_html_e('Services', 'architects-certificate'); ?></h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Professional Registration', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Document Verification', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Compliance Certification', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Portfolio Review', 'architects-certificate'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 3 - Company -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3 class="text-lg font-semibold mb-4"><?php esc_html_e('Company', 'architects-certificate'); ?></h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('About Us', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Our Team', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Careers', 'architects-certificate'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('News', 'architects-certificate'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 4 - Contact -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3 class="text-lg font-semibold mb-4"><?php esc_html_e('Contact', 'architects-certificate'); ?></h3>
                        <div class="space-y-3 text-gray-400">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span><?php echo esc_html(get_theme_mod('business_address', 'London, United Kingdom')); ?></span>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('email_address', 'info@architectscertificates.com')); ?>" class="hover:text-white transition-colors">
                                    <?php echo esc_html(get_theme_mod('email_address', 'info@architectscertificates.com')); ?>
                                </a>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span><?php echo esc_html(get_theme_mod('business_hours', 'Mon-Fri: 9AM-6PM')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom border-t border-gray-800 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="copyright text-gray-400 text-sm">
                        <p>
                            <?php
                            printf(
                                /* translators: 1: Copyright year, 2: Site name */
                                esc_html__('© %1$s %2$s. All rights reserved.', 'architects-certificate'),
                                date('Y'),
                                get_bloginfo('name')
                            );
                            ?>
                        </p>
                    </div>
                    
                    <div class="footer-links flex space-x-6 mt-4 md:mt-0">
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'menu_class'     => 'flex space-x-6',
                                'container'      => false,
                                'depth'          => 1,
                                'link_before'    => '<span class="text-gray-400 hover:text-white text-sm transition-colors">',
                                'link_after'     => '</span>',
                            ));
                        } else {
                            // Fallback footer links
                            ?>
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors"><?php esc_html_e('Privacy Policy', 'architects-certificate'); ?></a>
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors"><?php esc_html_e('Terms of Service', 'architects-certificate'); ?></a>
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors"><?php esc_html_e('Cookie Policy', 'architects-certificate'); ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
