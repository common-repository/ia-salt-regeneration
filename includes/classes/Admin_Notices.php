<?php

namespace GoSuccess\IA_Salt_Regeneration;

class Admin_Notices {
    public function __construct() {
        add_action(
            hook_name:  'admin_init',
            callback:   [ $this, 'admin_init' ],
        );
    }

    public function admin_init(): void {
        if ( ! is_plugin_active( plugin: IASR_INDEPENDENT_ANALYTICS_PATH[0] ) &&  ! is_plugin_active( plugin: IASR_INDEPENDENT_ANALYTICS_PATH[1] ) ) {
            add_action(
                hook_name:  'admin_notices',
                callback:   [ $this, 'admin_notice__ia_not_active' ],
            );
        }
    }

    public function admin_notice__ia_not_active(): void {
        printf(
            '<div class="notice notice-info"><p><strong>%s</strong> %s</p></div>',
            esc_html__(
                text:   'IA Salt Regeneration:',
                domain: 'ia-salt-regeneration',
            ),
            esc_html__(
                text:   'Independent Analytics is not active. Please install/activate Independent Analytics first.',
                domain: 'ia-salt-regeneration',
            ),
        );
    }
}
