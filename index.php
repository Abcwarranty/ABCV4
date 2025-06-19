<?php
/**
 * The main template file for Policy Pilots Coming Soon
 *
 * @package PolicyPilots
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="coming-soon-wrapper">
    <div class="coming-soon-content">
        <!-- Logo Section -->
        <div class="logo-container">
            <div class="logo-image">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/policy-pilots-logo.png'); ?>" 
                         alt="<?php bloginfo('name'); ?>" />
                <?php endif; ?>
            </div>
        </div>

        <!-- Coming Soon Text -->
        <div class="coming-soon-text">
            <h1 class="coming-soon-title">
                <?php echo esc_html(get_theme_mod('coming_soon_title', __('Coming Soon', 'policy-pilots'))); ?>
            </h1>
            <p class="coming-soon-description">
                <?php echo esc_html(get_theme_mod('coming_soon_description', __('Your AI co-pilot for smarter insurance decisions is preparing for takeoff', 'policy-pilots'))); ?>
            </p>
        </div>

        <!-- Email Subscription Form -->
        <div class="email-form-container">
            <form id="subscription-form" class="email-form">
                <div class="form-group">
                    <div class="input-wrapper">
                        <svg class="input-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <input 
                            type="email" 
                            id="subscriber-email" 
                            name="email" 
                            class="email-input" 
                            placeholder="<?php esc_attr_e('Get notified when we launch', 'policy-pilots'); ?>" 
                            required 
                        />
                    </div>
                    <button type="submit" class="submit-button">
                        <span class="button-text"><?php esc_html_e('Notify Me', 'policy-pilots'); ?></span>
                        <span class="loading-text" style="display: none;">
                            <span class="loading-spinner"></span>
                            <?php esc_html_e('Sending...', 'policy-pilots'); ?>
                        </span>
                    </button>
                </div>
                <p class="form-description">
                    <?php esc_html_e('Be the first to know when Policy Pilots takes flight', 'policy-pilots'); ?>
                </p>
            </form>

            <!-- Success Message (hidden by default) -->
            <div id="success-message" class="success-message" style="display: none;">
                <div class="success-header">
                    <svg class="success-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="success-title"><?php esc_html_e('You\'re on the list!', 'policy-pilots'); ?></span>
                </div>
                <p class="success-text">
                    <?php echo esc_html(get_theme_mod('success_message', __('We\'ll notify you as soon as Policy Pilots is ready for takeoff.', 'policy-pilots'))); ?>
                </p>
            </div>
        </div>

        <!-- Social Proof -->
        <div class="social-proof">
            <p class="social-proof-text">
                <?php esc_html_e('Join the flight crew preparing for smarter insurance', 'policy-pilots'); ?>
            </p>
            <div class="feature-badges">
                <span class="feature-badge"><?php esc_html_e('AI-Powered', 'policy-pilots'); ?></span>
                <span class="feature-badge"><?php esc_html_e('Smart Comparison', 'policy-pilots'); ?></span>
                <span class="feature-badge"><?php esc_html_e('Auto-Switch', 'policy-pilots'); ?></span>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="floating-dot floating-dot-1"></div>
        <div class="floating-dot floating-dot-2"></div>
        <div class="floating-dot floating-dot-3"></div>
    </div>
</main>

<?php get_footer(); ?>
