<?php
namespace BooklyMollie\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;
use BooklyMollie\Lib;

/**
 * Class Shared
 * @package BooklyMollie\Backend\Modules\Settings\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySettings( $payment_data )
    {
        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate( 'payment_settings', array(), false );

        return $payment_data;
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        $options = array(
            'bookly_mollie_enabled',
            'bookly_mollie_api_key',
            'bookly_mollie_timeout',
            'bookly_mollie_increase',
            'bookly_mollie_addition',
        );
        foreach ( $options as $option_name ) {
            if ( array_key_exists( $option_name, $_post ) ) {
                update_option( $option_name, trim( $_post[ $option_name ] ) );
            }
        }

        return $alert;
    }
}