<?php
namespace BooklyGroupBooking\Backend\Modules\Appearance\ProxyProviders;

use Bookly\Backend\Modules\Appearance\Proxy;
use BooklyGroupBooking\Lib;

/**
 * Class Shared
 * @package BooklyGroupBooking\Backend\Modules\Appearance\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function prepareOptions( array $options_to_save, array $options )
    {
        if ( Lib\Plugin::enabled() ) {
            $options_to_save = array_merge( $options_to_save, array_intersect_key( $options, array_flip( array (
                'bookly_group_booking_app_show_nop',
                'bookly_l10n_label_number_of_persons',
            ) ) ) );
        }

        return $options_to_save;
    }

    /**
     * @inheritdoc
     */
    public static function renderTimeStepSettings()
    {
        if ( Lib\Plugin::enabled() ) {
            self::renderTemplate( 'time_step_settings' );
        }
    }
}