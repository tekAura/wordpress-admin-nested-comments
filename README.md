# wordpress-admin-nested-comments
Changes flat display of comments on WordPress to nested format

Compatible with
 - Wordpress Version 5.0.3
 - Genesis theme framework

# Install instructions:
1. Copy files under wp-admin to your WordPress install
2. Copy topcomments.php file to /wp-content/themes/{yourtheme}/lib
3. Copy snippet from functions.php-snippet file and paste at the bottom of your theme's functions file at /wp-content/theme/{yourtheme}/functions.php

NOTE: Although it is not likely to change very often, be aware that these changes may be overwritten when you update WordPress core or your theme.  In the event that the wp-admin files get overwritten by an update, you will need to replace the the nested comments code into your wp-admin files manually and may need to make the changes to the nested comments code if any of the functions it used have become depreciated or changed in some other way in order to be compatible with the new version.
