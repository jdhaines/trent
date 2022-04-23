<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;
use Bookly\Backend\Components\Controls\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="tab-pane" id="bookly_settings_recurring_appointments">
    <form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'recurring_appointments' ) ) ?>">
        <?php Selects::renderSingle( 'bookly_recurring_appointments_enabled', __( 'Recurring Appointments', 'bookly-recurring-appointments' ), __( 'This setting enables or disables the Repeat step of booking and ability to create recurring bookings.', 'bookly-recurring-appointments' ) ) ?>
        <?php Selects::renderSingle( 'bookly_recurring_appointments_payment', __( 'Online Payments', 'bookly-recurring-appointments' ), null, array( array( 'first', __( 'Customers must pay only for the 1st appointment', 'bookly-recurring-appointments' ) ), array( 'all', __( 'Customers must pay for all appointments in series', 'bookly-recurring-appointments' ) ) ) ) ?>
        <div class="panel-footer">
            <?php Inputs::renderCsrf() ?>
            <?php Buttons::renderSubmit() ?>
            <?php Buttons::renderReset() ?>
        </div>
    </form>
</div>