# Shop Now Africa website

This package is a dependency-free PHP 8-compatible marketing website for Shop Now Africa. It is designed for ordinary cPanel hosting and can be extracted directly into the primary domain document root, normally `public_html`.

## Deploy

1. Create a full backup of the current site, if one exists.
2. Upload `shopnowafrica-website.zip` in cPanel File Manager and extract its contents directly into `public_html`.
3. Use PHP 8.0 or later where available. The site only relies on common PHP functions and the `fileinfo` extension for safer upload checks.
4. Copy `config/config.example.php` to `config/config.php`.
5. Replace the official site URL, notification email, verified From email, and storage path. Leave `mail_enabled` as `false` until delivery is configured and tested.
6. Create a private storage directory outside `public_html` when the hosting plan permits, then update `storage_path`. If this is not possible, keep the included protected `storage/` directory and confirm the host honours `.htaccess` rules.
7. Enable SSL in cPanel and redirect HTTP to HTTPS before launch. The included PHP session settings become secure when the site is served over HTTPS.
8. Submit test contact, RFP, RFQ, upload, and privacy requests. Confirm the stored files, notification route, acknowledgement process, and response ownership before launch.

## Email configuration

The site does not invent an SNA email address or SMTP credential. It stores requests in a protected JSON spool and reports when mail delivery is not configured. For production, configure a verified mailbox and mail transport with the host. If the host’s `mail()` delivery is unreliable, replace the small notification function in `includes/form-handler.php` with the cPanel-approved SMTP library and keep its credentials outside the public root. Never commit credentials to this package.

## Data and backups

The baseline does not require MySQL. Submissions and safe upload references are stored as protected files so the first release can run on standard shared hosting. Move this storage outside the public root where possible, restrict permissions, include it in encrypted backups, and define a retention/deletion process with SNA before launch. If SNA later needs reporting, an authenticated admin, or structured CRM integration, add a reviewed database design and least-privilege credentials rather than exposing the JSON spool.

## Editing content

Shared layout and content live in `includes/`. Service pages are data-driven in `includes/content.php` and have direct entry points in `services/`. Update placeholders for official contact details, legal identity, social links, privacy contact, and any authorised case studies before publication.

## Third-party dependencies

There are no runtime package dependencies, remote fonts, analytics tags, or Manus-only services. The site uses PHP, standard browser APIs, local CSS, local JavaScript, inline/local SVG, and Apache features commonly available in cPanel. Verify `mod_headers` and `mod_rewrite` support with the host; the site remains readable if the optional header rules are unavailable.

## Maintenance

Keep PHP patched, review form submissions and backups, remove obsolete uploads according to the approved retention period, review legal pages with qualified advice, and only add optional analytics or marketing scripts after consent, vendor, and privacy documentation are ready.
