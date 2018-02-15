<?php

/*
 * Plugin Name: Custom Post Type - Default Capabilities
 * Description: Add a default <code>edit_{$post_type_name}</code> capability to the custom posts type that didn't register any capabilities.
 * Version: 1.0.0
 * Author URI: http://www.theappsdev.com/
 * Author: Jerry <jerryye.dev@gmail.com>
 */


if (!function_exists('YY_register_defult_post_type_caps')) {

    function YY_register_defult_post_type_caps($args, $name) {

        if (isset($args['show_in_menu']) && $args['show_in_menu'] == 1 && isset($args['capability_type']) && !isset($args['capabilities'])) {
            $capability = 'edit_' . strtolower($args['labels']['name']);
            $args['capabilities'] = array(
                'edit_post' => $capability,
                'read_post' => $capability,
                'delete_post' => $capability,
                'edit_posts' => $capability,
                'edit_others_posts' => $capability,
                'publish_posts' => $capability,
                'read_private_posts' => $capability,
                'create_posts' => $capability
            );
        }
        return $args;
    }

    add_filter('register_post_type_args', 'YY_register_defult_post_type_caps', 99, 2);
}