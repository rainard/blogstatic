<?php
/*
 * Action when plugin installed
 */
function item_lists_elementor_installed() {

    $file_path = 'elementor/elementor.php';
    $installed_plugins = get_plugins();

    return isset($installed_plugins[$file_path]);

}