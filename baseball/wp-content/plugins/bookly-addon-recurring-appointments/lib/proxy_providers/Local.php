<?php
namespace BooklyRecurringAppointments\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Lib\DataHolders\Booking as DataHolders;
use BooklyRecurringAppointments\Lib;

/**
 * Class Local
 * @package BooklyRecurringAppointments\Lib
 */
class Local extends BooklyLib\Proxy\RecurringAppointments
{
    /**
     * @inheritdoc
     */
    public static function hideChildAppointments( $default = false, BooklyLib\CartItem $cart_item )
    {
        if (
            $cart_item->getSeriesUniqueId()
            && get_option( 'bookly_recurring_appointments_payment' ) === 'first'
            && ( ! $cart_item->getFirstInSeries() )
        ) {
            return true;
        }

        return $default;
    }

    /**
     * @inheritdoc
     */
    public static function cancelPayment( $payment_id )
    {
        $ca_list_for_series = BooklyLib\Entities\Appointment::query( 'a' )
            ->leftJoin( 'CustomerAppointment', 'ca', 'ca.appointment_id = a.id' )
            ->where( 'ca.payment_id', $payment_id )
            ->whereNot( 'a.series_id', null )
            ->groupBy( 'a.series_id' )
            ->find();
        $series_ids = array_map( function( $appointment ) {
            /** @var \Bookly\Lib\Entities\Appointment $appointment */
            return $appointment->getSeriesId();
        }, $ca_list_for_series );

        /** @var \Bookly\Lib\Entities\CustomerAppointment[] $ca_list */
        $ca_list = BooklyLib\Entities\CustomerAppointment::query( 'ca' )
            ->leftJoin( 'Appointment', 'a', 'ca.appointment_id = a.id' )
            ->whereIn( 'a.series_id', $series_ids )
            ->find();

        foreach ( $ca_list as $ca ) {
            $ca->deleteCascade();
        }
    }

    /**
     * @inheritdoc
     */
    public static function sendRecurring(
        DataHolders\Series $series,
        DataHolders\Order $order,
        $codes_data = array(),
        $to_staff = true,
        $to_customer = true
    )
    {
        Lib\NotificationSender::sendRecurring( $series, $order, $codes_data, $to_staff, $to_customer );
    }
}