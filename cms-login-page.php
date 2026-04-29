<?php

/**
* Plugin Name: Innermedia Custom Login Page
* Plugin URI: https://www.innermedia.co.uk
* Description: Plugin to add Innermedia branding to the CMS login page
* Author: Innermedia
* Version: 3.1.6
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

	$plugin_url = plugin_dir_url( __FILE__ );

	echo "

	<style>

	:root {
		--im-black: #121D21;
		--im-orange: #FF7E16;
		--im-teal: #A7CBCE;
		--im-cream: #E5E4D4;
	}

	@font-face {
    	font-family: 'Inter';
    	font-style: normal;
    	font-weight: 100 900;
    	font-display: swap;
    	src: url('" . $plugin_url . "fonts/Inter-Variable.woff2') format('woff2-variations'),
    	     url('" . $plugin_url . "fonts/Inter-Variable.woff') format('woff-variations');
	}

	html, body.login { height: 100%; }
	body.login {
		font-family: 'Inter', sans-serif;
		font-weight: 300;
		background: var(--im-black);
		color: var(--im-cream);
		min-height: 100vh;
		box-sizing: border-box;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding: 40px 20px;
		position: relative;
		overflow-x: hidden;
		background-image: radial-gradient(circle at 1px 1px, rgba(229,228,212,0.05) 1px, transparent 0);
		background-size: 32px 32px;
	}
	body.login *, body.login *::before, body.login *::after { box-sizing: border-box; }
	body.login::before {
		content: '';
		position: fixed;
		width: 700px; height: 700px;
		background: radial-gradient(circle, rgba(255,126,22,0.35), transparent 65%);
		top: -200px; right: -200px;
		border-radius: 50%;
		filter: blur(20px);
		z-index: 0;
		pointer-events: none;
		animation: imDrift 14s ease-in-out infinite alternate;
	}
	body.login::after {
		content: '';
		position: fixed;
		width: 600px; height: 600px;
		background: radial-gradient(circle, rgba(167,203,206,0.18), transparent 65%);
		bottom: -150px; left: -150px;
		border-radius: 50%;
		filter: blur(20px);
		z-index: 0;
		pointer-events: none;
		animation: imDrift 18s ease-in-out infinite alternate-reverse;
	}
	@keyframes imDrift {
		0%   { transform: translate(0,0) scale(1); }
		100% { transform: translate(40px, 30px) scale(1.08); }
	}

	body.login, body.login input, body.login label {
    	font-family: 'Inter', sans-serif;
	}

	body.login #login {
		position: relative;
		z-index: 2;
		width: 100%;
		max-width: 460px;
		padding: 0;
		margin: 0 auto;
		background: transparent;
		border-radius: 0;
	}

	body.login #login h1 { margin: 0 0 38px; }
	body.login #login h1 a {
		background: url('" . $plugin_url . "images/innermedia-main-logo-small.png') no-repeat scroll center top transparent;
		background-size: 340px auto;
		height: 67px;
		width: 340px;
		margin: 0 auto;
		text-indent: -9999px;
	}
	@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
		body.login #login h1 a {
			background: url('" . $plugin_url . "images/innermedia-main-logo-retina.png') no-repeat scroll center top transparent;
			background-size: 340px auto;
		}
	}

	body.login #loginform {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(18px);
		-webkit-backdrop-filter: blur(18px);
		border: 1px solid rgba(229,228,212,0.12);
		border-radius: 22px;
		padding: 44px 40px 36px;
		box-shadow: 0 30px 80px rgba(0,0,0,0.45);
		position: relative;
		overflow: hidden;
		text-align: left;
	}

	body.login .im-welcome { text-align: center; margin: 0 0 32px; padding: 0; }
	body.login .im-welcome h2 {
		font-size: 28px;
		font-weight: 300;
		letter-spacing: 0.02em;
		text-transform: uppercase;
		margin: 0 0 8px;
		color: var(--im-cream);
	}
	body.login #loginform .im-welcome p,
	body.login .im-welcome p {
		font-size: 14px;
		color: rgba(229,228,212,0.6);
		margin: 0;
	}

	body.login #login label {
    	position: absolute;
    	width: 1px;
    	height: 1px;
    	overflow: hidden;
    	clip: rect(0, 0, 0, 0);
	}
	body.login #loginform p { margin-bottom: 18px; }
	body.login .user-pass-wrap { margin-bottom: 18px; }
	body.login .user-login-wrap { margin-bottom: 18px; }

	body.login #login form .input,
	body.login #login input[type=password],
	body.login #login input[type=text] {
		width: 100%;
		margin: 0;
		background-color: rgba(229,228,212,0.06);
		border: 1px solid rgba(229,228,212,0.14);
		border-radius: 10px;
		padding: 16px 18px 16px 48px;
		font-family: inherit;
		font-size: 15px;
		font-weight: 300;
		color: var(--im-cream);
		transition: border-color 0.2s ease, background-color 0.2s ease;
		box-shadow: none;
	}
	body.login #login input#user_pass { padding-right: 48px; }

	body.login #login .im-field-wrap { position: relative; }
	body.login #login .im-field-icon {
		position: absolute;
		left: 18px;
		top: 50%;
		transform: translateY(-50%);
		width: 18px;
		height: 18px;
		color: rgba(229,228,212,0.45);
		pointer-events: none;
		z-index: 2;
		transition: color 0.2s ease;
	}
	body.login #login .im-field-icon svg {
		display: block;
		width: 18px;
		height: 18px;
	}
	body.login #login input:focus ~ .im-field-icon {
		color: var(--im-orange);
	}

	body.login #login .wp-pwd { position: relative; }
	body.login #login .wp-pwd .button.wp-hide-pw {
		position: absolute !important;
		right: 12px !important;
		top: 50% !important;
		transform: translateY(-50%) !important;
		background: transparent !important;
		border: 0 !important;
		box-shadow: none !important;
		color: rgba(229,228,212,0.45) !important;
		padding: 0 !important;
		margin: 0 !important;
		min-width: 0 !important;
		min-height: 0 !important;
		width: auto !important;
		height: auto !important;
		line-height: 1 !important;
	}
	body.login #login .wp-pwd .button.wp-hide-pw:hover,
	body.login #login .wp-pwd .button.wp-hide-pw:focus {
		color: var(--im-orange) !important;
		background: transparent !important;
		border: 0 !important;
		box-shadow: none !important;
		outline: 0 !important;
	}
	body.login #login .wp-pwd .button.wp-hide-pw .dashicons {
		color: inherit;
		font-size: 18px;
		width: 18px;
		height: 18px;
		line-height: 18px;
	}
	body.login .user-pass-wrap > label,
	body.login .user-pass-wrap .input-password-toggle-text { display: none !important; }

	body.login #login input[type=text],
	body.login #login input[type=password],
	body.login #login input[type=email] {
		font-size: 15px !important;
		font-family: 'Inter', sans-serif !important;
		font-weight: 300 !important;
		line-height: 1.4 !important;
	}
	body.login #login input::placeholder,
	body.login #login input::-webkit-input-placeholder,
	body.login #login input::-moz-placeholder,
	body.login #login input:-ms-input-placeholder,
	body.login #login input::-ms-input-placeholder {
		color: rgba(229,228,212,0.4) !important;
		opacity: 1 !important;
		font-family: 'Inter', sans-serif !important;
		font-weight: 300 !important;
		font-size: 15px !important;
		line-height: 1.4 !important;
	}
	body.login #login input:focus {
		outline: 0;
		border-color: var(--im-orange);
		background-color: rgba(255,126,22,0.04);
		box-shadow: none;
	}
	body.login input:-webkit-autofill,
	body.login input:-webkit-autofill:hover,
	body.login input:-webkit-autofill:focus,
	body.login input:-webkit-autofill:active,
	body.login input:autofill,
	body.login input:autofill:hover,
	body.login input:autofill:focus,
	body.login input:autofill:active,
	body.login #login input:-webkit-autofill,
	body.login #login input:-webkit-autofill:hover,
	body.login #login input:-webkit-autofill:focus,
	body.login #login input:-webkit-autofill:active,
	body.login #login input:autofill,
	body.login #login input:autofill:hover,
	body.login #login input:autofill:focus,
	body.login #login input:autofill:active {
		-webkit-text-fill-color: var(--im-cream) !important;
		-webkit-box-shadow: 0 0 0px 1000px rgba(18,29,33,0.95) inset !important;
		box-shadow: 0 0 0px 1000px rgba(18,29,33,0.95) inset !important;
		caret-color: var(--im-cream) !important;
		font-family: 'Inter', sans-serif !important;
		font-weight: 300 !important;
		font-size: 15px !important;
		line-height: 1.4 !important;
		transition: background-color 5000s ease-in-out 0s, color 5000s ease-in-out 0s;
	}
	body.login input:-webkit-autofill::first-line,
	body.login #login input:-webkit-autofill::first-line,
	body.login input:autofill::first-line,
	body.login #login input:autofill::first-line {
		font-family: 'Inter', sans-serif;
		font-weight: 300;
		font-size: 15px;
		color: var(--im-cream);
	}

	body.login #login .forgetmenot {
		display: flex;
		align-items: center;
		flex-wrap: wrap;
		gap: 8px;
		float: none;
		margin: 6px 0 28px;
		font-size: 13px;
	}
	body.login #login .forgetmenot input[type=checkbox] {
		margin: 0;
		accent-color: var(--im-orange);
		flex-shrink: 0;
		vertical-align: middle;
	}
	body.login #login .forgetmenot label {
		position: static;
		width: auto;
		height: auto;
		overflow: visible;
		clip: auto;
		display: inline-flex;
		align-items: center;
		gap: 8px;
		color: rgba(229,228,212,0.7);
		font-size: 13px;
		line-height: 1;
	}
	body.login #login .forgetmenot a {
		color: var(--im-teal);
		text-decoration: none;
		margin-left: auto;
	}
	body.login #login .forgetmenot a:hover { color: var(--im-orange); }
	body.login #login #nav { display: none; }

	body.login #login p.submit { float: none; margin: 0; }
	body.login #login .button-primary {
		float: none;
		width: 100%;
		background: var(--im-orange);
		color: #fff;
		border: 0;
		border-radius: 12px;
		padding: 16px 22px;
		font-family: inherit;
		font-size: 13px;
		font-weight: 600;
		letter-spacing: 0.16em;
		text-transform: uppercase;
		cursor: pointer;
		height: auto;
		line-height: 1;
		text-shadow: none;
		box-shadow: 0 8px 24px rgba(255,126,22,0.25);
		transition: background 0.25s ease, transform 0.2s ease, box-shadow 0.25s ease;
	}
	body.login #login .button-primary:hover,
	body.login #login .button-primary:focus {
		background: #ff9036;
		color: #fff;
		transform: translateY(-1px);
		box-shadow: 0 12px 30px rgba(255,126,22,0.4);
	}

	body.login #login_error,
	body.login .message,
	body.login .success {
		background: rgba(255,255,255,0.04);
		border-left: 4px solid var(--im-orange);
		color: var(--im-cream);
		box-shadow: none;
		border-radius: 8px;
	}

	body.login .privacy-policy-link { display: none; }
	body.login #backtoblog { display: none; }

	.im-footer-links {
		display: flex;
		gap: 12px;
		justify-content: center;
		margin-top: 16px;
		font-size: 11px;
	}
	.im-footer-links a {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		text-decoration: none;
		text-transform: uppercase;
		letter-spacing: 0.16em;
		font-weight: 600;
		height: 32px;
		padding: 0 18px;
		line-height: 1;
		border-radius: 6px;
		border: 1px solid transparent;
		transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
		color: var(--im-black);
		font-family: 'Inter', sans-serif;
	}
	.im-footer-links a.support { background: var(--im-cream); border-color: var(--im-cream); }
	.im-footer-links a.privacy { background: var(--im-teal); border-color: var(--im-teal); }
	.im-footer-links a.support:hover { background: transparent; color: var(--im-cream); }
	.im-footer-links a.privacy:hover { background: transparent; color: var(--im-teal); }

	.im-copyright {
		text-align: center;
		margin-top: 24px;
		font-size: 11px;
		color: rgba(229,228,212,0.35);
		letter-spacing: 0.14em;
		text-transform: uppercase;
		position: relative;
		z-index: 2;
	}
	.im-copyright span { color: var(--im-orange); }

	.wp-admin #wp-auth-check-wrap #wp-auth-check {
		max-width: 100% !important;
		width: 460px !important;
	}

	@media (max-width: 520px) {
		body.login #loginform { padding: 36px 26px; }
		body.login #login h1 a { width: 240px; background-size: 240px auto; height: 48px; }
		.im-welcome h2 { font-size: 26px; }
	}

	</style>

	";

}

add_filter( 'login_display_language_dropdown', '__return_false' );

add_action( 'login_form_top', 'innermedia_login_welcome' );
function innermedia_login_welcome() {
	echo '<div class="im-welcome"><h2>Welcome Back</h2><p>Sign in to manage your CMS.</p></div>';
}

add_action( 'login_footer', 'innermedia_login_placeholders' );
function innermedia_login_placeholders() {
    $svg_user = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';
    $svg_lock = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>';

    echo "<script>
        (function(){
            var svgUser = " . wp_json_encode( $svg_user ) . ";
            var svgLock = " . wp_json_encode( $svg_lock ) . ";

            function addFieldIcon(id, svg) {
                var input = document.getElementById(id);
                if (!input) return;
                var parent = input.parentElement;
                if (!parent || parent.querySelector('.im-field-icon')) return;
                parent.classList.add('im-field-wrap');
                var icon = document.createElement('span');
                icon.className = 'im-field-icon';
                icon.innerHTML = svg;
                parent.appendChild(icon);
            }

            function init() {
                var log = document.getElementById('user_login');
                var pwd = document.getElementById('user_pass');
                var btn = document.getElementById('wp-submit');
                if (log) log.setAttribute('placeholder', 'Username or email');
                if (pwd) pwd.setAttribute('placeholder', 'Password');
                if (btn) btn.value = 'Sign In →';

                addFieldIcon('user_login', svgUser);
                addFieldIcon('user_pass', svgLock);

                var form = document.getElementById('loginform');
                if (form && !form.querySelector('.im-welcome')) {
                    var welcome = document.createElement('div');
                    welcome.className = 'im-welcome';
                    welcome.innerHTML = '<h2>Welcome Back</h2><p>Sign in to manage your CMS.</p>';
                    form.insertBefore(welcome, form.firstChild);
                }

                var forget = document.querySelector('.forgetmenot');
                var nav    = document.getElementById('nav');
                if (forget && nav) {
                    var lost = nav.querySelector('a');
                    if (lost) {
                        lost.textContent = 'Forgot password?';
                        forget.appendChild(lost);
                    }
                }
            }
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();
    </script>";
}

add_filter( 'gettext', 'innermedia_login_button_label', 20, 3 );
function innermedia_login_button_label( $translation, $text, $domain ) {
    if ( ! isset( $GLOBALS['pagenow'] ) || $GLOBALS['pagenow'] !== 'wp-login.php' ) {
        return $translation;
    }
    if ( $text === 'Log In' ) {
        return 'Sign In →';
    }
    return $translation;
}

// change url for login screen
add_filter('login_headerurl', function(){return 'https://www.innermedia.co.uk';}, 20);
add_filter('login_headertext', function(){ return 'Innermedia'; });

function custom_login_footer_message() {
	$policy_link = get_privacy_policy_url();
	$year = date('Y');
	echo '<div class="im-footer-links">';
	echo '<a class="support" href="mailto:support@innermedia.co.uk">Contact support</a>';
	if ($policy_link) {
		echo '<a class="privacy" href="'.esc_url($policy_link).'" target="_blank" rel="noopener noreferrer">Privacy Policy</a>';
	}
	echo '</div>';
	echo '<div class="im-copyright">&copy; '.esc_html($year).' innermedia <span>&middot;</span> 25 years</div>';
}
add_action( 'login_footer', 'custom_login_footer_message' );

?>
