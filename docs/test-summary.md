# Test summary

## Checks completed in the sandbox

- PHP 8.3 CLI syntax checks passed for every PHP source file.
- The homepage, core content pages, legal pages, forms, all eight service pages, and the route/SEO documents returned successful responses through the local PHP server.
- All 24 sitemap URLs were requested and returned HTTP 200.
- Contact submission passed CSRF/session handling, required-field validation, secure local storage, unique reference generation, and confirmation rendering.
- RFP submission passed the same local submission path with the required organisation, project, commercial, and privacy fields.
- A forged RFP/RFQ submission without `privacy_acknowledgement=yes` is rejected by the strict server-side consent check.
- Select values are constrained server-side to the published option lists, and the form cooldown combines the session with an IP-hashed temporary-file cooldown.
- An invalid CSRF token was rejected without a successful confirmation.
- The RFP/RFQ form has a linear no-JavaScript fallback; JavaScript progressively reveals one step at a time when available.
- Mobile and desktop screenshots were inspected for the homepage, services overview, and RFP form. Layouts remain legible and the mobile navigation hook, cookie preferences hook, focus states, and reduced-motion CSS are present.
- The route manifest is valid JSON, the sitemap is valid XML, and robots.txt is present.
- The social preview metadata points to a local 1200×630 PNG fallback, with the original SVG mark retained for the browser icon.
- The project includes no runtime package dependencies or remote font/analytics requirements.

## Checks still required on SNA’s hosting

- Confirm the cPanel PHP version, `fileinfo` availability, `.htaccess`/Apache override behaviour, filesystem permissions, and HTTPS redirect.
- Replace and verify SNA’s official contact/legal/privacy information, social links, notification email, From email, and storage path.
- Configure and test the chosen mail transport and response ownership. The sandbox used `mail_enabled=false`, so no real email was sent.
- Confirm private storage is outside the public root where possible, backups are encrypted and tested, and retention/deletion responsibilities are agreed.
- Review legal wording and actual processing arrangements with qualified advice, including Ghanaian privacy obligations and any other jurisdictions SNA targets.
- Run live keyboard, screen-reader, contrast, mobile-browser, upload, deliverability, and Open Graph checks on the production domain.
