<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Settings\Inputs;
use Bookly\Lib\Utils\Common;

Inputs::renderText( 'bookly_recurring_appointments_approve_page_url', __( 'Approve recurring appointment URL (success)', 'bookly-recurring-appointments' ), __( 'Set the URL of a page that is shown to staff after they successfully approved recurring appointment.', 'bookly-recurring-appointments' ) );
Inputs::renderText( 'bookly_recurring_appointments_approve_denied_page_url', __( 'Approve recurring appointment URL (denied)', 'bookly-recurring-appointments' ), __( 'Set the URL of a page that is shown to staff when the approval of recurring appointment cannot be done (changed status, etc.).', 'bookly-recurring-appointments' ) );