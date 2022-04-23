<?php
namespace BooklyRecurringAppointments\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;

/**
 * Class Shared
 * @package BooklyRecurringAppointments\Backend\Modules\Settings\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function renderSettingsMenu()
    {
        self::renderTemplate( 'settings_menu' );
    }

    /**
     * @inheritdoc
     */
    public static function renderSettingsForm()
    {
        self::renderTemplate( 'settings_form' );
    }

    /**
     * @inheritdoc
     */
    public static function renderUrlSettings()
    {
        self::renderTemplate( 'url_settings' );
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        if ( $tab == 'recurring_appointments' && ! empty( $_post ) ) {
            $options = array(
                'bookly_recurring_appointments_enabled',
                'bookly_recurring_appointments_payment',
            );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly' );
        } else if ( $tab == 'url' ) {
            update_option( 'bookly_recurring_appointments_approve_page_url', $_post['bookly_recurring_appointments_approve_page_url'] );
            update_option( 'bookly_recurring_appointments_approve_denied_page_url', $_post['bookly_recurring_appointments_approve_denied_page_url'] );
        }

        return $alert;
    }
}