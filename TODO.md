# Shop Now Africa Website — Delivery TODO

- [ ] **Shared cPanel-ready PHP architecture**
  - The website uses modular PHP includes for configuration, metadata, header, navigation, footer, reusable forms, service data, and page components.
  - The root entry point is `index.php`; paths work when extracted directly into the domain document root.
  - The site does not require Node.js, React, Next.js, Docker, a build server, a continuously running application server, Manus APIs, or a Manus subscription.

- [ ] **Responsive visual system and accessible navigation**
  - The visual identity uses midnight navy, electric blue, teal/turquoise, off-white, charcoal, and a restrained warm signal colour.
  - Desktop and mobile navigation include Home, Services, Solutions, Our Work/Portfolio, About Us, Insights/Resources, Contact, and a prominent Submit an RFP action.
  - Keyboard access, visible focus indicators, semantic landmarks, labelled controls, reduced-motion support, and responsive layouts are implemented.

- [ ] **Homepage and conversion journey**
  - The homepage communicates “Digital Solutions Built Around Your Business.” and includes Discuss Your Project and Submit an RFP CTAs.
  - It includes trust/approach content, the eight required services, six industry solution examples, the six-stage project lifecycle, a clearly labelled portfolio placeholder area, and a final conversion section.
  - No unverified clients, testimonials, awards, certifications, partnerships, statistics, completed projects, or outcomes are presented as facts.

- [ ] **Required page set**
  - Meaningful pages exist for About, Services, each required service, Industry Solutions, Portfolio/Our Work, How We Work, Insights/Resources, Contact, RFP, RFQ, FAQ, Privacy Policy, Cookie Policy, Terms and Conditions, Website Disclaimer, and Data Protection and Privacy Requests.
  - Pages share coherent navigation, metadata, internal links, and calls to action.

- [ ] **Secure enquiry, contact, RFP and RFQ processing**
  - The RFP/RFQ flow is multi-step with progress indicators, validation, privacy acknowledgement, optional marketing consent, confirmation reference, and graceful error states.
  - Required organisation, project, commercial, request-type, and optional upload fields are collected as specified.
  - Server-side validation, output escaping, CSRF, rate limiting/timing/honeypot anti-spam, duplicate mitigation, safe upload validation, unique references, and configurable delivery are implemented.
  - Contact and privacy-request forms use secure server-side processing and clearly report when delivery configuration is incomplete.

- [ ] **Privacy and cookie architecture**
  - Tailored privacy, cookie, terms, disclaimer, and privacy request content describes the implemented forms, cookies, logs, retention assumptions, third-party dependencies, rights, and editable legal placeholders.
  - Cookie consent offers accept, reject, and customise controls; optional analytics/marketing scripts are not enabled by default; footer preferences remain available.

- [ ] **Technical SEO and performance**
  - Page titles, meta descriptions, canonical URLs, Open Graph, semantic headings, image alt text, accurate structured data, internal links, sitemap.xml, robots.txt, and custom 404 are present.
  - CSS/JS remain lightweight; below-the-fold imagery is lazy-loaded when used; the site works without an external font or asset service.

- [ ] **Documentation and packaging**
  - `README.md`, technical handover, pre-launch checklist, privacy/cookie checklist, test summary, `.env.example`, and optional SQL/configuration guidance are included.
  - `shopnowafrica-website.zip` extracts directly into cPanel `public_html` without secrets, caches, `node_modules`, or an extra nested site folder.

- [ ] **Validation evidence**
  - All pages, internal links, forms, mobile navigation, metadata files, PHP syntax, and archive structure are checked in the sandbox.
  - Outstanding production-only checks such as SMTP delivery, database credentials, HTTPS enforcement, real contact details, legal review, and live cPanel behaviour are documented separately and not overstated.
