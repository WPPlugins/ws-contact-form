<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class WS_Contact_Form_admin {
    
    public function __construct(){
		add_action( 'admin_menu', array( $this, 'ws_contact_form_settings_create_menu' ) );
		add_action( 'admin_init', array( $this, 'ws_contact_form_settings_register' ) );
		add_filter( 'plugin_action_links_ws-contact-form/ws-contact-form.php', array( $this, 'ws_contact_form_action_links' ) );
    }
    
    public function ws_contact_form_settings_create_menu() {
        add_options_page( __( 'WS Contact Form Settings', 'ws-contact-form' ), 'WS Contact Form', 'manage_options', 'ws-contact-form-settings', array( $this, 'ws_contact_form_settings_page' ) );
    }

    public function ws_contact_form_settings_register() {
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-title-option' );
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-email-title-option' );
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-sender-name-option' );
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-sender-email-option' );
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-recipient-name-option' );
        register_setting( 'ws-contact-form-settings-group', 'wscontact-form-recipient-email-option' );
    }

    public function ws_contact_form_settings_page() {
        ?>
        <div class="wrap">
            <h2><?php _e( 'WS Contact Form Settings', 'ws-contact-form' ); ?></h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'ws-contact-form-settings-group' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Form title', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-title-option" value="<?php echo get_option('wscontact-form-title-option'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Email title', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-email-title-option" value="<?php echo get_option('wscontact-form-email-title-option'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Sender name', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-sender-name-option" value="<?php echo get_option('wscontact-form-sender-name-option'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Sender email', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-sender-email-option" value="<?php echo get_option('wscontact-form-sender-email-option'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Recipient name', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-recipient-name-option" value="<?php echo get_option('wscontact-form-recipient-name-option'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php echo _e( 'Recipient email', 'ws-contact-form' ); ?></th>
                        <td>
                            <input class="regular-text" type="text" name="wscontact-form-recipient-email-option" value="<?php echo get_option('wscontact-form-recipient-email-option'); ?>" />
                        </td>
                    </tr>
                </table>

                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </p>

            </form>
            
            <h2 class="title"><?php echo _e( 'Shortcode', 'ws-contact-form' ); ?></h2>
            <p><?php echo _e( 'To get the form getting working properly it is important to fill all fields above', 'ws-contact-form' ); ?></p>
            <input class="regular-text" type="text" name="wscontact-form-shortcode" value="[ws-contact-form]" />
            <p id="ws-contact-form-shortcode-description" class="description"><?php echo _e( 'Paste this code to your post/page/widget in Text view activated', 'ws-contact-form' ); ?></p>
        </div>
        <?php
    }

    public function  ws_contact_form_action_links( $links ) {
        $mylinks = array(
            '<a href="' . admin_url( 'options-general.php?page=ws-contact-form-settings' ) . '">Settings</a>',
        );
        return array_merge( $links, $mylinks );
    }
}
?>