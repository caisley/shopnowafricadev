# Shop Now Africa Website — Implementation Plan

## Scope and approach

Build the first release of the official Shop Now Africa website as a modular, cPanel-friendly PHP 8 site. The source will be deployable directly into a typical `public_html` directory and will not depend on Node.js, React, a build server, Manus APIs, or a long-running application service.

The release will cover the complete marketing site, service and industry content, lead-generation flows, legal/privacy pages, SEO essentials, accessible cookie preferences, and a secure multi-step RFP/RFQ enquiry process. Company contact details, notification email, social links, legal identity, and SMTP/DB settings will remain editable placeholders in configuration files and handover notes; no unverified SNA facts will be presented as proof.

## Architecture and project structure

- `index.php` — front controller for the homepage and fallback route handling.
- Root page entry points such as `about.php`, `services.php`, `contact.php`, `rfp.php`, and legal pages — direct, cPanel-friendly URLs that load reusable page components.
- `service-*.php` — individual service pages sharing a data-driven service template.
- `solutions.php`, `portfolio.php`, `how-we-work.php`, `insights.php`, `faq.php` — core supporting pages.
- `includes/` — configuration, URL helpers, security/session helpers, CSRF, page metadata, shared header/navigation/footer, form components, and content data.
- `assets/css/` — one maintainable design system stylesheet with responsive breakpoints, reduced-motion rules, forms, cards, editorial layouts, and utility classes.
- `assets/js/` — vanilla JavaScript for mobile navigation, progressive RFP steps, validation affordances, cookie preference controls, disclosure accordions, and small reveal interactions.
- `assets/images/` — lightweight local visuals only; the hero visual will be an original inline SVG/CSS system illustration to avoid licensing and external runtime dependencies.
- `uploads/` and `storage/` — protected examples/configuration for private uploads; `.htaccess` denies execution and direct listing. Production guidance will recommend storage outside public root where cPanel permits.
- `config/` — non-secret example configuration and environment guidance; real credentials are excluded.
- `database/` — optional SQL schema for MySQL/MariaDB submissions if enabled by SNA; the baseline site will degrade safely when not configured.
- `docs/` — README, technical handover, launch checklist, privacy/cookie checklist, and test summary.
- `sitemap.xml`, `robots.txt`, `.htaccess`, `404.php`, `.env.example` — deployment, SEO, routing, and safe configuration assets.

## Functional implementation

1. Shared PHP layout with semantic landmarks, skip link, accessible desktop/mobile navigation, consistent CTA language, page-specific title/description/canonical/Open Graph metadata, and footer legal/cookie links.
2. Homepage sections: hero, proof/approach, services, industry solutions, lifecycle, portfolio placeholders, insights placeholder, and conversion panel.
3. Dedicated meaningful pages for every required service, solution area, resource page, form, FAQ, and policy/disclaimer page.
4. Multi-step RFP/RFQ form with five steps, accessible progress state, client-side step validation, server-side validation, CSRF, honeypot/timing anti-spam, basic IP/session rate limiting, safe filename validation, unique submission reference, configurable notification path, safe confirmation state, and clear setup notes when mail or database is not configured.
5. Contact and privacy-request forms will use the same reusable secure form pipeline with configurable destinations and no silent success if delivery is unconfigured.
6. Cookie banner and preferences modal will distinguish essential preferences from optional analytics/marketing; no optional scripts will be loaded in the first release, and the footer will provide a persistent preferences entry point.
7. Technical SEO includes clean `.php` URLs, canonical helpers, Open Graph defaults, JSON-LD only for accurate Organization/WebSite data with editable placeholders, a sitemap listing published pages, robots guidance, meaningful alt text, and a custom 404.

## Design

### Design movement

- International digital product studio with editorial pacing — 0.06 probability.
- West African enterprise technology minimalism — 0.07 probability.
- Signal-led systems design — 0.04 probability.

**Chosen direction: Signal-led systems design.**

### Core principles

- Lead with a clear business signal before decorative technology language.
- Use asymmetric editorial layouts and rule lines to create momentum without a generic card grid.
- Keep proof honest: use process, clarity, and practical outcomes rather than invented metrics or logos.
- Make every interaction move a visitor toward understanding, qualification, or a useful next step.

### Color philosophy

Midnight navy provides credibility and calm. Electric blue marks action and navigation. Teal is reserved for systems, automation, and technical detail. Soft off-white creates room for long-form reading; charcoal keeps body text grounded. A small amber signal is used only for status or human warmth, never as a competing brand colour.

### Layout paradigm

Use a wide editorial frame with a persistent left rail on larger screens, oversized section numbering, horizontal rules, offset content columns, and occasional full-bleed bands. Service pages should alternate dense explanation with high-breathing-room summaries so the site feels like a studio with a point of view rather than a catalogue of rounded cards.

### Signature elements

- A small “signal line” motif: thin electric-blue rules, numbered section markers, and a pulsing node used sparingly.
- A dark technical canvas with layered SVG nodes/paths in the hero, suggesting systems and connected decisions rather than stock imagery.
- A recurring split label treatment: compact uppercase eyebrow + decisive headline + one sentence of plain-language proof.

### Interaction philosophy

Interactions should feel precise and calm. Mobile navigation opens as a focused panel, accordions expose one answer at a time, form steps preserve entered values, and buttons use directional movement rather than loud scaling. Focus states are always visible. Optional motion is disabled or simplified under `prefers-reduced-motion`.

### Animation

Use short opacity/translate reveals for section entrances, a slow ambient drift in the hero system graphic, and subtle line movement on primary CTA hover. Avoid scroll-jacking, looping decorative motion, and animations that hide content or affect form completion.

### Typography system

Use a local/system stack with `Arial`/`Helvetica` fallbacks for cPanel reliability, pairing a compact display scale with readable 17–19px body text and generous line-height. Headlines use tight tracking and controlled max-widths; eyebrow labels are uppercase, small, and letter-spaced. No external font request is required for the site to function.

### Brand essence

Shop Now Africa turns practical business ideas into useful digital systems, experiences, and decisions for organisations in Ghana and across Africa. Personality: clear, capable, grounded.

### Brand voice

Headlines are decisive without hype. CTAs describe a real next action. Example lines: “Bring us the business problem, not just the brief.” and “A clearer route from idea to impact.”

### Wordmark and logo

A custom text treatment combines `SNA` as a compact monogram inside a navy square with a thin electric-blue signal line that extends into the `Shop Now Africa` wordmark. The mark will be implemented in inline SVG/CSS so it remains sharp and dependency-free.

### Signature brand color

Signal Blue `#2F80ED` — bright enough to own action, restrained enough to remain credible against midnight navy.

## Reference synthesis

The supplied EchoHouse reference reinforces editorial service explanations and clear Ghana/Africa positioning. MainOne demonstrates the value of enterprise-grade navigation, service groupings, resource links, and a strong conversion close. Sortlist shows useful patterns for structured project briefs, budget/timeline qualification, and service categorisation. Ace Digital Hub reinforces the value of process storytelling and a direct, locally relevant agency voice. These cues are used for structure only; SNA copy, visuals, and interaction details are original.

## Material constraints and handover

- No real SNA email, phone, address, client names, case-study outcomes, social profiles, certifications, or legal registrations will be invented.
- RFP/contact delivery will be configured with placeholders and a fail-safe status message; the README will explain how to enable PHP `mail()` or SMTP via a cPanel-compatible provider without committing credentials.
- Any optional database schema will use prepared statements and will be clearly marked as requiring cPanel setup. A no-database mode will remain available for installations that only need email routing.
- The final ZIP will be created from the site root with no extra enclosing folder, caches, `node_modules`, secrets, or Manus-only dependencies.
