=== Plugin Name ===
Plugin Name: Highlight Post Widget
Contributors: Zaenal/Lokamaya
Donate link: http://blog.lokamaya.net/donate
Tags: widget, post, highlight, sidebar, plugin, modified, sticky
Requires at least: 2.9.2
Tested up to: 2.9.2
Stable tag: 1.0.2

A widget for displaying highlighted post on your sidebar and displayed your recent update post. 

== Description ==

The purpose of this plugin is simple. I want to list recents update of my posts. Similiar to default “Recent Posts Widget” by Wordpress, but this one sort the post by last modified time and enable to add a short note about change or update being made.

For example, I maintaince a wordpress plugin (we name it, “Hollydolly Plugin”) and create a post about it on my blog. And because the nature of blog—when new posts are added the older ones are taken down automatically—it’s only a matter of time that post ‘disappeared’ from frontpage and no longer seen by visitor. So, when I release a new version of “Hollydolly Plugin” and updated the old post about it, unfortunately, there is no way I can do to ‘attract’ visitor to read (again) that post.

Right, in the new version of Wordpress (since version 2.7) there is an option to make it as sticky post—make it listed on the top of frontpage. But that not my choice. I want to list it on my sidebar and displayed all over my blog. So I create this plugin for that purpose.

== Installation ==

= Requirement: =

I create this plugin for Wordpress version 2.9.2. I never test it on lower version, but I think it should work on Wordpress version 2.8 that support dynamic sidebar. Right, you also must use ‘widget ready‘ theme. 
    
= Installation: =

How to install this plugin manually

* Download: download the plugin to your computer
* Extract & Upload: extract the source code and upload it to your wordpress plugin directory
* Activate: login to WP-Admin and activate Highlight Post plugin from Plugins page.

= Appearance/CSS: =

I did not add any CSS to this plugin. By default, it will use the standard style, as same as “Recent Post” widget. Below are the hint to change the style of this widget. 

Just add the code below to your style.

Template CSS:

* #sidebar li.widget_highlight_post {your_code_goes_here}
* #sidebar li.widget_highlight_post span.highlight_separator {your_code_goes_here}
* #sidebar li.widget_highlight_post span.highlight_note {your_code_goes_here}

The Example:

* #sidebar li.widget_highlight_post {}
* #sidebar li.widget_highlight_post a span.highlight_separator{font-weight: bold; color: #999999 !important;}
* #sidebar li.widget_highlight_post a span.highlight_note{display: block; color: #999999 !important; font-size:11px; line-height:100%;}

== Frequently Asked Questions ==

= How to change the appearance? =

You have to edit style.css of your theme and add some code as mentioned in **Installation** instruction.

== Screenshots ==

1. Add or edit the custom field to be displayed as a note on the sidebar as you can find in screenshot-1.png

== Changelog ==

= 1.0 =
* Released this plugin

= 1.0.2 =
* Fix: missing UL close tag when generating widget
