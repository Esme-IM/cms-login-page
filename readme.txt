=== Innermedia Custom Login Page ===
Contributors: innermedia
Tags: login, branding, custom login
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 3.1.1
License: GPLv2 or later

Plugin to add Innermedia branding to the CMS login page.

== Description ==

Replaces the standard WordPress login page with Innermedia branding, including custom logo, colours, fonts, and layout.

== Changelog ==

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
