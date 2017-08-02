<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
delete_option( 'wscontact-form-title-option' );
delete_option( 'wscontact-form-email-title-option' );
delete_option( 'wscontact-form-sender-name-option' );
delete_option( 'wscontact-form-sender-email-option' );
delete_option( 'wscontact-form-recipient-name-option' );
delete_option( 'wscontact-form-recipient-email-option' );
?>