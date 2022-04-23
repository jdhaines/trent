<?php
namespace BooklyRecurringAppointments\Backend\Modules\Appearance\ProxyProviders;

use Bookly\Backend\Modules\Appearance\Proxy;
use BooklyRecurringAppointments\Lib;

/**
 * Class Local
 * @package BooklyRecurringAppointments\Backend\Modules\Appearance\ProxyProviders
 */
class Local extends Proxy\RecurringAppointments
{
    /**
     * @inheritdoc
     */
    public static function renderInfoMessage()
    {
        if ( Lib\Plugin::enabled() ) {
            self::renderTemplate( 'info_message' );
        }
    }

}