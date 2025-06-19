<?php
/**
 * The footer for Policy Pilots Coming Soon theme
 *
 * @package PolicyPilots
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

    </main><!-- #main -->

    <!-- Minimal Footer for Coming Soon Page -->
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-content">
            <p class="copyright">
                <?php
                printf(
                    /* translators: 1: Copyright year, 2: Site name */
                    esc_html__('© %1$s %2$s. All rights reserved.', 'policy-pilots'),
                    date('Y'),
                    get_bloginfo('name')
                );
                ?>
            </p>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
