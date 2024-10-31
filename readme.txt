=== Number of Feedly Subscribers ===
Contributors: enriquejros
Tags: feedly, subscribers, followers, shortcode
Requires at least: 3.5
Tested up to: 4.5.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays the number of subscribers your feed has in Feedly via the shortcode [fns]. Can also display the number of followers in Twitter or Facebook.

== Description ==

This plugin allows you to show the number of subscribers that your website's feed has in Feedly via a shortcode. You can also use it to display your number of followers in Facebook or Twitter, set via the Feedly API (**no app IDs of Access tokens required**).

Note: The number of followers in Facebook or Twitter that the Feedly API returns is the number of followers you had the last time your feed was updated.

= Shortcodes =

* [fns] or [fns network=feedly]: Displays the number of subscribers in Feedly
* [fns network=facebook]: Displays the number of followers in Facebook
* [fns network=twitter]: Displays the number of followers in Twitter

The shortcodes work even when placed in widgets.

== Installation ==

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't need to leave your web browser. To do an automatic install of this plugin, log in to your WordPress dashboard, navigate to the Plugins menu and click *Add new*.

In the search field type *Number of Feedly Subscribers* and click *Install now*.

= Manual installation =

The manual installation method involves downloading this plugin and uploading it to your webserver via your favorite FTP application or by using the *Upload plugin* option in the *Add plugin* section in your WordPress dashboard. The WordPress codex contains [instructions on how to do this here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

== Frequently Asked Questions ==

= Will the shortcodes work when placed in a widget? =

Yes, they will.

= Where do I set my feed URL, Facebook ID or Twitter user? =

There's no need to do so: just activate and place the shortcodes wherever you want. All data are fetched from the Feedly API as per your site's URL.

= Are Facebook and Twitter followers counts accurate? =

No, they're not. These data are not fetched directly from Facebook or Twitter, but from Feedly, so the returned number represents the number of followers your website had when Feedly updated it for the last time (it depends on how often you post).

== Screenshots ==

1. Wherever you write the shortcodes they will be translated into the numbers (just text, styles are not included), even in widgets

== Changelog ==

= 1.0 =
Initial release

= 1.1 =
Fixed issue. No numbers were returned if Feedly had never fetched the feed before.
Added support for the shortcodes in widgets

== Upgrade Notice ==

= 1.0 =
Initial release

= 1.1 =
Fixed issue. No numbers were returned if Feedly had never fetched the feed before.
Added support for the shortcodes in widgets
