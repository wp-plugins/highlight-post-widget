=== Plugin Name ===
Plugin Name: Highlight Post Widget
Contributors: Zaenal/Lokamaya
Donate link: http://blog.lokamaya.com/donate
Tags: widget, post, highlight, sidebar, plugin
Requires at least: 2.9.2
Tested up to: 2.9.2
Stable tag: 1.0

A widget for displaying highlighted post on your sidebar and displayed your recent update post. 

== Description ==

The purpose of this plugin is simple. I want to list recents update of my posts with litle notes on it. Similiar to default “Recent Post” by Wordpress, but this one sort the post by last modified time.

For example, I maintaince a “wordpress plugin” and create a post about that plugin. When time goes by, that post soon ‘disappeared’ from Home index and neglected by visitor when there are some new post published.

Recently I release a new version of the plugin and updated the post. I want to let the visitors know that there is a new version of the plugin, unhappily… there is no way I can do except to change it as sticky post and make it listed on the top of Home index. But that not my choice. Instead of change it as sticky post, I want to list it on my sidebar and displayed all over my blog. So I create this plugin for that purpose…

== Installation ==

Requirement: 

I create this plugin for Wordpress version 2.9.2. I never test it on lower version, but I think it should work on Wordpress version 2.8 that support dynamic sidebar. Right, you also must use ‘widget ready‘ theme. 
    
Installation:

How to install this plugin manually
1. Download: download the plugin to your computer
2. Extract & Upload: extract the source code and upload it to your wordpress plugin directory
3. Activate: login to WP-Admin and activate Highlight Post plugin from Plugins page.

Appearance (CSS)

I did not add any CSS to this plugin. It's up to you to customize and adding it 
to your style (CSS) of your theme. Just add the code below to the style 
(CSS) of your theme to change the appearance:

Template CSS:

* #sidebar li.widget_highlight_post {your_code_goes_here}
* #sidebar li.widget_highlight_post span.highlight_separator {your_code_goes_here}
* #sidebar li.widget_highlight_post span.highlight_note {your_code_goes_here}

Here the example:

* #sidebar li.widget_highlight_post {}
* #sidebar li.widget_highlight_post a span.highlight_separator{font-weight: bold; color: #999999 !important;}
* #sidebar li.widget_highlight_post a span.highlight_note{display: block; color: #999999 !important; font-size:11px; line-height:100%;}

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 1.0 =
* Released this plugin
