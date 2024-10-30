=== IA Salt Regeneration ===

Contributors: gosuccess
Tags: analytics, analytics dashboard, google analytics, statistics, wordpress analytics, independent analytics, regenerate salt, visitor token salt
Requires at least: 5.5
Tested up to: 6.4.1
Stable tag: 1.0.3
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Generates a new visitor token salt for Independent Analytics every day.

== Description ==

**This plugin is an addon to the [Independent Analytics](https://wordpress.org/plugins/independent-analytics/) plugin (hereafter referred to as IA). Please install and activate IA first before using this plugin!**

IA is a wonderful solution for GDPR compliant visitor tracking. However, some data protection authorities in the EU consider it necessary to "forget" visitors to a website as soon as possible.

This is where our solution comes into play. Our addon ensures that IA generates a new Visitor Token Salt every day at midnight. This is used by IA to calculate a unique key for each visitor.

Without our solution, IA will continue to recognize a returning visitor until something significant changes (such as the IP address). With IA Salt Regeneration, this no longer happens and you can truly use IA in a 100% GDPR compliant way.

== Screenshots ==

1. Hook to update the visitor token salt in the Action Scheduler (Tools -> Scheduled Actions).

== Frequently Asked Questions ==

= Do I need to include a cookie consent when I install this plugin? =

No. But you should already have included a notice about the use of Independent Analytics in your privacy policy. You do not need to explicitly mention IA Salt Regeneration. A reference to the fact that the Visitor Token Salt is regenerated daily and what (positive) effects this has on the visitor data is recommended.

= Can I set when and how often the Visitor Token Salt should be regenerated? =

No, at the moment there is no possibility for that. But if there is an increased demand for it, we will consider this in a future version.

= How do I know that a new Visitor Token Salt has actually been generated? =

At the moment we have not implemented a convenient function for this yet. But you can do the following:

1. Call `/wp-admin/options.php`.
2. Search for `iawp_salt`.
3. Save the value from the input field.
4. Wait a day or at least until midnight.
5. Repeat step 1-3 and compare the two values.

Do the two values differ? Great, then everything worked!

== Installation ==

The easiest way to install IA Salt Regeneration is by visiting your **Plugins > Add New** menu. Search for "IA Salt Regeneration" and install the first result you see there.

To install with the zip file downloaded from this page:

1. Login to your WordPress dashboard
2. Visit the **Plugins > Add New** menu
3. Click the **Upload Plugin** button at the top
4. In the upload form that appears, click the **Choose file** button and select the **ia-salt-regeneration.zip** file you downloaded here
5. Click the **Install Now** button
6. Once the page reloads, click the blue **Activate** link
7. Done.

== Changelog ==

= 1.0.2 & 1.0.3 =
* Fixed: Salt regeneration does not work with the Pro version.

= 1.0.1 =
* Fixed: Action Scheduler does not load.
* Tested up to WordPress version 6.4.1

= 1.0.0 =
* Initial release.