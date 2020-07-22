=== Zippy ===
Contributors: loyaltymanufaktur
Tags: importer, exporter, zip, archive, backup, transfer, posts, wordpress, test, wp
Requires at least: 4.4
Tested up to: 5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Incredibly easy solution to archive pages and posts as zip file and unpack them back even on the other website!

Archive posts and pages in one click. Transfer them to the other website or simple use this feature to backup you articles on the local computer.

<h4>Important</h4>

Please make sure Zip extension is enabled on your web server! Otherwise, the plugin will not work for you.

More info: https://www.php.net/manual/en/book.zip.php

<h4>Features:</h4>

<ul>
<li>archive posts as zip-files</li>
<li>extract archives on the any website with the installed plugin</li>
<li>download and store posts as zip archives</li>
<li>multiple posts support</li>
<li>custom post types support</li>
</ul>

== Installation ==

1. Unzip the plugin archive on your computer
2. Upload `zippy` directory to yours `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How to archive the post? =

Go to the 'All Post' page (wp admin) and move your mouse pointer to a specific post to see the "quick links".
A. Click on the link "Zip" to archive the post.
B. Use bulk action "Zip" to archive one or multiple posts.

= How extract the post from the archive? =

On the administration bar (black top bar) you can find the link "Zippy - unzip".
Use it to unzip previously archived post.

= I have an error message "Can not open zip archive. Error code: [value]" =

It occurs when the plugin can't open a new zip archive for reading, writing or modifying.

For the error code check this page: https://www.php.net/manual/en/ziparchive.open.php

= I don't see "Zippy" in the navigation menu or in the admin panel. =

Be sure that your user account has permissions to edit posts (edit_post).

== Screenshots ==

1. Links to archive the post and to extract

== Changelog ==

= 1.4.0 =
* Added access right checks.
* Added separated plugin page (admin navigation menu > Tools).
* Fixed problem with detecting parent posts.

= 1.3.4 =
* Design improvements.

= 1.3.3 =
* Wordpress 5.3 support added.

= 1.3.2 =
* Improved errors handling
* Updated FAQs

= 1.3.1 =
* Fixed functionality to generate archive filename.
* Export path changed from the Wordpress root directory to the wp-content directory.

= 1.3.0 =
* Added the possibility to transfer attachments that comes as ID's inside post custom fields.
* Formatting improvements.

= 1.2.4 =
* Wordpress 5.2 support added.

= 1.2.3 =
Just a minor improvements to keep the plugin alive.

= 1.2.2 =
* Name of the generated archive changed from post id to post title.

= 1.2.1 =
* Improved attachments transferring (to prevent duplicates).

= 1.2.0 =
* Added option to change the post type of the transferred article(s).
* Fixed errors handling.
* Small improvements.

= 1.1.6 =
* Improved functionality to handle translations.

= 1.1.5 =
* Added private post types support.

= 1.1.4 =
* Fixed problem with the archive files.

= 1.1.3 =
* Fixed PHP Warning during the import process.

= 1.1.2 =
* Fixed an issue when the image that is used in a multiple articles can be duplicated during the import (unzip) process.

= 1.1.1 =
* Improved multiple posts export.

= 1.1.0 =
* Added bulk action - multiple posts can be archived at once.
* Added custom post types support.
* Different improvements.

= 1.0.1 =
* Fixed bug: missed featured image on import when the checkbox 'Replace this post with the post which have the same name/slug' is not checked.
* Fixed bug: not possible to import custom post type article

= 1.0.0 =
* Initial release.