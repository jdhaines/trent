<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="bookly-js-service bookly-js-service-simple bookly-js-service-compound bookly-margin-bottom-xs">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="bookly-recurring-appointments-<?php echo $service['id'] ?>"><?php _e( 'Repeat', 'bookly-recurring-appointments' ) ?></label>
                <p class="help-block"><?php _e( 'Allow this service to have recurring appointments.', 'bookly-recurring-appointments' ) ?></p>
                <select id="bookly-recurring-appointments-<?php echo $service['id'] ?>" class="form-control" name="recurrence_enabled">
                    <option value="0"><?php _e( 'Disabled', 'bookly' ) ?></option>
                    <option value="1" <?php selected( $service['recurrence_enabled'] ) ?>><?php _e( 'Enabled', 'bookly' ) ?></option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label><?php _e( 'Frequencies', 'bookly-recurring-appointments' ) ?></label><br>
                <div class="btn-group bookly-js-entity-selector-container">
                    <button class="btn btn-default btn-block dropdown-toggle bookly-flexbox" data-toggle="dropdown">
                        <div class="bookly-flex-cell">
                            <i class="dashicons dashicons-calendar bookly-margin-right-md"></i>
                        </div>
                        <div class="bookly-flex-cell text-left" style="width: 100%">
                            <span class=bookly-entity-counter></span>
                        </div>
                        <div class="bookly-flex-cell">
                            <div class="bookly-margin-left-md"><span class="caret"></span></div>
                        </div>
                    </button>
                    <ul class="dropdown-menu bookly-entity-selector">
                        <li>
                            <a class="checkbox" href="javascript:void(0)">
                                <label>
                                    <input type="checkbox" class="bookly-check-all-entities" data-title="<?php esc_attr_e( 'All', 'bookly' ) ?>" data-nothing="<?php esc_attr_e( 'Nothing selected', 'bookly-recurring-appointments' ) ?>">
                                    <?php _e( 'All', 'bookly' ) ?>
                                </label>
                            </a>
                        </li>
                        <?php foreach ( $frequencies as $type ) : ?>
                            <li>
                                <a class="checkbox" href="javascript:void(0)">
                                    <label>
                                        <input type="checkbox" name="recurrence_frequencies[]" class="bookly-js-check-entity" value="<?php echo $type ?>" <?php checked( in_array( $type, $recurrence_frequencies ) ) ?>
                                               data-title="<?php esc_attr_e( ucfirst( $type ), 'bookly-recurring-appointments' ) ?>">
                                        <?php esc_html_e( ucfirst( $type ), 'bookly-recurring-appointments' ) ?>
                                    </label>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>