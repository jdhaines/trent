<?php
namespace BooklyCustomFields\Frontend\Modules\CustomerProfile\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\CustomerProfile\Proxy\CustomFields as CustomFieldsProxy;
use BooklyCustomFields\Lib;

/**
 * Class Local
 * @package BooklyCustomFields\Frontend\Modules\CustomerProfile
 */
class Local extends CustomFieldsProxy
{
    /**
     * Render custom fields in customer profile.
     *
     * @param array $field_ids
     * @param array $appointment_data
     */
    public static function renderCustomerProfileRow( array $field_ids, array $appointment_data )
    {
        $field_values = array();
        $ca = new BooklyLib\Entities\CustomerAppointment( $appointment_data );
        foreach ( Lib\ProxyProviders\Local::getForCustomerAppointment( $ca, true ) as $field ) {
            $field_values[ $field['id'] ] = $field['value'];
        }

        self::renderTemplate( 'custom_fields', compact( 'field_ids', 'field_values' ) );
    }
}