<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( $appointments ) : ?>
    <table class="table table-condensed">
        <tbody>
        <?php foreach ( $appointments as $appointment ) : ?>
            <tr>
                <?php printf( '<td>%s</td><td>%s</td><td>%s</td><td><button type="button" class="bookly-js-edit-appointment btn btn-default btn-xs pull-right" role="button" data-appointment_id="%s">%s</button></td>',
                    \Bookly\Lib\Utils\DateTime::formatDate( $appointment['start_date'] ), \Bookly\Lib\Utils\DateTime::formatTime( $appointment['start_date'] ), $appointment['service'], $appointment['id'], '<i class=\'glyphicon glyphicon-edit\'></i>&nbsp;' . __( 'Edit', 'bookly' ) ) ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>