<?php

namespace GoSuccess\IA_Salt_Regeneration;

use \IAWP_SCOPED\IAWP\Utils\Salt;

class Action_Scheduler {
    public static function add() {
        add_action(
            hook_name:  'action_scheduler_init',
            callback:   [ __CLASS__, 'schedule_update_ia_visitor_token_salt' ],
        );

        add_action(
            hook_name:  'iasr_update_ia_visitor_token_salt',
            callback:   [ __CLASS__, 'update_ia_visitor_token_salt' ],
        );
    }

    public static function remove( string $plugin, bool $network_deactivating ): void {
        if ( function_exists( 'as_unschedule_all_actions' ) ) {
            as_unschedule_all_actions(
                hook:  'iasr_update_ia_visitor_token_salt',
            );
        }
    }

    public static function schedule_update_ia_visitor_token_salt(): void {
        if ( false === as_has_scheduled_action( hook: 'iasr_update_ia_visitor_token_salt' ) ) {
            as_schedule_recurring_action(
                timestamp:              strtotime( 'tomorrow' ),
                interval_in_seconds:    DAY_IN_SECONDS,
                hook:                   'iasr_update_ia_visitor_token_salt',
                unique:                 true,
            );
        }
    }

    public static function update_ia_visitor_token_salt(): void {
        if ( ! get_option( 'iawp_salt' ) ) {
            return;
        }

        delete_option( 'iawp_salt' );
        Salt::visitor_token_salt();
    }
}
