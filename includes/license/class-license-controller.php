<?php
defined('ABSPATH') || die('Direct access is not allow');

class Pgc_License_Controller
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'pgc_license_menu'));
        add_action('admin_init', array($this, 'pgc_register_option'));
        add_action('admin_init', array($this, 'pgc_activate_license'));
        add_action('admin_notices', array($this, 'pgc_admin_notices'));
    }

    /**
     * This is a means of catching errors from the activation method above and displaying it to the customer
     */
    public function pgc_admin_notices()
    {
        if (isset($_GET['sl_activation']) && !empty($_GET['message'])) {
            switch ($_GET['sl_activation']) {
                case 'false':
                    $message = urldecode($_GET['message']); ?>
                    <div class="error">
                        <p><?php echo $message; ?></p>
                    </div><?php
                            break;
                        case 'true':
                        default:
                            // Developers can put a custom success message here for when activation is successful if they way.
                            break;
                    }
                }
            }


            public function pgc_activate_license()
            {

                // listen for our activate button to be clicked
                if (isset($_POST['pgc_license_activate']) || isset($_POST['pgc_license_deactivate'])) {

                    // run a quick security check
                    if (!check_admin_referer('pgc_license_nonce', 'pgc_license_nonce'))
                        return; // get out if we didn't click the Activate button

                    // retrieve the license from the database
                    $license = trim(get_option('pgc_license_key'));

                    $action = isset($_POST['pgc_license_activate']) ? 'activate_license' : 'deactivate_license';

                    // data to send in our API request
                    $api_params = array(
                        'edd_action' => $action,
                        'license'    => $license,
                        'item_id'    => PGC_REMOTE_POST_ID, // The ID of the item in EDD
                        'url'        => home_url()
                    );

                    // Call the custom API.
                    $response = wp_remote_post( PGC_REMOTE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

                    // make sure the response came back okay
                    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {

                        $message =  (is_wp_error($response) && !empty($response->get_error_message())) ? $response->get_error_message() : __('An error occurred, please try again.', 'post-grid-carousel-ultimate-pro');
                    } else {

                        $license_data = json_decode(wp_remote_retrieve_body($response));
                        if (!$license_data) {
                            $message =  (is_wp_error($response) && !empty($response->get_error_message())) ? $response->get_error_message() : __('Response not found!', 'post-grid-carousel-ultimate-pro');
                        }
                        if (false === $license_data->success) {

                            switch ($license_data->error) {

                                case 'expired':

                                    $message = sprintf(
                                        __('Your license key expired on %s.', 'post-grid-carousel-ultimate-pro'),
                                        date_i18n(get_option('date_format'), strtotime($license_data->expires, current_time('timestamp')))
                                    );
                                    break;

                                case 'revoked':

                                    $message = __('Your license key has been disabled.', 'post-grid-carousel-ultimate-pro');
                                    break;

                                case 'missing':

                                    $message = __('Invalid license.', 'post-grid-carousel-ultimate-pro');
                                    break;

                                case 'invalid':
                                case 'site_inactive':

                                    $message = __('Your license is not active for this URL.', 'post-grid-carousel-ultimate-pro');
                                    break;

                                case 'item_name_mismatch':

                                    $message = sprintf(__('This appears to be an invalid license key.', 'post-grid-carousel-ultimate-pro'));
                                    break;

                                case 'no_activations_left':

                                    $message = __('Your license key has reached its activation limit.', 'post-grid-carousel-ultimate-pro');
                                    break;

                                default:

                                    $message = __('An error occurred, please try again.', 'post-grid-carousel-ultimate-pro');
                                    break;
                            }
                        }
                    }

                    // Check if anything passed on a message constituting a failure
                    if (!empty($message)) {
                        $base_url = admin_url('edit.php?post_type=adl-shortcode&page=pgc-license');
                        $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);

                        wp_redirect($redirect);
                        exit();
                    }

                    // $license_data->license will be either "valid" or "invalid"

                    update_option('pgc_license_status', $license_data->license);
                    wp_redirect(admin_url('edit.php?post_type=adl-shortcode&page=pgc-license'));
                    exit();
                }
            }

            public function pgc_register_option()
            {
                // creates our settings in the options table
                register_setting('pgc_license', 'pgc_license_key', array($this, 'pgc_sanitize_license'));
            }

            public function pgc_sanitize_license($new)
            {
                $old = get_option('pgc_license_key');
                if ($old && $old != $new) {
                    delete_option('pgc_license_status'); // new license has been entered, so must reactivate
                }
                return $new;
            }

            public function pgc_license_menu()
            {
                add_submenu_page(
                    'edit.php?post_type=adl-shortcode',
                    __('License', 'post-grid-carousel-ultimate-pro'),
                    __("<span style='color: #fc21ff;font-weight: bold;'>License</span>", 'post-grid-carousel-ultimate-pro'),
                    'manage_options',
                    'pgc-license',
                    array($this, 'show_license_page')
                );
            }

            public function show_license_page()
            {
                $license = get_option('pgc_license_key');
                $status  = get_option('pgc_license_status');
                            ?>
        <div class="wrap">
            <h2><?php _e('Plugin License Options', 'post-grid-carousel-ultimate-pro'); ?></h2>
            <form method="post" action="options.php">

                <?php settings_fields('pgc_license'); ?>

                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php _e('License Key', 'post-grid-carousel-ultimate-pro'); ?>
                            </th>
                            <td>
                                <input id="pgc_license_key" name="pgc_license_key" type="text" class="regular-text" value="<?php esc_attr_e($license); ?>" />
                                <label class="description" for="pgc_license_key"><?php _e('Enter your license key', 'post-grid-carousel-ultimate-pro'); ?></label>
                            </td>
                        </tr>
                        <?php if (false !== $license) { ?>
                            <tr valign="top">
                                <th scope="row" valign="top">
                                    <?php _e('Activate License', 'post-grid-carousel-ultimate-pro'); ?>
                                </th>
                                <td>
                                    <?php if ($status !== false && $status == 'valid') { ?>
                                        <span style="color:green;"><?php _e('active'); ?></span>
                                        <?php wp_nonce_field('pgc_license_nonce', 'pgc_license_nonce'); ?>
                                        <input type="submit" class="button-secondary" name="pgc_license_deactivate" value="<?php _e('Deactivate License', 'post-grid-carousel-ultimate-pro'); ?>" />
                                    <?php } else {
                                        wp_nonce_field('pgc_license_nonce', 'pgc_license_nonce'); ?>
                                        <input type="submit" class="button-secondary" name="pgc_license_activate" value="<?php _e('Activate License', 'post-grid-carousel-ultimate-pro'); ?>" />
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php submit_button(); ?>

            </form>
    <?php
            }
        }
