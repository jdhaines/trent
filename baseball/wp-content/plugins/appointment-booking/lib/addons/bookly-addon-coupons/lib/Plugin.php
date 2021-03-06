<?php
namespace BooklyCoupons\Lib;

use BooklyCoupons\Backend\Modules as Backend;
use BooklyCoupons\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package BooklyCoupons\Lib
 */
abstract class Plugin extends \Bookly\Lib\Base\Plugin
{
    protected static $prefix;
    protected static $title;
    protected static $version;
    protected static $slug;
    protected static $directory;
    protected static $main_file;
    protected static $basename;
    protected static $text_domain;
    protected static $root_namespace;
    protected static $embedded;

    /**
     * Register hooks.
     */
    public static function registerHooks()
    {
        parent::registerHooks();

        // Init proxy.
        Backend\Appearance\ProxyProviders\Local::init();
        Backend\Appearance\ProxyProviders\Shared::init();
        Backend\Coupons\Ajax::init();
        Backend\Customers\ProxyProviders\Shared::init();
        Backend\Settings\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
            Frontend\Booking\Ajax::init();
            Frontend\Booking\ProxyProviders\Local::init();
            Frontend\Booking\ProxyProviders\Shared::init();
        }
        ProxyProviders\Local::init();
        ProxyProviders\Shared::init();
    }
}