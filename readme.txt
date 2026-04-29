=== Innermedia Custom Login Page ===
Contributors: innermedia
Tags: login, branding, custom login
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 3.1.6
License: GPLv2 or later

Plugin to add Innermedia branding to the CMS login page.

== Description ==

Replaces the standard WordPress login page with Innermedia branding, including custom logo, colours, fonts, and layout.

== Changelog ==

= 3.1.6 =
* Body padding back to symmetric 40px 20px (vertical centring)
* Added bottom margins on .user-pass-wrap and .user-login-wrap for consistent field spacing
* Autofill ::first-line rule so Safari respects Inter / 15px / cream on autofilled rows
* Footer links: pill buttons with fixed 32px height and inline-flex centring; tighter top margin (16px)
* Copyright top margin reduced (40px -> 24px) to bring footer closer to the card

= 3.1.5 =
* Welcome block has 4px more breathing room before the username field
* Field icons now only highlight orange on focus (not when filled)
* Added the standard :autofill selector alongside :-webkit-autofill, plus a non-prefixed inset box-shadow and a colour transition to keep the cream/Inter look across more browsers

= 3.1.4 =
* Inject user/lock field icons as DOM elements via JS instead of CSS background-image, since Chrome's :-internal-autofill-selected pseudo-class strips background-image with !important whenever a field is autofilled
* Icons now use currentColor and recolor (cream → orange) via the sibling-input :focus / :not(:placeholder-shown) state

= 3.1.3 =
* Inline the user/lock icons as base64 SVG data URIs so they render even if the host blocks .svg MIME types or caches the assets folder
* Force input and ::placeholder font-size to 15px Inter with !important across all vendor placeholder pseudo-elements

= 3.1.2 =
* Switched user/lock field icons from inline SVG data URIs to real SVG files for browser compatibility (icons were not rendering)
* Added box-sizing: border-box on body to remove the page scroll bar caused by padding overflowing the viewport
* Shifted login card up the page by ~20px via asymmetric vertical padding
* Restyled the password show/hide eye button: cream tint matching the field icons, hover turns orange, vertically centred in the input
* Forced placeholder font/size with !important and added autofill rules so Chrome's saved-credential rendering keeps the cream colour and 15px Inter

= 3.1.1 =
* Fix fatal parse error caused by double-quoted attribute selector inside the PHP echo (input[type="checkbox"] terminated the string early)

= 3.1 =
* Vertically center the login card on the page (was sitting too high)
* "Sign In →" submit button label with arrow (replaces default "Log In")
* Inter font now applied to input placeholders
* Fixed Remember Me checkbox + label alignment in flex row
* Added DOMContentLoaded guard plus fallback injection for the "Welcome Back" heading and field placeholders so they render reliably

= 3.0 =
* Visual redesign: glassmorphism card with animated orange and teal gradient blobs and a subtle dot grid background
* New "Welcome Back" heading and subtitle above the sign-in form
* Restyled inputs with inline user/lock icons that switch to orange on focus
* Lost password link moved inline with Remember Me as "Forgot password?"
* Restyled support and privacy footer links as cream and teal pill buttons
* Added copyright line with "25 years" anniversary mark
* Switched to new Innermedia logo assets (innermedia-main-logo-small/retina.png)

= 2.2 =
* Fixed placeholders not appearing on username and password fields

= 2.1 =
* Added grey placeholder text for username and password fields
* Fixed Remember Me label visibility

= 2.0 =
* Complete redesign with new dark theme and updated branding
* Added Inter variable font
* Added GitHub auto-update support
* Improved accessibility: labels hidden visually but remain for screen readers
* Improved security: escaped URLs, added rel="noopener noreferrer"
* Namespaced function names to avoid plugin conflicts
* Added login header text filter
* Added button hover transitions

= 1.7 =
* Previous version with original branding
