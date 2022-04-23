<?php
namespace BooklyRecurringAppointments\Backend\Components\Dialogs\Appointment\ProxyProviders;

use BooklyRecurringAppointments\Lib;
use Bookly\Backend\Components\Dialogs\Appointment\Edit\Proxy\RecurringAppointments as RecurringAppointmentsProxy;

/**
 * Class Local
 * @package BooklyRecurringAppointments\Backend\Components\Dialogs\Appointment
 */
class Local extends RecurringAppointmentsProxy
{
    /**
     * Add Recurring sub form in edit appointment dialog.
     */
    public static function renderSubForm()
    {
        if ( Lib\Plugin::enabled() ) {
            /** @var \WP_Locale $wp_locale */
            global $wp_locale;

            $start_of_week = get_option( 'start_of_week' );
            $weekdays      = array( 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat' );

            // Sort days considering start_of_week;
            uksort( $weekdays, function ( $a, $b ) use ( $start_of_week ) {
                $a -= $start_of_week;
                $b -= $start_of_week;
                if ( $a < 0 ) {
                    $a += 7;
                }
                if ( $b < 0 ) {
                    $b += 7;
                }

                return $a - $b;
            } );

            self::renderTemplate( 'sub_form', array( 'weekdays' => $weekdays, 'weekday_abbrev' => array_values( $wp_locale->weekday_abbrev ) ) );
        }
    }

    /**
     * Render schedule in edit appointment dialog.
     */
    public static function renderSchedule()
    {
        if ( Lib\Plugin::enabled() ) {
            self::renderTemplate( 'schedule' );
        }
    }
}