<?php
namespace BooklyPayuLatam\Lib;

/**
 * Class Installer
 * @package BooklyPayuLatam\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $status = get_option( 'bookly_pmt_payu_latam', '0' );
        $this->options = array(
            'bookly_payu_latam_enabled'         => $status == 'disabled' ? '0' : $status,
            'bookly_payu_latam_api_key'         => get_option( 'bookly_pmt_payu_latam_api_key' ),
            'bookly_payu_latam_api_account_id'  => get_option( 'bookly_pmt_payu_latam_api_account_id' ),
            'bookly_payu_latam_api_merchant_id' => get_option( 'bookly_pmt_payu_latam_api_merchant_id' ),
            'bookly_payu_latam_sandbox'         => get_option( 'bookly_pmt_payu_latam_sandbox', '0' ),
            'bookly_payu_latam_timeout'         => '0',
            'bookly_payu_latam_increase'        => '0',
            'bookly_payu_latam_addition'        => '0',
            'bookly_payu_latam_send_tax'        => '0',
        );

        $deprecated = array(
            'bookly_pmt_payu_latam',
            'bookly_pmt_payu_latam_api_key',
            'bookly_pmt_payu_latam_api_account_id',
            'bookly_pmt_payu_latam_api_merchant_id',
            'bookly_pmt_payu_latam_sandbox',
        );
        foreach ( $deprecated as $option_name ) {
            delete_option( $option_name );
        }
    }

}