# Technical handover

## Architecture

The website is a modular PHP 8 site. Root entry points provide the direct cPanel URLs. `includes/bootstrap.php` loads configuration, security headers, session settings, helpers, page content, and form processing. `includes/helpers.php` owns escaping, canonical metadata, CSRF tokens, shared layout, breadcrumbs, and CTA components. `includes/content.php` owns data-driven services, industry examples, process stages, and page bodies. `includes/form-views.php` contains reusable form markup.

The interface uses one local stylesheet and one small vanilla JavaScript file. No build step or package installation is required. The hero and portfolio visuals use original CSS/SVG systems artwork rather than external stock assets.

## Security controls

The site escapes HTML output, uses CSRF tokens on state-changing forms, uses a honeypot plus a short session cooldown and an IP-hashed shared cooldown against basic spam, validates required fields, email formats, URLs, and published select values server-side, creates random submission references, hashes the recorded IP rather than storing it in plain text, validates uploads by size, extension, MIME and safe random filenames, stores uploads and request JSON under protected paths, and sends no technical error details to visitors. Apache directory listing is disabled and sensitive file patterns are denied.

The package does not include authentication or an administration interface. This avoids creating an unsecured private portal. The request spool should be accessed through cPanel or a later authenticated workflow with least privilege. If configured mail delivery fails, the request remains in the durable spool and the server log records only a non-sensitive subject/reference failure note.

The RFP/RFQ form progressively shows one step when JavaScript is available. If JavaScript is unavailable, the `no-js` fallback displays all steps as one linear form and hides only the step-navigation controls, so the final submit remains reachable.

## Configuration

`config/config.example.php` is safe placeholder configuration. Copy it to `config/config.php` and replace the official site URL, notification address, verified From address, and storage location. Real credentials should live outside the public document root where the host allows. Keep `mail_enabled` false until actual delivery is verified.

## Known limitations

The sandbox can verify syntax, page output, metadata, navigation links, and form response paths, but it cannot verify the user’s live cPanel PHP version, mail provider, DNS, SSL redirect, filesystem permissions, legal identity, privacy contact, or production deliverability. The JSON spool is intentionally simple for shared hosting; it is not a substitute for a protected CRM or authenticated admin.
