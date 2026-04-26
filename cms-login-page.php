<?php

/**
* Plugin Name: Innermedia Custom Login Page
* Plugin URI: https://www.innermedia.co.uk
* Description: Plugin to add Innermedia branding to the CMS login page
* Author: Innermedia
* Version: 2.2
*/

// Auto-update from GitHub
require_once plugin_dir_path( __FILE__ ) . 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$innermedia_login_update_checker = PucFactory::buildUpdateChecker(
	'https://github.com/Esme-IM/cms-login-page/',
	__FILE__,
	'innermedia-cms-login-page'
);
$innermedia_login_update_checker->getVcsApi()->enableReleaseAssets();


add_action("login_head", "innermedia_login_head", 20);

function innermedia_login_head() {

	echo "

	<style>

	@font-face {
    	font-family: 'Inter';
    	font-style: normal;
    	font-weight: 100 900;
    	font-display: swap;
    	src: url('" . plugin_dir_url( __FILE__ ) . "fonts/Inter-Variable.woff2') format('woff2-variations'),
    	     url('" . plugin_dir_url( __FILE__ ) . "fonts/Inter-Variable.woff') format('woff-variations');
	}

	body.login, body.login input, body.login label {
    	font-family: 'Inter', sans-serif;
	}

	body.login #login h1 a {
		background: url('".plugin_dir_url( __FILE__ )."images/im-logo-new-small.png') no-repeat scroll center top transparent;
   		background-size: 300px 59px;
		height: 59px;
		width:300px;
	}
	@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
		body.login #login h1 a {
			background: url('".plugin_dir_url( __FILE__ )."images/im-logo-new-retina.png') no-repeat scroll center top transparent;
   			background-size: 300px 59px;
		}
	}
	body.login {
    	text-align: center;
    	background: #121d21;
	}
	body.login #login .button-primary {
    	float: none;
    	margin-top: 20px;
    	width: 100%;
    	background: #ff7e16;
    	border: 1px solid #ff7e16;
    	font-family: 'Inter', sans-serif;
    	text-transform: uppercase;
    	font-size: 16px;
    	color: #fff;
    	border-radius: 7px;
    	padding: 4px 0 1px;
    	transition: background 0.2s ease, color 0.2s ease;
	}
	body.login #login .button-primary:hover {
		background: transparent;
		color: #ff7e16;
	}
	body.login #login {
   		padding: 40px 25px 20px 25px;
    	background-color: #292d34;
    	margin-top: 10px;
		border-radius: 15px;
	}
	body.login #login form {
    	background: transparent;
    	border: none;
    	box-shadow: none;
		padding: 26px 24px 14px;
	}
	.login #backtoblog a, .login #nav a {
    	text-decoration: none;
    	color: #fff;
	}
	body.login #login label {
    	position: absolute;
    	width: 1px;
    	height: 1px;
    	overflow: hidden;
    	clip: rect(0, 0, 0, 0);
	}
	body.login #login .forgetmenot label {
		position: static;
		width: auto;
		height: auto;
		overflow: visible;
		clip: auto;
    	display: inline-block;
		color: #fff;
	}
	body.login #login form .input, body.login #login input[type=password], body.login #login input[type=text] {
    	margin: 0 6px 26px 0;
		border: none;
		font-size: 18px;
		padding-left: 10px;
		font-weight: 300;
	}
	body.login #login input::placeholder {
		color: #999;
		opacity: 1;
	}
	body.login input:-internal-autofill-selected,
	body.login input:-webkit-autofill,
	body.login input:-webkit-autofill:hover,
	body.login input:-webkit-autofill:focus,
	body.login input:-webkit-autofill:active{
    	-webkit-box-shadow: 0 0 0px 1000px white inset !important;
	}
	body.login  #login #login_error, .login .message, .login .success {
    	border-left: 4px solid #ff7e16;
	}
	body.login .privacy-policy-link {
    	display:none;
	}
	.loginLink {
    	background: transparent;
    	border: 1px solid #a7cbce;
    	font-family: 'Inter', sans-serif;
    	text-transform: uppercase;
    	color: #a7cbce;
    	display: inline-block;
    	text-decoration: none;
    	font-size: 13px;
    	line-height: 2.1;
    	padding: 6px 13px 4px;
    	border-radius: 6px;
    	margin: 5px;
	}
	a.loginLink:last-of-type {
    	border: 1px solid #a7cbce;
    	background: #a7cbce;
    	color: #121d21;
	}
	a.loginLink:hover,
	a.loginLink:active,
	a.loginLink:focus {
    	border-color: #e5e4d4;
    	background: #e5e4d4;
    	color: #121d21;
	}
	.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
    	color: #ff7e16;
	}
	.wp-admin #wp-auth-check-wrap #wp-auth-check {
		max-width:100%!important;
    	width: 420px!important;
	}

	@media only screen and (min-width : 768px) {
		body.login #login {
    		margin-top: 80px;
		}
		.loginLink {
			margin:20px;
		}
	}

	</style>

	";

}

add_filter( 'login_display_language_dropdown', '__return_false' );

add_action( 'login_footer', 'innermedia_login_placeholders' );
function innermedia_login_placeholders() {
    echo "<script>
        var log = document.getElementById('user_login');
        var pwd = document.getElementById('user_pass');
        if (log) log.setAttribute('placeholder', 'Username');
        if (pwd) pwd.setAttribute('placeholder', 'Password');
    </script>";
}

// change url for login screen
add_filter('login_headerurl', function(){return 'https://www.innermedia.co.uk';}, 20);
add_filter('login_headertext', function(){ return 'Innermedia'; });

function custom_login_footer_message() {
	$policy_link = get_privacy_policy_url();
    echo '<a class="loginLink" href="mailto:support@innermedia.co.uk">Contact support</a>';
	if ($policy_link) {
	echo '<a class="loginLink" href="'.esc_url($policy_link).'" target="_blank" rel="noopener noreferrer">Privacy Policy</a>';
	}
}
add_action( 'login_footer', 'custom_login_footer_message' );

?>
