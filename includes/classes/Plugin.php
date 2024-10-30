<?php

namespace GoSuccess\IA_Salt_Regeneration;

final class Plugin {
    public function __construct() {
        $this->load_dependencies();
        new Admin_Notices();

        add_action(
            hook_name:  'ia_fs_loaded',
            callback:   [ __NAMESPACE__ . '\Action_Scheduler', 'add' ],
        );

        add_action(
            hook_name:      'deactivated_plugin',
            callback:       [ __NAMESPACE__ . '\Action_Scheduler', 'remove' ],
            accepted_args:  2,
        );

    }

    private function load_dependencies(): void {
        require_once IASR_PATH . 'libraries/vendor/woocommerce/action-scheduler/action-scheduler.php';
        require_once IASR_PATH . 'includes/classes/Action_Scheduler.php';
        require_once IASR_PATH . 'includes/classes/Admin_Notices.php';
    }
}
