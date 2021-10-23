<?php
/* @var $this Newsletter */
/* @var $wpdb wpdb */

defined('ABSPATH') || exit;

include_once NEWSLETTER_INCLUDES_DIR . '/controls.php';
$controls = new NewsletterControls();

if ($controls->is_action('delete_logs')) {
    $files = glob(WP_CONTENT_DIR . '/logs/newsletter/*.txt');
    foreach ($files as $file) {
        if (is_file($file))
            unlink($file);
    }
    $secret = NewsletterModule::get_token(8);
    update_option('newsletter_logger_secret', $secret);
    $controls->messages = 'Logs deleted';
}

?>


<div class="wrap tnp-main-status" id="tnp-wrap">

    <?php include NEWSLETTER_DIR . '/tnp-header.php'; ?>

    <div id="tnp-heading">

        <h2><?php _e('Logs', 'newsletter') ?></h2>

    </div>

    <div id="tnp-body">

        <form method="post" action="">
            <?php $controls->init(); ?>
           

            <ul class="tnp-log-files">
                <?php
                $files = glob(WP_CONTENT_DIR . '/logs/newsletter/*.txt'); // get all file names
                foreach ($files as $file) { // iterate files
                    echo '<li><a href="' . WP_CONTENT_URL . '/logs/newsletter/' . basename($file) . '" target="_blank">' . basename($file) . '</a>';
                    echo ' <span class="tnp-log-size">(' . size_format(filesize($file)) . ')</span>';
                    echo '</li>';
                }
                ?>
            </ul>

            <?php $controls->button('delete_logs', 'Delete all'); ?>

        </form>
    </div>

    <?php include NEWSLETTER_DIR . '/tnp-footer.php'; ?>

</div>
