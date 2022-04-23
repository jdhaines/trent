<?php
namespace BooklyRecurringAppointments\Lib;

/**
 * Class Installer
 * @package BooklyRecurringAppointments\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    /** @var array */
    protected $notifications;

    /**
     * Constructor.
     */
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $this->notifications = array(
            array(  // Notification to customer about pending recurring appointment
                'gateway' => 'email',
                'type'    => 'client_pending_recurring_appointment',
                'subject' => __( 'Your appointment information', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Dear {client_name}.\n\nThis is a confirmation that you have booked {service_name} (x {recurring_count}).\n\nPlease find the schedule of your booking below.\n\n{appointment_schedule}\n\nWe are waiting you at {company_address}.\n\nThank you for choosing our company.\n\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_pending_recurring_appointment',
                'subject' => __( 'New booking information', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Hello.\n\nYou have a new booking.\n\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(  // Notification to customer about approved recurring appointment
                'gateway' => 'email',
                'type'    => 'client_approved_recurring_appointment',
                'subject' => __( 'Your appointment information', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Dear {client_name}.\n\nThis is a confirmation that you have booked {service_name} (x {recurring_count}).\n\nPlease find the schedule of your booking below.\n\n{appointment_schedule}\n\nWe are waiting you at {company_address}.\n\nThank you for choosing our company.\n\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_approved_recurring_appointment',
                'subject' => __( 'New booking information', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Hello.\n\nYou have a new booking.\n\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(  // Notification to staff about cancelled recurring appointment
                'gateway' => 'email',
                'type'    => 'client_cancelled_recurring_appointment',
                'subject' => __( 'Booking cancellation', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Dear {client_name}.\n\nYour booking of {service_name} (x {recurring_count}) has been cancelled.\n\nReason: {cancellation_reason}\n\nPlease find the schedule of the cancelled booking below:\n\n{appointment_schedule}\n\nThank you for choosing our company.\n\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_cancelled_recurring_appointment',
                'subject' => __( 'Booking cancellation', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Hello.\n\nThe following booking has been cancelled.\n\nReason: {cancellation_reason}\n\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(  // Notification to staff about rejected recurring appointment
                'gateway' => 'email',
                'type'    => 'client_rejected_recurring_appointment',
                'subject' => __( 'Booking rejection', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Dear {client_name}.\n\nYour booking of {service_name} (x {recurring_count}) has been rejected.\n\nReason: {cancellation_reason}\n\nPlease find the schedule of the cancelled booking below:\n\n{appointment_schedule}\n\nThank you for choosing our company.\n\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_rejected_recurring_appointment',
                'subject' => __( 'Booking rejection', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Hello.\n\nThe following booking has been rejected.\n\nReason: {cancellation_reason}\n\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'client_waitlisted_recurring_appointment',
                'subject' =>  __( 'You have been added to waiting list for appointment', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Dear {client_name}.\n\nThis is a confirmation that you have been added to the waiting list for {service_name} (x {recurring_count}).\n\nPlease find the service schedule below.\n\n{appointment_schedule}\n\nThank you for choosing our company.\n\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'email',
                'type'    => 'staff_waitlisted_recurring_appointment',
                'subject' => __( 'New waiting list information', 'bookly-recurring-appointments' ),
                'message' => wpautop( __( "Hello.\n\nYou have new customer in the waiting list.\n\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ) ),
                'active'  => 1,
            ),

            array(
                'gateway' => 'sms',
                'type'    => 'client_pending_recurring_appointment',
                'subject' => '',
                'message' => __( "Dear {client_name}.\nThis is a confirmation that you have booked {service_name} (x {recurring_count}).\nPlease find the schedule of your booking below.\n{appointment_schedule}\n\nWe are waiting you at {company_address}.\nThank you for choosing our company.\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_pending_recurring_appointment',
                'subject' => '',
                'message' => __( "Hello.\nYou have a new booking.\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'client_approved_recurring_appointment',
                'subject' => '',
                'message' => __( "Dear {client_name}.\nThis is a confirmation that you have booked {service_name} (x {recurring_count}).\nPlease find the schedule of your booking below.\n{appointment_schedule}\n\nWe are waiting you at {company_address}.\nThank you for choosing our company.\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_approved_recurring_appointment',
                'subject' => '',
                'message' => __( "Hello.\nYou have a new booking.\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'client_cancelled_recurring_appointment',
                'subject' => '',
                'message' => __( "Dear {client_name}.\nYour booking of {service_name} (x {recurring_count}) has been cancelled.\nReason: {cancellation_reason}\nPlease find the schedule of the cancelled booking below: {appointment_schedule}\nThank you for choosing our company.\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_cancelled_recurring_appointment',
                'subject' => '',
                'message' => __( "Hello.\nThe following booking has been cancelled.\nReason: {cancellation_reason}\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'client_rejected_recurring_appointment',
                'subject' => '',
                'message' => __( "Dear {client_name}.\nYour booking of {service_name} (x {recurring_count}) has been rejected.\nReason: {cancellation_reason}\nPlease find the schedule of the cancelled booking below: {appointment_schedule}\nThank you for choosing our company.\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_rejected_recurring_appointment',
                'subject' => '',
                'message' => __( "Hello.\nThe following booking has been rejected.\nReason: {cancellation_reason}\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'client_waitlisted_recurring_appointment',
                'subject' => '',
                'message' => __( "Dear {client_name}.\nThis is a confirmation that you have been added to the waiting list for {service_name} (x {recurring_count}).\nPlease find the service schedule below.\n{appointment_schedule}\nThank you for choosing our company.\n{company_name}\n{company_phone}\n{company_website}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
            array(
                'gateway' => 'sms',
                'type'    => 'staff_waitlisted_recurring_appointment',
                'subject' => '',
                'message' => __( "Hello.\nYou have new customer in the waiting list.\nService: {service_name} (x {recurring_count})\nSchedule:\n{appointment_schedule}\nClient name: {client_name}\nClient phone: {client_phone}\nClient email: {client_email}", 'bookly-recurring-appointments' ),
                'active'  => 1,
            ),
        );

        $this->options = array(
            'bookly_l10n_step_repeat'               => __( 'Repeat',  'bookly-recurring-appointments' ),
            'bookly_l10n_step_repeat_button_next'   => __( 'Next',    'bookly' ),
            'bookly_l10n_info_repeat_step'          => __( 'You selected a booking for {service_name} at {service_time} on {service_date}. If you would like to make this appointment recurring please check the box below and set appropriate parameters. Otherwise press Next button below.', 'bookly-recurring-appointments' ),
            'bookly_l10n_label_repeat'              => __( 'Repeat',  'bookly-recurring-appointments' ),
            'bookly_l10n_repeat'                    => __( 'Repeat',  'bookly-recurring-appointments' ), //combobox
            'bookly_l10n_repeat_another_time'       => __( 'Another time', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_biweekly'           => __( 'Biweekly', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_daily'              => __( 'Daily',   'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_day'                => __( 'Day',     'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_days'               => __( 'day(s)',  'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_deleted'            => __( 'Deleted', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_every'              => __( 'every',   'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_first_in_cart_info' => __( 'The first recurring appointment was added to cart. You will be invoiced for the remaining appointments later.', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_monthly'            => __( 'Monthly', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_no_available_slots' => __( 'There are no available time slots for this day',    'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_on'                 => __( 'On',      'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_on_week'            => __( 'On',      'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_required_week_days' => __( 'Please select some days', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_schedule'           => __( 'Schedule', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_schedule_help'      => __( 'Another time was offered on pages {list}.', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_schedule_info'      => __( 'Some of the desired time slots are busy. System offers the nearest time slot instead. Click the Edit button to select another time if needed.', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_specific'           => __( 'Specific day', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_this_appointment'   => __( 'Repeat this appointment', 'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_until'              => __( 'Until',   'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_weekly'             => __( 'Weekly',  'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_first'              => __( 'First',   'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_second'             => __( 'Second',  'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_third'              => __( 'Third',   'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_fourth'             => __( 'Fourth',  'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_last'               => __( 'Last',    'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_or'                 => __( 'or',      'bookly-recurring-appointments' ),
            'bookly_l10n_repeat_times'              => __( 'time(s)', 'bookly-recurring-appointments' ),
            'bookly_recurring_appointments_payment' => 'all',
            // URL.
            'bookly_recurring_appointments_approve_page_url'        => home_url(),
            'bookly_recurring_appointments_approve_denied_page_url' => home_url(),
        );
    }

    public function loadData()
    {
        parent::loadData();

        // Insert notifications.
        foreach ( $this->notifications as $data ) {
            $notification = new \Bookly\Lib\Entities\Notification( $data );
            $notification->save();
        }
    }

    /**
     * Create tables in database.
     */
    public function createTables() { }

    /**
     * Uninstall.
     */
    public function uninstall()
    {
        parent::uninstall();
        foreach ( $this->notifications as $notification ) {
            \Bookly\Lib\Entities\Notification::query()->delete()->where( 'type', $notification['type'] )->execute();
        }
    }

}