<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;

Buttons::renderCustom( 'bookly-view-series', 'btn-default btn-lg pull-left bookly-margin-left-remove', __( 'View Series', 'bookly-recurring-appointments' ), array( 'ng-click' => 'schViewSeries($event)', 'ng-show' => 'form.series_id' ) );
Buttons::renderCustom( 'bookly-schedule-back', 'btn-default btn-lg', __( 'Back', 'bookly' ), array( 'ng-click' => 'form.screen = \'main\'', 'ng-show' => 'form.screen == \'schedule\'' ) );
Buttons::renderCustom( 'bookly-schedule', 'btn-success btn-lg', __( 'Next', 'bookly' ), array( 'ng-click' => 'schSchedule($event)', 'ng-show' => 'form.repeat.enabled && form.screen == \'main\'', 'ng-disabled' => '!form.service || (!form.service.id && !form.custom_service_name) || form.customers.length == 0' ) );