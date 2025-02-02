=== Simply Static Pro ===
Contributors: patrickposner
Tags: html, static website generator, static site, secure, fast
Requires at least: 6.3
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simply Static Pro enhances Simply Static with awesome features like Forms, GitHub integration and comments.

== Description ==

Simply Static Pro is an addon for the quite popular Simply Static Plugin and enhances it with various features.

= Forms =

Currently supported are Contact Form 7 and Gravity Forms. You can use the integrated webhook or use external services to receive the form submits and send you an e-mail.

= Comments =

Simply Static Pro can handle comment submission on your static site with webhooks.

= GitHub Integration =

Simply Static Pro integrates with GitHub. It creates and maintains a repository for you that you can use to deploy your website to one of the various
static site hosters like Vercel, Netlify, GitHub Pages or Cloudflare Pages.

= Builds =

Builds allow you to only export single pages or a subset of pages instead of doing a full static export every time.

= Search =

Simply Static Pro uses Fuse.js and creates a fully static index of your website. It provides a shortcode called [ssp-search] that renders a search bar with auto-suggest.
It's completely independed from any third-party services.

== Changelog ==

= 1.6.0 =

* Redirection integration for automated redirects
* Complianz integration for cookie consents
* new forms integration with support WP Forms, Fluent Forms and WS Form
* improved transient handling
* added helper videos for various features
* fixed missing directory for ShortPixel integration
* refactored Fuse.js integration to move away from XMLHTTPRequests
* improved Basic Auth handling
* improved parameters for GitHub integration (decreased tree size, increased blob batch size)
* added test deployment for quicker tests when setting up the options
* custom CSS for embedded content + improved admin UI for selecting redirect pages
* fixed activation when Basic Auth is already set up

= 1.5.2 =

* better file check for search integration
* added compatibility for new integration settings page
* fixed PHP notice for throttling requests option (GitHub)

= 1.5.1 =

* prevent empty branch in GitHub deployment
* cast seconds as int for sleep()
* improved excluded filter for search integration
* fixed variable naming for is_running indicator on single export meta boxes
* WPML Avada language switcher compatibility
* One-Click Basic Auth integration
* updated composer dependencies
* improved SFTP integration to dynamically create directories based on permissions
* auto export defaults to false again (excluded schedulded posts)
* PHP notices fixed for PHP 8.3 support
* removed DO integration (deprecated)
* fixed WPML Avada language switcher support
* latest Freemius SDK

= 1.5.0 =

* image optimization with ShortPixel
* Incremental exports for easier site updates
* support for scheduled posts
* auto-export for Single Exports including updating the XML sitemap
* stackable single exports (with WP-CRON)
* auto-transfer for robots.txt files
* automated 404 page handling for GitHub and AWS deployments
* improved SFTP deployments + better logging
* improved form redirect handling

= 1.4.7.3 =

* iframe integration for forms
* auto-export after comment submission
* BunnyCDN uses default 404 page
* WPML config updated + removed nested fields to support Polylang
* optimization settings now also change config dir URL
* auto-remove host for SFTP deployments
* fix PHP notice for static_url check in webhook

= 1.4.7.2 =

* reverted trait implementation to fix PHP conflicts with versions < 8.1
* implemented task for SFTP transfers

= 1.4.7.1 =

* improved config path handling with subdirectories
* improved config path handling for Windows environments
* avoid excludes if search exclude options is empty
* optimized default styles for Algolia search
* check for search enabled before firing hooks for Fuse.js integration
* fixed optimization settings not running in local directory exports
* improved disable emoji feature
* fixed replace plugins feature (optimizations)
* fixed missing namespace in WP-CLI command

= 1.4.7 =

* improved GitHub rate limit handling
* improved 404 page handling for GitHub
* cleaned up debug log for GitHub integration
* added filter to modify commit data (GitHub)
* auto-install and activate free plugin if necessary
* removed old multisite integration (now in free version)
* new optimization integration to /replace/hide/disable features

= 1.4.6.1 =

* changed ssp_search_index_item filter to be executed after language tag checked
* added support for new forms ID in Elementor Forms + checkbox support
* refactored WP_Filesystem to automatically check for transfer method with dedicated helper function
* AWS credentials optional check
* allow multiple search instances with Fuse and Algolia on the same page
* latest Freemius SDK + updated icon for consent
* fixed typo in helper function
* cleaned up vendor directory

= 1.4.6 =

* improved task handling filter mechanism
* fixed GitHub branch setting
* composer dependency update

= 1.4.5.9 =

* Classic Editor support for Single Export button
* removed top bar integration for Single Export button in Block Editor
* fixed conditional for search (Fuse) and comments endpoint
* added filter for CF7 to disable Rest API request
* set default branch in GitHub integration of setting empty

= 1.4.5.8 =

* avoid error in JS if sspt object not available
* WordPress 6.4 compatibility

= 1.4.5.7 =

* support for meta tags in search integration
* fixed upload_file method in BunnyCDN using storage_zone instead of pull_zone
* fixed constants for BunnyCDN usage
* fixed warning if no search selector is set on WP-CLI exports
* support for subdirectories in GitHub integration

= 1.4.5.6 =

* adapt to new CF7 ID for forms integration
* prevent issues with empty paths in GitHub integration

= 1.4.5.5 =

* improvements for AWS S3 transfer
* refactored GitHub integration
* removed knplabs GitHub SDK package and replaced with HTTP API of WP
* removed Guzzle as a dependency + composer upgrade
* fix for wp-cli generate for builds
* removed unused S3 transfer method (deprecated)

= 1.4.5.4 =

* added filter to modify AWS Cloudfront invalidation path.
* fixed PHP notice for search_excludes
* fixed PHP notice for cdn_404 setting
* support for characters in forms integration

= 1.4.5.3 =

* AWS SDK Cloudfront invalidation optional

= 1.4.5.2 =

* fixed PHP notice for search integration
* skip blob creation for faster GitHub exports

= 1.4.5.1 =

* dependency lock for PHP 7.4 support
* reduced version number for Guzzle to keep 7.4 support

= 1.4.5 =

* improved AWS S3 integration (dir transfer instead of files)
* delete_single also works with AWS now
* clear_repository only on full exports (GitHub integration)
* removed filter for WPML to stop polluting exports by settings per language
* improved activity log performance + wording
* Cloudfront cache invalidation
* subdirectory support for AWS S3 exports
* Fallback for JS Minifier (file and inline)
* is_running state check for Single and Build exports
* fixed JS Minifier issue (skipping exports)

= 1.4.4 =

* downgraded knplabs/github-api to ensure PHP 7.4 compatibility

= 1.4.3 =

* clear repository with filter ssp_clear_repository
* simplified GitHub repository handling for faster deployments
* fixed PHP notice for allow_subsites and fix_cors
* filter to prevent adding meta tags
* removed unused options in GitHub integration

= 1.4.2 =

* improved WPML language redirect feature
* improved Freemius SDK implementation

= 1.4.1 =

* CSS fix for single export metabox
* small refactor for builds (removed old logging, type hints..)
* cleanup single export class (removed old logging)
* fixed Fuse.js issue if shortcode is used and no selector is set

= 1.4 =

* deployment option for AWS S3
* deployment option for Digital Ocean Spaces
* removed settings hooks to integrate with new admin UI
* improved Fuse.js search integration
* option to set multiple Algolia selectors
* improved builds and single exports (include assets + better crawling)
* auto-include basic auth in form endpoints
* minify CSS/JS and HTML as task
* wildcard support for builds (beta)

= 1.3.2 =

* fixed Windows support for GitHub API
* fail-safe checks for config directory
* bug fix for comment endpoint handling
* error handling if user is missing in GitHub API integration
* filter to modify config directory
* Freemius SDK update

= 1.3.1 =

* fixed filter for auto export on single exports
* introduced batch processing for tree generation (GitHub API)
* improved logging + task handling for GitHub transfer task

= 1.3.0 =

* improved logging for GitHub Database API interactions
* refactored BunnyCDN handler to use API instead of FTP
* new task structure for BunnyCDN task for better batch handling
* new task structure for GitHub task for better batch handling
* automated rate limiting handling for GitHub API integration
* removed HTTPful as dependency for Single exports, Multilingual and search integration
* implemented constants definitions as alternative to options
* improved config directory handling and simplified file names for configs
* simplified search and forms integration - also works in WP now for easier testing
* WP-CLI integration for running exports (full/single/build)
* WordPress Multisite integration (network settings) - beta
* reworked search integration with its own task
* simplified forms integration with auto-handling for CORS to test on WP site as well
* removed checkups for current URL for simplified testing
* updated Freemius SDK
* added the option to set constants for certain options
* enhanced form integration for Elementor Forms
* UI improvements for Deployment settings (especially GitHub)
* improved WPML auto-redirect with browser-based language settings redirect

= 1.2.4.5 =

* added XML, JSON, PDF, TXT and CSV to supported mime types for GitHub blob generation API endpoint
* fixed PHP notice for GitHub sync
* fixed committer data format (it's an array instead of a string)
* simplified generation of simplstatic.txt file when setting up new repositories
* implemented throttling to prevent Secondary API Limit on GitHub if executed with WP-Cron
* implemented filter to dynamically add URLs and files to builds

= 1.2.4.4 =

* fixed object reference for add_file method
* replaced file_get_contents() with WP_Filesystem

= 1.2.4.3 =

* added filter to show settings/metaboxes based on capability
* added checkups for PAT and modified change visibility method in GitHub integration
* improved geo redirect for WPML and added a filter to activate it
* improved logging for GitHub Database API
* added option to connect existing repositories
* removed submit button from search form shortcode
* fixed UI bug when creating form configs
* disabled single/build exports while static export is already running

= 1.2.4.2 =

* added filter to enable WPML Geo direct
* improved mime type detection for blob conversion (fonts, PDFs..)
* refactored add_file method for contents() endpoint (GitHub API)

= 1.2.4.1 =

* Windows support for blobs (GitHub API)
* base64 encoding for images to blob conversion in trees (GitHub API)

= 1.2.4 =

* refactored GitHub API integration to Database API
* better namespacing for Algolia Integration
* updated Freemius SDK

= 1.2.3 =

* fix for PHP notice within GitHub integration
* new Tiiny.host integration
* UI improvements within the settings page
* introduced more save buttons to make configuration easier

= 1.2.2.6 =

* conditional load for WPML
* prevent redirect loop with certain WPML options

= 1.2.2.5 =

* organization handling with a new setting
* improved update_file() solution
* WPML compatibility for geo-based redirects
* improved logged for Fuse.js file permissions
* naming improvements for builds
* latest composer packages

= 1.2.2.4 =

* prevent PHP notice if use-forms is not set

= 1.2.2.3 =

* updated dependencies
* automatically trigger default GitHub actions

= 1.2.2.2 =

* fixed condition for search if static URL is set
* improved file generation with Fuse.js
* removed file_get_contents requirement and used ftruncate instead

= 1.2.2.1 =

* prevent error if no excludable pages/files set in in search integration.

= 1.2.2 =

* strict mode for Algolia LiveSearch implementation
* better filter for search results (separate file filter)
* fixed notice if use-forms is not set
* better URL decoding for search
* dynamic version number
* reset repository feature for GitHub integration
* delete function for builds
* UI fixes (reload for deployment settings)
* debug log for config URL
* prevent Fuse.js updates on Single/Build exports
* better and more safe check for excludable files in search integration
* fix form warning if use-forms option is not set

= 1.2.1 =

* brought back assignable builds

= 1.2 =

 * dependencies updated
 * improved Windows support
 * bugfixes for search crawler (Algolia)
 * no result feedback for Fuse.js
 * filter to load fuse.js from the local environment
 * "use strict" for JS files
 * menu fix for builds and forms
 * save config files in uploads instead of the plugins directory
 * reworked the BunnyCDN integration with WP HTTP API
 * new settings for BunnyCDN to set storage URL and access key
 * combined menus for Forms, Comments, and CORS
 * automatically update forms config on save ssp *form
 * only show CPT if forms are activated in the settings
 * filter to disable e-mail form webhook
 * improved builds to include additional files
 * delete posts/pages from the static website
 * WPML, Polylang and Translatepress support

= 1.1.3 =

 * added support for multisite activation
 * UI improvements for single exports
 * auto-clear table on static exports
 * use post ID as reference for Algolia
 * fixed CDN clear cache and added delete method
 * added webhook args filter
 * Freemius SDK security update

= 1.1.2 =

* allow JS in CF7 forms
* allow mail in CF7 forms
* fixed PHP notice in search view
* removed debuggin code
* improved translation
* copy config files if delivery method local directory

= 1.1.1 =

* improved CORS handling for forms
* new comments solution based on JavaScript
* load fuse.js via CDN to prevent map errors
* remove emojis from wp_head()
* better directory handling with CDN integration
* better conditional checks for search scripts
* custom 404 pages in BunnyCDN
* dev mode warning
* new filters for CDN data and directories
* new filter to deploy to sub direcories in GitHub
* generate static button in Block Editor top bar
* updated vendor scripts

= 1.1 =

* Algolia Search Integration
* Fuse.js Search Integration improvement
* improved search indexing for larger sites
* improved admin settings for search
* added options to select indexable content (title, content, excerpt)
* improved german translation
* added Webhook support for GitHub integration
* improved path handling for subdirectories
* automatically copy config files
* better single exports with taxonomies, images and archive pages
* added helper class for utility functions
* updated dependencies
* integrated BunnyCDN
* added dynamic filter based on meta tags for config URLs
* Basic Auth support for search crawling
* removed jQuery as dependencies from static sites

= 1.0.4 =

* option to deactivate forms integration
* admin menu fix for Simply Static settings
* builds and single exports now exporting images as well
* introduced filter to handle assets via single exports / builds

= 1.0.3 =

* better Freemius SDK integration
* better check for the free version
* check for wp_filesystem in Forms
* added message (HTML) and custom header for e-mail
* dynamic headers for form integration
* cron-job exection for search index via filter
* added option to deactivate/activate form integration

= 1.0.2 =

* dependency update for Arachnid/Crawler
* better error handling for form generation
* better error handling for search index generation
* new filter to run search index with cron
* automatically create configs directory if not exists
* bumbed version number for CSS (cache busting)

= 1.0.1 =

* fixed PHP notice for static-url
* CPT support for single exports
* form and search config via ajax
* removed form and search config tasks
* better config_url solution with JavaScript
* updated dependencies (Search and GitHub integration)
* added trial support

= 1.0 =

* initial release

