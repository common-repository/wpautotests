=== WPAutoTests ===
Contributors: wpautotests
Tags: monitoring, availability, alerts, browser test, website monitoring
Requires at least: 3.6
Tested up to: 4.9.4
Stable tag: 1.1.03
Requires PHP: 5.2.4 or higher
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Monitor your WordPress site's availability.

== Description ==

Starting on May 1, 2018, automated tests will no longer be executed from WPAutoTests.com. You may continue using the WPAutoTests plugin to monitor your site's availability by following these steps:

* Follow the installation instructions and activate this plugin on your WordPress site.
* Create a free Ghost Inspector account at [https://ghostinspector.com/](https://ghostinspector.com/)
* Sign in to your Ghost Inspector account at [https://app.ghostinspector.com/account/login](https://app.ghostinspector.com/account/login)
* Create a new Test Suite by completing the form in the right column.
* Create a new Test by completing the form in the right column.
    * Give it a name.
    * Enter the URL of your website.
    * UN-check the "Execute initial test run" checkbox.
* Click the "Add Steps" link at the top right of the page test page.
* Click the "Add Step" button.
* In the "Element CSS selector" text field, enter: #WPAutoTests
* In the select menu, choose "Element is present".
* Click the "Save Changes" button at the top right of the page.
* Click the "Settings" link at the top right of the page test page.
* Click the "Schedule" button in the left column of the Test Settings page.
* Select "Daily" in the "Schedule" select menu
* Click the "Save Changes" button at the top right of the page.
* Click the "Run Test" button at the top right of the page.

== Installation ==

= From your WordPress Dashboard =

1. Visit 'Plugins' > 'Add New'
2. Search for 'WPAutoTests' and click 'Install Now'
3. Activate WPAutoTests from your Plugins page.

= From WordPress.org =

1. Download [WPAutoTests](https://wordpress.org/plugins/wpautotests/ "Automated Browser Testing and Website Monitoring Plugin").
2. Upload the 'wpautotests' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate WPAutoTests from your Plugins page.

== Changelog ==

= 1.1.03 =
* Switched over to Ghost Inspector test executions.

= 1.1.02 =
* Fixed screenshot captions

= 1.1.01 =
* readme.txt updates

= 1.1.0 =
* Account set up can be completed in WP Admin
* Test results can be viewed in WP Admin
* Testing and monitoring can be enabled and disabled in WP Admin

= 1.0.1 =
* Code clean up

= 1.0.02 =
* Fixed error on readme.txt

= 1.0.01 =
* Updated content to make it clear that an account is required.

= 1.0.0 =
* Initial version
