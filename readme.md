# WordPress Plugin Development

This repository contains a custom plugin developed by following the video tutorials from [LinkedIn Learning](https://www.linkedin.com/learning/wordpress-plugin-development/) by [Jeff Starr](https://www.linkedin.com/learning/instructors/jeff-starr?u=90783529) to customize the admin area and login page appearance. This repository also contains exercise files, helpful resources and guidelines for developing WordPress plugins. It includes useful links, best practices, and code examples to help you get started with your own plugin development.

## What does this plugin do

Customize the Login Page with following things
- URL for login link
- Title attribute for login link
- Enable custom login styles
- Custom login message

Customize the admin area with the following customizations
- Custom footer text
- Remove toolbar items
- Choose default admin color scheme for new users 

## Repository Structure

**plug-basics** folder containt the short examples for learning purposes. All files and folders are self explanatory with comments. Most of the files are single file plugin that can be test by moving the files into the plugins directory of the WordPress project. Rest of the repository contains the learning plugin that can be installed just like a normal WordPress plugin.

## Development Related Plugins

Following is the list of the plugins that can be used for the development puporses. Some of them are out-dated bu still can be consider to use.

- [Developer](https://wordpress.org/plugins/developer) By Automattic
- [WP-Developer-Tools](https://wordpress.org/plugins/wp-developer-tools) By PressPage Entertainment Inc. DBA PINGLEWARE
- [Query Monitor](https://wordpress.org/plugins/query-monitor) By John Blackbourn
- [Debug Bar](https://wordpress.org/plugins/debug-bar) By wordpressdotorg
- [Debug Queries](https://wordpress.org/plugins/debug-queries/) By Frank Bültge
- [Log Deprecated Notices](https://wordpress.org/plugins/log-deprecated-notices/) By Andrew Nacin
- [Simply Show Hooks](https://wordpress.org/plugins/simply-show-hooks/) By Stuart O'Brien, cxThemes
- [Loco Translate](https://wordpress.org/plugins/loco-translate/) By Tim Whitlock
- [Theme Switcha – Easily Switch Themes for Development and Testing](https://wordpress.org/plugins/theme-switcha/) By Jeff Starr
- [Debug Objects](https://wordpress.org/plugins/debug-objects/) By Frank Bültge
- [WP-FirePHP](https://wordpress.org/plugins/wp-firephp/) By Frank Bültge
- [Debug Bar Rewrite Rules](https://wordpress.org/plugins/fg-debug-bar-rewrite-rules/) By Frédéric GILLES
- [WP Developer Assistant](https://wordpress.org/plugins/wp-developer-assistant/) By Chris Jean
- [Latency Tracker](https://wordpress.org/plugins/latency-tracker/) By Shaun Kester
- [TPC! Memory Usage](https://wordpress.org/plugins/tpc-memory-usage/) By Chris Strosser

## Debug Mode

It's best practice to turn the debug mode on for the development purpose to keep an eye on the errors and warning. Debug mode should be off for the production project. Add the following lines into the **wp-config.php** file

```
ini_set('display_errors','on');
ini_set('error_reporting', E_ALL );
define( 'WP_DEBUG', true );				// Turn on the debug mode.
define( 'WP_DEBUG_LOG', true );			// Log the errors and warning in the debug.log file located in the **/wp-content/** directory
define( 'WP_DEBUG_DISPLAY', false );	// This prevent to display the errors and warning on the public facing pages of the site.
define( 'SAVEQUERIES', true);			
```

To turn off the debug mode use the following lines.

```
ini_set('display_errors','off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
define( 'SAVEQUERIES', false);
```

Visit [5 Ways to Debug WordPress](https://nacin.com/2010/04/23/5-ways-to-debug-wordpress/) to learn more about debugging.

## Plugin Naming Guidelines

Plugin name should match with the following. Let's suppose the name of the plugin is **My Plugin**.
- main plugin folder i.e. /my-plugin/
- main plugin file i.e. /my-plugin/my-plugin.php
- Text Domain i.e. 'my-plugin'

## WordPress APIs

Below is the list of WordPress default APIs.

- Dashboard API
- Database API
- HTTP API
- REST API
- File Header API
- Filesystem API
- Metadata API
- Options API
- Plugin API
- Quicktags API
- Rewrite API
- Settings API
- Shortcode API
- Transients API
- Widgets API
- XML-RPC API

## Plugin Development: Key Resources

- [WP Codex](https://codex.wordpress.org/)
- [WP Code Reference](https://developer.wordpress.org/reference/)
- [Plugin Handbook](https://developer.wordpress.org/plugins/)

## Actions & Filter Reference

Visit the following links to learn more about action and filter hook.

- [Action Reference](https://codex.wordpress.org/Plugin_API/Action_Reference)
- [Filter Reference](https://codex.wordpress.org/Plugin_API/Filter_Reference)

## Activation, Deactivation and Uninstall Hooks

- [Activation Hook](https://developer.wordpress.org/reference/functions/register_activation_hook/) - Run on plugin activation.
- [Deactivation Hook](https://developer.wordpress.org/reference/functions/register_deactivation_hook/) - Run on plugin deactivation.
- [Uninstall Hook](https://developer.wordpress.org/reference/functions/register_uninstall_hook/) - Run on deleting the plugin,

## Pluggable Functions

[Pluggable Functions](https://codex.wordpress.org/Pluggable_Functions) are the functions that can be redefined by the developers in the plugins and themes. 

## [Security & Data Validation Functions](https://developer.wordpress.org/plugins/security)

To build secure plugin, must use data validation, data sanitization, nonces etc. 

- [Data Validation](https://developer.wordpress.org/plugins/security/data-validation/)
- [Codex Data Validation](https://codex.wordpress.org/Data_Validation)
- [Sanitizing input](https://developer.wordpress.org/plugins/security/)
- [Using nonces](https://codex.wordpress.org/WordPress_Nonces/)

## Directory Structure

Guide to create the best plugin directory structure.

- Separate admin assets from public assets
- Put geenral PHP files in the /includes/ folder
- Add a proper file header to the main plugin file
- Keep the root directory as uncluttered as possible

## Architecture Patterns

- Single plugin file, [containing functions](https://lnkd.in/github_GaryJones)
- Single plugin file, [containing a class](https://lnkd.in/github_norcross)
- Main plugin file, then one or more class files. [Demo](https://lnkd.in/github_DevinVinson)

## WP Conditional Tags

Always include the admin and public facing files on respective screens using the conditional tags.

List of PHP functions that used as a conditional tags. 

- For Variables - isset()
- For Functions - function_exists()
- For Classes - class_exist()
- For Constants - defined()
- Learn more about [Conditional Tags](https://codex.wordpress.org/Conditional_Tags)

## ReadMe File

- [ReadMe File example](https://wordpress.org/plugins/files/2016/06/readme.txt)
- [ReadMe File validator](https://wordpress.org/plugins/developers/readme-validator/)

## Plugin Boilerplates

- [WordPress Plugin Boilerplate](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate)
- [WordPress Plugin Bootstrap](https://github.com/claudiosmweb/wordpress-plugin-boilerplate)
- [WP Skeleton Plugin](https://github.com/ptahdunbar/wp-skeleton-plugin/)

## Parents page slugs

To add a custom admin sub-menu page under the already created page use the following parent page slugs.
| Parent Menu Title  | Parent Slug to Use |
| :---: | :---: |
| Dashboard Menu | index.php |
| Posts | edit.php |
| Pages | edit.php?post_type=page |
| Media | upload.php |
| Comments | edit-comments.php |
| Temes | themes.php |
| Plugins | plugins.php |
| Users | users.php |
| Tools | tools.php |
| Settings | options-feneral.php |

## Steps for Plugin Internationalization

Follow these 3 steps to internationalize your plugin for greater reach.

- Phase 1: Prepare folders and files
	- Add a /language/ folder.
	- Use the same slug/name for the main plugin folder and file.
	- Add "Text Domain" and "Domain Path" to the file header. (main plugin file and readme.txt file)
- Phase 2: Add localization functions
	- include load_plugin_textdomain().
	- Replace all text strings with a localization function. __(), _e(), _x(), esc_html__(), esc_html_e(), esc_html _x(),
- Phase 3: Generate the POT file
	- Generate the POT file. 
	- Tools to use.
		- [Poedit](https://www.poedit.net/) - Standalone: works on all major operating systems. Enables translations, template generation, and more.
		- [Loco Translate](https://wordpress.org/plugins/loco-translate/) - WordPress Plugin. Enable translations, template generation, and more.

Visit the following links to read more about [Plugin Internationalization](https://developer.wordpress.or/plugins/internationalization/)

- [I18n for WordPress Developers](https://codex.wordpress.org/I18n_for_WordPress_Developers)
- [How to Internationalize Your Plugin](https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/)
- [I18n Theme Handbook](https://developer.wordpress.org/themes/functionslity/internationalization/)
- [GlotPress](https://glotpress.blog/)

## WordPress Loop
- [WP Codex: The Loop](https://codex.wordpress.org/The_Loop)
- [The Loop in Action](https://codex.wordpress.org/The_Loop_in_Action)
- [Theme Dev: The Loop](https://developer.wordpress.org/themes/basics/the-loop/)
- [4 Ways to Loop](https://digwp.com/2011/05/loops/)

## Information

### Custom Post Types & Taxonomies
- [Custom Post Types](https://codex.wordpress.org/Post_Types)
- [Custom Taxonomies](https://codex.wordpress.org/Taxonomies)

### By Default WordPress has 6 roles.
- Super Admin
- Administrator
- Editor
- Author
- Contributor
- Subscriber

### Default Post Types
- post
- page
- attachment
- revision
- menu

### Default Taxonomies
- category
- post_tag
- link_category
- post_format

### Types of Metadata
- Post			get_post_meta(), update_post_meta(), add_post_meta(), delete_post_meta()
- User			get_user_meta(), update_user_meta(),add_user_meta(), delete_user_meta()
- Comment		get_comment_meta(), update_comment_meta(), add_comment_meta(), delete_comment_meta()
- Term			get_term_meta(), update_term_meta(), add_term_meta(), delete_term_meta()

### WPDB Handy Methods
| Purpose  | Method |
| :---: | :---: |
| Escape a SQL Query | $wpdb->prepare() |
| Get generic results | $wpdb->get_results() |
| Get a variable | $wpdb->get_var() |
| Get a column | $wpdb->get_col() |
| Get column information | $wpdb->get_col_info() |
| Get a row | $wpdb->get_row() |
| Insert row | $wpdb->insert() |
| Replace row | $wpdb->replace() |
| Update row | $wpdb->update() |
| Delete row | $wpdb->delete() |
| Run general query | $wpdb->query() |

### Documentation of WPDB class
- [WPDB Class](https://codex.wordperss.org/Class_Reference/wpdb)
- [WPDB Methods](https://developer.wordperss.org/reference/classes/wpdb/#methods)
- [WP_Query Parameters](https://developer.wordpress.org/reference/classes/wp_query/#parameters)

### Admin notices
- [Guide about admin notices](https://goo.gl/ioxtGS)

### Class Names for Admin Notices
- notice-error				error message displayed (red border)
- notice-warning			warning message (yellow border)
- notice-success			success message (green border)
- notice-info				info message (blue border)

### WordPress Functions References
- [Functions References](https://developer.wordperss.org/reference/functions)

## Transients API
- Stores cached data in the options table
- Transients expire at a specified time
- Useful for storing temporary data
- Functions - get_transient(), set_transient(), delete_transient()
- User [Transients Manager](https://wordpress.org/plugins/transients-manager/) wp plugin to work with trnsient.
- [Transients API Documentation](https://codex.wordpress.org/Transients_API)

## HTTP API

- [HTTP API Documentation](https://codex.wordpress.org/HTTP_API)
- [Utility Functions](https://developer.wordpress.org/?s=wp_remote_retrieve_)

## WP CRON
- WP Crons only run on page load. So when a page is loaded, WP-Cron checks the queue of schedules tasks and run anything that is past the scheduled time.
- While System cron runs at specific times like 3:16 in the morning.
- Wp-Cron runs at specified intervals like every hour, twice daily, once in a day.
- To run wp-cron manually, visit this URL. https://example.com/wp-cron.php
- To disable the cron - Define this in **wp-config.php** file `define( 'DISABLE_WP_CRON', true );`
- Enable alternate WP-Cron functionality `define( 'ALTERNATE_WP_CRON', true );`
- wp_schedule_single_event() - Schedule a hook that only fires once
- wp_unschedule_event() - Unschedule a previously scheduled event
- wp_get_schedule() - Retrieve the schedule for the specified hook
- Learn more about [WP CRON](https://developer.wordpress.org/plugins/cron/)
- [Advanced Cron Manager](https://wordpress.org/plugins/advanced-cron-manager/): Use this plugin to check registered crons.

## REST API Documentation

- [REST API Reference](https://developer.wordpress.org/rest-api/reference/)
- [REST API](https://developer.wordpress.org/rest-api/)

## Developer Resources
- [Detailed Plugin Guidelines](https://developer.wordpress.org/plugins/wordpress-org/detailed-plugin-guidelines/)
- [Plugin Developer FAQ](https://developer.wordpress.org/plugins/wordpress-org/plugin-developer-faq)

## Interested To Hire Me

Hire me for your next WordPress plugin development from one of the following.

- [Hire Me](https://tassawer.com/?action=hire-me#hire-me)
- [Upwork Profile](https://www.upwork.com/freelancers/~012ab22cc4a4c31988)
- [Fiverr Profile](https://fiverr.com/tassawer)

