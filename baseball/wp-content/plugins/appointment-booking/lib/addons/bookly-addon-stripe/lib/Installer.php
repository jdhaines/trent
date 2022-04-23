<?php
namespace BooklyStripe\Lib;

/**
 * Class Installer
 * @package BooklyStripe\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $status = get_option( 'bookly_pmt_stripe', '0' );
        $this->options = array(
            'bookly_stripe_enabled'         => $status == 'disabled' ? '0' : $status,
            'bookly_stripe_publishable_key' => get_option( 'bookly_pmt_stripe_publishable_key', '' ),
            'bookly_stripe_secret_key'      => get_option( 'bookly_pmt_stripe_secret_key', '' ),
            'bookly_stripe_increase'        => '0',
            'bookly_stripe_addition'        => '0',
        );

        $deprecated = array(
            'bookly_pmt_stripe',
            'bookly_pmt_stripe_publishable_key',
            'bookly_pmt_stripe_secret_key',
        );
        foreach ( $deprecated as $option_name ) {
            delete_option( $option_name );
        }
    }

}