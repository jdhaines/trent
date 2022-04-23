<?php
namespace BooklyRecurringAppointments\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyRecurringAppointments\Lib;

/**
 * Class Shared
 * @package BooklyRecurringAppointments\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function enqueueBookingAssets()
    {
        $link_script = get_option( 'bookly_gen_link_assets_method' ) == 'enqueue' ? 'wp_enqueue_script' : 'wp_register_script';
        $version     = Lib\Plugin::getVersion();
        $bookly_url  = plugins_url( '', BooklyLib\Plugin::getMainFile() );
        call_user_func( $link_script, 'bookly-recurring', $bookly_url . '/backend/resources/js/moment.min.js', array(), $version );
    }

    /**
     * @inheritdoc
     */
    public static function printBookingAssets()
    {
        wp_print_scripts( 'bookly-recurring' );
    }
}