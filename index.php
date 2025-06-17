<?php
/**
 * The main template file for the Architects Certificate theme
 *
 * @package ArchitectsCertificate
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Hero Section -->
<section id="hero" class="hero-gradient py-20">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="hero-content fade-in">
                <div class="inline-block mb-4 bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                    <?php esc_html_e('Professional Certification', 'architects-certificate'); ?>
                </div>
                
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    <?php echo esc_html(get_theme_mod('hero_title', __("Architect's Certificate Services in the UK", 'architects-certificate'))); ?>
                </h1>
                
                <p class="text-xl text-gray-600 mb-8">
                    <?php echo esc_html(get_theme_mod('hero_description', __('Get your professional architect\'s certificate quickly and efficiently. We provide comprehensive certification services for architects across the United Kingdom.', 'architects-certificate'))); ?>
                </p>
                
                <div class="hero-actions flex flex-col sm:flex-row gap-4 mb-8">
                    <button class="btn-primary" onclick="scrollToSection('services')">
                        <?php esc_html_e('Learn More', 'architects-certificate'); ?>
                    </button>
                </div>
                
                <div class="hero-features flex flex-wrap items-center gap-6">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600"><?php esc_html_e('Fast Processing', 'architects-certificate'); ?></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600"><?php esc_html_e('UK Certified', 'architects-certificate'); ?></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600"><?php esc_html_e('Professional Support', 'architects-certificate'); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="hero-card relative slide-up">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900"><?php esc_html_e('Quick Application', 'architects-certificate'); ?></h3>
                        <p class="text-gray-600"><?php esc_html_e('Get certified in 3 simple steps', 'architects-certificate'); ?></p>
                    </div>
                    
                    <div class="application-steps space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                1
                            </div>
                            <span class="text-gray-700"><?php esc_html_e('Submit Application', 'architects-certificate'); ?></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                2
                            </div>
                            <span class="text-gray-700"><?php esc_html_e('Document Review', 'architects-certificate'); ?></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                3
                            </div>
                            <span class="text-gray-700"><?php esc_html_e('Receive Certificate', 'architects-certificate'); ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <button class="btn-primary w-full" onclick="openApplicationForm()">
                            <?php esc_html_e('Apply Now', 'architects-certificate'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('Our Certification Services', 'architects-certificate'); ?>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                <?php esc_html_e('We offer comprehensive architect certification services to help you advance your career and meet professional requirements in the UK.', 'architects-certificate'); ?>
            </p>
        </div>

        <div class="services-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Get services from custom post type or use default services
            $services_query = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $service_features = get_post_meta(get_the_ID(), '_service_features', true);
                    $features_array = !empty($service_features) ? explode("\n", $service_features) : array();
                    ?>
                    <div class="service-card border-2 border-gray-200 hover:border-blue-200 transition-all duration-300 rounded-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <?php if ($service_icon) : ?>
                                <i class="<?php echo esc_attr($service_icon); ?> text-blue-600"></i>
                            <?php else : ?>
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php the_title(); ?></h3>
                        <p class="text-gray-600 mb-4"><?php the_excerpt(); ?></p>
                        <?php if (!empty($features_array)) : ?>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <?php foreach ($features_array as $feature) : ?>
                                    <?php if (trim($feature)) : ?>
                                        <li class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span><?php echo esc_html(trim($feature)); ?></span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default services if none exist
                $default_services = array(
                    array(
                        'title' => __('Professional Registration', 'architects-certificate'),
                        'description' => __('Complete registration process for qualified architects seeking professional status.', 'architects-certificate'),
                        'features' => array(
                            __('ARB Registration', 'architects-certificate'),
                            __('RIBA Membership', 'architects-certificate'),
                            __('Professional Indemnity', 'architects-certificate')
                        ),
                        'color' => 'blue'
                    ),
                    array(
                        'title' => __('Document Verification', 'architects-certificate'),
                        'description' => __('Professional verification and authentication of architectural qualifications and experience.', 'architects-certificate'),
                        'features' => array(
                            __('Qualification Verification', 'architects-certificate'),
                            __('Experience Assessment', 'architects-certificate'),
                            __('Portfolio Review', 'architects-certificate')
                        ),
                        'color' => 'green'
                    ),
                    array(
                        'title' => __('Compliance Certification', 'architects-certificate'),
                        'description' => __('Ensure your practice meets all UK regulatory requirements and building standards.', 'architects-certificate'),
                        'features' => array(
                            __('Building Regulations', 'architects-certificate'),
                            __('Planning Permission', 'architects-certificate'),
                            __('Health & Safety', 'architects-certificate')
                        ),
                        'color' => 'purple'
                    )
                );

                foreach ($default_services as $service) :
                    $color_classes = array(
                        'blue' => 'bg-blue-100 text-blue-600',
                        'green' => 'bg-green-100 text-green-600',
                        'purple' => 'bg-purple-100 text-purple-600'
                    );
                    ?>
                    <div class="service-card border-2 border-gray-200 hover:border-blue-200 transition-all duration-300 rounded-lg p-6">
                        <div class="w-12 h-12 <?php echo esc_attr($color_classes[$service['color']]); ?> rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <?php if ($service['color'] === 'blue') : ?>
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                <?php elseif ($service['color'] === 'green') : ?>
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                <?php else : ?>
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                <?php endif; ?>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($service['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo esc_html($service['description']); ?></p>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <?php foreach ($service['features'] as $feature) : ?>
                                <li class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span><?php echo esc_html($feature); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section id="stats" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="stats-grid grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="stat-item text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">500+</div>
                <div class="text-gray-600"><?php esc_html_e('Certified Architects', 'architects-certificate'); ?></div>
            </div>
            <div class="stat-item text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">15+</div>
                <div class="text-gray-600"><?php esc_html_e('Years Experience', 'architects-certificate'); ?></div>
            </div>
            <div class="stat-item text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">98%</div>
                <div class="text-gray-600"><?php esc_html_e('Success Rate', 'architects-certificate'); ?></div>
            </div>
            <div class="stat-item text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">24/7</div>
                <div class="text-gray-600"><?php esc_html_e('Support Available', 'architects-certificate'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('What Our Clients Say', 'architects-certificate'); ?>
            </h2>
            <p class="text-xl text-gray-600">
                <?php esc_html_e('Trusted by architects across the United Kingdom', 'architects-certificate'); ?>
            </p>
        </div>

        <div class="testimonials-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $testimonials_query = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));

            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $client_name = get_post_meta(get_the_ID(), '_client_name', true);
                    $client_title = get_post_meta(get_the_ID(), '_client_title', true);
                    $client_company = get_post_meta(get_the_ID(), '_client_company', true);
                    $rating = get_post_meta(get_the_ID(), '_rating', true);
                    ?>
                    <div class="testimonial-card border border-gray-200 rounded-lg p-6 transition-all duration-300">
                        <div class="star-rating flex items-center mb-4">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <svg class="star w-4 h-4 <?php echo $i <= $rating ? 'filled text-yellow-400' : 'empty text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <blockquote class="text-gray-600 mb-4">
                            "<?php the_content(); ?>"
                        </blockquote>
                        <div class="client-info flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900"><?php echo esc_html($client_name); ?></div>
                                <div class="text-sm text-gray-600">
                                    <?php 
                                    echo esc_html($client_title);
                                    if ($client_company) {
                                        echo ', ' . esc_html($client_company);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default testimonials
                $default_testimonials = array(
                    array(
                        'content' => __('Excellent service and very professional. They helped me get my architect\'s certificate quickly and efficiently. Highly recommended!', 'architects-certificate'),
                        'name' => __('Sarah Johnson', 'architects-certificate'),
                        'title' => __('Chartered Architect', 'architects-certificate'),
                        'rating' => 5
                    ),
                    array(
                        'content' => __('The team was incredibly helpful throughout the entire process. Professional, knowledgeable, and efficient service.', 'architects-certificate'),
                        'name' => __('Michael Brown', 'architects-certificate'),
                        'title' => __('Senior Architect', 'architects-certificate'),
                        'rating' => 5
                    ),
                    array(
                        'content' => __('Fast, reliable, and professional service. They made the certification process straightforward and stress-free.', 'architects-certificate'),
                        'name' => __('Emma Wilson', 'architects-certificate'),
                        'title' => __('Practice Director', 'architects-certificate'),
                        'rating' => 5
                    )
                );

                foreach ($default_testimonials as $testimonial) :
                    ?>
                    <div class="testimonial-card border border-gray-200 rounded-lg p-6 transition-all duration-300">
                        <div class="star-rating flex items-center mb-4">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <svg class="star w-4 h-4 <?php echo $i <= $testimonial['rating'] ? 'filled text-yellow-400' : 'empty text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <blockquote class="text-gray-600 mb-4">
                            "<?php echo esc_html($testimonial['content']); ?>"
                        </blockquote>
                        <div class="client-info flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900"><?php echo esc_html($testimonial['name']); ?></div>
                                <div class="text-sm text-gray-600"><?php echo esc_html($testimonial['title']); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="cta" class="py-20 bg-blue-600">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            <?php esc_html_e('Ready to Get Your Architect\'s Certificate?', 'architects-certificate'); ?>
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            <?php esc_html_e('Join hundreds of certified architects who trust our professional services. Start your application today and advance your career.', 'architects-certificate'); ?>
        </p>
        <div class="cta-buttons flex flex-col sm:flex-row gap-4 justify-center">
            <button class="btn-outline-white" onclick="openApplicationForm()">
                <?php esc_html_e('Start Application', 'architects-certificate'); ?>
            </button>
            <button class="btn-outline-white" onclick="scrollToSection('contact')">
                <?php esc_html_e('Contact Us', 'architects-certificate'); ?>
            </button>
        </div>
    </div>
</section>

<?php get_footer(); ?>
