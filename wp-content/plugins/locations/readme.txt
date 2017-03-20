=== Plugin Name ===
Contributors: ghuger, richardgabriel
Tags: locations, business locations, business maps, maps, business address map
Requires at least: 4.0.0
Tested up to: 4.7.3
Stable tag: 1.14.5
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Locations is a simple-to-use plugin for adding Locations with Maps to your WordPress Theme using a shortcode.

== Description ==

Locations is a simple-to-use plugin for adding business Locations with Maps to your WordPress Theme using a shortcode.

= Easily Display a Map with Your Business Address on Your Contact Page =

Need to add your business' Location to your website, and looking for an easy way to do so?  Locations is right for you!  Locations provides and easy to use interface for adding your businesses locations, including their phone number, fax number, two line address, city, state, zip code, and contact e-mail address.  Then you can use Locations' simple shortcode to insert your location to any page or post needed on your website.

Users will see your location information formatted in an easy to use layout.  We provide links for Directions - which will start from your current location on location-enabled devices - sending an email, or contacting you via phone.  Locations includes the option to display a Google Map pinpointed on your current location, too!

Locations includes default CSS that makes your business location information readable and understandable.  Locations works both on Mobile and Desktop browsers!

= Manage Multiple Business Locations with Ease! =

Have multiple business locations?  Locations allows you to output as many locations, each with their own map, on any page as you want!  Use one shortcode to list them all, or individual shortcodes to call out specific business locations!  With Locations, you can update Phone Numbers, E-Mail Addresses, and other contact information from the ease of your WordPress Dashboard - you won't have to track down each Page and Post and make the same edit!

Most customers on the internet are looking for your businesses location - start using Locations today to give them the information they need!

= Easily Display A Store Locator with Locations Pro! =
Need a Store Locator? [Upgrade to Locations Pro](http://goldplugins.com/our-plugins/locations/ "Upgrade to Locations Pro") and you'll unlock the Store Locator feature.

= Upgrade to Pro for For Advanced Features and Support =

The GoldPlugins team does not provide direct support for the Locations plugin on the WordPress.org forums. One on one email support is available to people who have purchased Locations Pro only. Locations Pro adds a powerful Store Locator that's based on Google Maps, and adds the ability to import your Locations from a CSV file. You should [upgrade today!](http://goldplugins.com/our-plugins/locations/upgrade-to-locations-pro/?utm_source=wp&utm_campaign=desc_upgrade1 "Upgrade to Locations Pro")

[Upgrade To Locations Pro](http://goldplugins.com/our-plugins/locations/upgrade-to-locations-pro/?utm_source=wp&utm_campaign=desc_upgrade2)

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the contents of `/locations/` to the `/wp-content/plugins/` directory
2. Activate Easy Locations through the 'Plugins' menu in WordPress
3. Visit this address for information on how to configure the plugin: http://goldplugins.com/documentation/locations-documentation/

**Please Note**
You will want to get a free Google Maps API key, so that the Locations plugin can use their geocoder to convert the addresses of your locations into Latitude and Longitude coordinates. You can get an API key from Google for free at this URL: https://developers.google.com/maps/documentation/javascript/tutorial#api_key

Once you have the API key, you should update the Locations plugin's settings to include it.

= Adding a New Location =

Adding a New Location is easy!  There are 3 ways to start adding a new location

**How to Add a New Location**

1. Click on "+ New" -> Location, from the Admin Bar _or_
2. Click on "Add New Location" from the Menu Bar in the WordPress Admin _or_
3. Click on "Add New Location" from the top of the list of Locations, if you're viewing them all.

**New Location Content**

You have a few things to pay attention to:

- Street Address: This is the first line of your street address.
- Street Address (line 2): This is the second line of your street address - use this if you have an apartment or suite number.
- City: This is the City you are located in.
- State: This is the State you are located in.
- Zipcode: This is the Zipcode of your location.
- Phone: This is the Primary phone number.  This will be displayed, if set.
- Fax: This is the Primary fax number.  This will be displayed, if set.
- Email: This is the e-mail address you wish to have linked.  If set, this will be displayed to the public.
- Website: This is the web address you want linked to.  If set, this will be displayed to the public.
- Show Map: Check this box if you want a Google Map displayed with your location.

= Editing a Location =

 **This is as easy as adding a New Location!**

1. Click on "Locations" in the Admin Menu.
2. Hover over the Location you want to Edit and click "Edit".
3. Change the fields to the desired content and click "Update".

= Deleting a Location =

 **This is as easy as adding a New Location!**

1. Click on "Locations" in the Admin Menu.
2. Hover over the Location you want to Delete and click "Delete".
  
  **You can also change the Status of a Location, if you want to keep it on file.**

= Outputting Locations =

- To Output a List of Locations, simply use the shortcode [locations] on the Page or Post that you want your list of business locations to appear.  You can also use our Widgets to easily control your specific display options.
- To Output a Specific Location, simply use the shortcode [locations id=123].  You can get the ID of the Location by copying the shortcode from the Location List inside WordPress.  Yoau can also use our Widgets to easily control your specific display options.

= Outputting a Store Locator =

- **NOTE:** This feature requires Locations Pro.  [Click here](http://goldplugins.com/our-plugins/locations/ "Upgrade To Locations Pro") to upgrade today!
- To Output a Store Locator, simply use the shortcode [store_locator caption="any caption text you want below the heading"] on the page that you want the Store Locator to appear on.  Be sure you have already aqcuired your Google Maps API key and have registered your copy of Locations Pro, otherwise this feature will not work!
- To default the Store Locator to show All Locations in the database, use [store_locator show_all_locations=1]
- To default the Store Locator to show All Locations within the Search Radius, based on the visitor's Location, in the database, use [store_locator show_all_nearby_locations=1]
- To display a Search Radius drop down with the Search Form, use [store_locator show_search_radius=1]
- To display a Category Selector on the Search Form, use [store_locator show_category_select=1]

== Frequently Asked Questions ==

= How Do I Display A Map With My Location? =

Easy!  Just check the Show Map checkbox under your Location's information or on the Widget panel.

= How Do I Hide Fields From Display? =

We only display fields that have data - to hide a field, just keep it blank!  Also, be sure you are choosing the correcty Display options when creating your shortcode or setting up your widget.

= How Do I Obtain an API Key for Google Maps? =

First, this only matters if you are using the Store Locator built into the Pro Version!  If you aren't, don't worry about it!  OK - to get an API key, follow Google's instructions, here:
https://developers.google.com/maps/documentation/javascript/tutorial#api_key

== Screenshots ==

1. This is the Add New Location Page.
2. This is the List of Locations - from here you can Edit or Delete a Location.
3. This is the Locations Categories screen.
4. This is a demo of a Location from the user side, with a map displayed.
5. This is a demo of the Store Locator with search results.
6. This is the Single Location Widget.
7. This is the List of Locations Widget.
8. This is the Store Locator Widget.
9. This is an example of the in-page editor Widgets.
10. This is the General Settings screen.
11. This is the Help & Instructions screen.

== Changelog ==

= 1.14.5 =
* Updates compatibility to WP 4.7.3
* Fixes issue with API key not being properly included.
* Fixes issue with category slugs not being properly filtered.

* [View Changelog](https://goldplugins.com/documentation/locations-documentation/locations-changelog/ "View Changelog")

== Upgrade Notice ==

* 1.14.5: Update available.