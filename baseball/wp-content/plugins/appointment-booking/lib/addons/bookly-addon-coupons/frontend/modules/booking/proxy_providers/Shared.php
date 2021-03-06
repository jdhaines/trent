<?php
namespace BooklyCoupons\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyCoupons\Frontend\Modules\Booking\Lib;

/**
 * Class Shared
 * @package BooklyCoupons\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function prepareBookingErrorCodes( array $errors )
    {
        $errors[ Lib\Errors::INVALID ] = __( 'This coupon code is invalid or has been used', 'bookly-coupons' );
        $errors[ Lib\Errors::EXPIRED ] = __( 'This coupon code has expired', 'bookly-coupons' );

        return $errors;
    }
}