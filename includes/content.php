<?php
declare(strict_types=1);

$serviceItems = [
    'website-design' => [
        'number' => '01', 'title' => 'Website design & development', 'short' => 'Websites that make the right first impression and do useful work after the click.',
        'problem' => 'Your website is hard to update, unclear to navigate, or not doing enough to turn attention into a conversation.',
        'value' => 'We shape a clear digital front door around your audience, offer, and next business action.',
        'services' => ['Content architecture and page planning', 'Responsive UX/UI design', 'PHP-friendly implementation or CMS handover', 'Technical SEO, accessibility, and performance foundations'],
        'slug' => 'website-design',
    ],
    'web-applications' => [
        'number' => '02', 'title' => 'Custom web applications & management systems', 'short' => 'Purpose-built tools that reduce manual work and give teams a clearer operating view.',
        'problem' => 'Important work lives in spreadsheets, inboxes, or disconnected processes that are difficult to track.',
        'value' => 'We map the workflow first, then design a right-sized application for the people who use it every day.',
        'services' => ['Requirements mapping and role design', 'Workflow, record, and reporting models', 'Web application interface design', 'Handover, documentation, and improvement roadmap'],
        'slug' => 'web-applications',
    ],
    'brand-identity' => [
        'number' => '03', 'title' => 'Graphic design & brand identity', 'short' => 'A visual system that helps people recognise, understand, and trust the work.',
        'problem' => 'Your communications look inconsistent or do not yet reflect the ambition of the organisation.',
        'value' => 'We create usable brand assets that work across digital, print, presentations, and everyday business moments.',
        'services' => ['Brand direction and visual language', 'Logo and identity systems', 'Campaign and communications design', 'Templates and brand-use guidance'],
        'slug' => 'brand-identity',
    ],
    'social-media' => [
        'number' => '04', 'title' => 'Social media management', 'short' => 'A more intentional social presence built around useful content and consistent execution.',
        'problem' => 'Your channels are active but irregular, reactive, or disconnected from your wider business goals.',
        'value' => 'We build a repeatable content rhythm that gives your audience a reason to pay attention and act.',
        'services' => ['Channel and audience review', 'Content planning and calendar development', 'Copy, creative direction, and publishing support', 'Monthly learning and optimisation'],
        'slug' => 'social-media',
    ],
    'digital-marketing' => [
        'number' => '05', 'title' => 'Digital marketing & online presence', 'short' => 'A focused digital presence that helps the right people find and choose you.',
        'problem' => 'Your business is difficult to discover online or your marketing activity is not connected to a measurable next step.',
        'value' => 'We connect message, channel, content, and conversion so activity is easier to understand and improve.',
        'services' => ['Digital presence audit', 'Campaign and content planning', 'Search-friendly content foundations', 'Lead-generation journeys and reporting'],
        'slug' => 'digital-marketing',
    ],
    'strategy' => [
        'number' => '06', 'title' => 'Digital strategy & business consultancy', 'short' => 'A practical outside perspective when the next move needs to make sense commercially.',
        'problem' => 'There are many possible digital initiatives but no shared priority, sequence, or decision framework.',
        'value' => 'We turn open questions into a clearer set of choices, priorities, and actions.',
        'services' => ['Digital opportunity discovery', 'Business and customer journey mapping', 'Prioritisation and roadmap workshops', 'Advisory support for implementation decisions'],
        'slug' => 'strategy',
    ],
    'automation' => [
        'number' => '07', 'title' => 'IT solutions & business process automation', 'short' => 'Better-connected processes that help people spend less time chasing updates.',
        'problem' => 'Repetitive handoffs, approvals, and reporting consume time that should go toward better service or delivery.',
        'value' => 'We identify the friction points worth solving and design automation around the real operating context.',
        'services' => ['Process discovery and pain-point mapping', 'Data and handoff simplification', 'Systems integration planning', 'Automation documentation and training'],
        'slug' => 'automation',
    ],
    'transformation' => [
        'number' => '08', 'title' => 'Digital transformation & technology advisory', 'short' => 'A grounded transformation view that keeps technology connected to organisational change.',
        'problem' => 'Technology decisions are being made in isolation from people, process, risk, and the wider operating model.',
        'value' => 'We help teams make the change legible, sequenced, and useful in the real world.',
        'services' => ['Current-state and capability review', 'Transformation opportunity framing', 'Technology option evaluation', 'Change, adoption, and continuous improvement planning'],
        'slug' => 'transformation',
    ],
];

$industryItems = [
    ['tag' => '01 / EDUCATION', 'title' => 'Education', 'body' => 'Connected school operations that make admissions, student records, fees, results, timetables, and parent communication easier to coordinate.', 'modules' => ['Admissions and student records', 'Fees and payment tracking', 'Results, timetables, and communication']],
    ['tag' => '02 / HEALTHCARE', 'title' => 'Healthcare', 'body' => 'Clearer administrative systems for clinics and hospitals, designed around appointment flow, patient administration, billing, and reporting.', 'modules' => ['Appointments and patient administration', 'Billing and service records', 'Operational reporting']],
    ['tag' => '03 / COMMUNITY', 'title' => 'Religious institutions', 'body' => 'Tools to help teams coordinate membership, giving, events, groups, and communication with more care and consistency.', 'modules' => ['Membership records and groups', 'Donations and event management', 'Announcements and communication']],
    ['tag' => '04 / OPERATIONS', 'title' => 'SMEs & enterprises', 'body' => 'Practical systems for customer relationships, inventory, invoicing, workflow, reporting, and day-to-day operations.', 'modules' => ['CRM and customer records', 'Inventory and invoicing', 'Workflow and reporting']],
    ['tag' => '05 / DEVELOPMENT', 'title' => 'NGOs & development organisations', 'body' => 'Information structures that support project monitoring, beneficiary records, reporting, and administrative visibility.', 'modules' => ['Project and activity monitoring', 'Beneficiary and partner records', 'Reporting and administration']],
    ['tag' => '06 / COMMERCE', 'title' => 'Retail & distribution', 'body' => 'Connected views across stock, orders, customer records, and sales reporting for teams that need to move with accuracy.', 'modules' => ['Inventory and order management', 'Customer and supplier records', 'Sales and performance reporting']],
];

$processSteps = [
    ['number' => '01', 'title' => 'Discovery', 'body' => 'We listen, ask practical questions, and understand the business context before proposing a solution.'],
    ['number' => '02', 'title' => 'Proposal', 'body' => 'We turn the brief into a clear scope, sequence, deliverables, assumptions, and next decision.'],
    ['number' => '03', 'title' => 'Design & build', 'body' => 'We shape the experience and implement the agreed solution with regular, understandable touchpoints.'],
    ['number' => '04', 'title' => 'Quality assurance', 'body' => 'We test the work against the agreed requirements, devices, content, and real-world usage paths.'],
    ['number' => '05', 'title' => 'Handover', 'body' => 'We prepare the launch, handover, documentation, and the knowledge needed to operate the result.'],
    ['number' => '06', 'title' => 'Improve', 'body' => 'Where useful, we stay close to the work and help teams learn from what happens next.'],
];

function service_url(string $slug): string
{
    return '/services/' . $slug . '.php';
}

function render_section_heading(string $eyebrow, string $title, string $body = '', string $align = ''): void
{
    echo '<div class="section-heading ' . e($align) . '"><p class="eyebrow">' . e($eyebrow) . '</p><h2>' . e($title) . '</h2>';
    if ($body !== '') echo '<p>' . e($body) . '</p>';
    echo '</div>';
}

function render_home(): void
{
    global $serviceItems, $industryItems, $processSteps;
    ?>
    <section class="hero hero--home">
        <div class="hero__grid-lines" aria-hidden="true"></div>
        <div class="shell hero__inner">
            <div class="hero__copy">
                <p class="eyebrow eyebrow--light"><span class="signal-dot"></span> Digital services · Ghana & Africa</p>
                <h1>Digital solutions built around <em>your business.</em></h1>
                <p class="hero__lede">From websites and digital marketing to custom business applications, Shop Now Africa helps organisations simplify operations, strengthen their digital presence, and turn ideas into impact.</p>
                <div class="button-row"><a class="button button--light" href="/contact.php">Discuss your project <span aria-hidden="true">↗</span></a><a class="button button--outline-light" href="/rfp.php">Submit an RFP</a></div>
                <p class="hero__note">Established 2020 · Practical by design · Built for what comes next</p>
            </div>
            <div class="hero-visual" aria-label="Abstract system illustration showing connected ideas becoming solutions" role="img">
                <div class="hero-visual__halo"></div><div class="hero-visual__axis hero-visual__axis--one"></div><div class="hero-visual__axis hero-visual__axis--two"></div>
                <div class="hero-visual__node hero-visual__node--a"><span>IDEA</span></div><div class="hero-visual__node hero-visual__node--b"><span>PLAN</span></div><div class="hero-visual__node hero-visual__node--c"><span>BUILD</span></div><div class="hero-visual__node hero-visual__node--d"><span>IMPACT</span></div>
                <div class="hero-visual__card hero-visual__card--one"><span class="mini-label">SYSTEM NOTE</span><strong>Make the next move legible.</strong></div><div class="hero-visual__card hero-visual__card--two"><span class="mini-label">SNA / 2020—</span><strong>Built around people.</strong></div>
            </div>
        </div>
        <div class="shell hero__footer"><span>Scroll to explore</span><span class="hero__line"></span><span>01 — 09</span></div>
    </section>

    <section class="section section--cream section--statement"><div class="shell statement-grid"><div class="statement-grid__marker"><span class="section-number">01</span><span class="vertical-rule"></span><span class="eyebrow">The SNA point of view</span></div><div class="statement-grid__copy"><h2>Good technology is not the point. <span>Useful change is.</span></h2><p>We bring design, technology, and business thinking into the same conversation. That means fewer disconnected ideas and more practical progress: a better way to explain what you do, run your work, or reach the people who need you.</p><a class="text-link" href="/about.php">Why organisations work with SNA <span aria-hidden="true">↗</span></a></div></div></section>

    <section class="section section--light" id="services"><div class="shell"><div class="split-heading"><div><?php render_section_heading('02 / CAPABILITIES', 'The right kind of help for the problem in front of you.', 'Start with the business need. We will help you find the service, sequence, or combination that makes sense.'); ?></div><a class="text-link split-heading__link" href="/services.php">View all services <span aria-hidden="true">↗</span></a></div><div class="service-list">
        <?php foreach ($serviceItems as $service): ?><a class="service-row" href="<?= e(service_url($service['slug'])) ?>"><span class="service-row__number"><?= e($service['number']) ?></span><span class="service-row__title"><?= e($service['title']) ?></span><span class="service-row__body"><?= e($service['short']) ?></span><span class="service-row__arrow" aria-hidden="true">↗</span></a><?php endforeach; ?>
    </div></div></section>

    <section class="section section--navy industry-preview"><div class="shell"><div class="split-heading split-heading--light"><div><?php render_section_heading('03 / SOLUTIONS', 'Different sectors. Same discipline: make the work clearer.', 'These are examples of the kinds of systems SNA can help shape. Each engagement starts with the organisation, not a pre-packed product.'); ?></div><a class="text-link text-link--light split-heading__link" href="/solutions.php">Explore solutions <span aria-hidden="true">↗</span></a></div><div class="industry-grid"><?php foreach ($industryItems as $index => $industry): ?><article class="industry-card"><span class="industry-card__tag"><?= e($industry['tag']) ?></span><h3><?= e($industry['title']) ?></h3><p><?= e($industry['body']) ?></p><span class="industry-card__index">0<?= $index + 1 ?></span></article><?php endforeach; ?></div></div></section>

    <section class="section section--cream process-preview"><div class="shell"><div class="process-preview__head"><div><?php render_section_heading('04 / HOW WE WORK', 'A steady route from first question to useful handover.', 'The process flexes with the engagement, but the principle stays the same: make decisions clear enough to keep moving.'); ?></div><a class="text-link" href="/how-we-work.php">See the full process <span aria-hidden="true">↗</span></a></div><div class="process-track"><?php foreach ($processSteps as $step): ?><div class="process-step"><span><?= e($step['number']) ?></span><h3><?= e($step['title']) ?></h3><p><?= e($step['body']) ?></p></div><?php endforeach; ?></div></div></section>

    <section class="section section--light work-preview"><div class="shell"><div class="split-heading"><div><?php render_section_heading('05 / SELECTED WORK', 'A place for the work to earn its story.', 'Real case studies will be added as disclosure is authorised. Until then, this space keeps the standard visible without inventing proof.'); ?></div><a class="text-link split-heading__link" href="/portfolio.php">View our work approach <span aria-hidden="true">↗</span></a></div><div class="work-placeholder"><div class="work-placeholder__art"><span class="work-placeholder__orb work-placeholder__orb--one"></span><span class="work-placeholder__orb work-placeholder__orb--two"></span><span class="work-placeholder__line"></span><span class="work-placeholder__label">CASE STUDY SLOT / 01</span></div><div class="work-placeholder__copy"><p class="eyebrow">Currently accepting authorised case studies</p><h3>Show the challenge. Explain the decision. Make the outcome useful.</h3><p>Each future story will cover the business challenge, solution, services involved, technologies where relevant, and verified outcomes. No borrowed logos, no inflated claims.</p><a class="text-link" href="/contact.php">Talk to us about a project <span aria-hidden="true">↗</span></a></div></div></div></section>

    <section class="section section--navy insight-strip"><div class="shell insight-strip__inner"><div><p class="eyebrow eyebrow--light">06 / RESOURCES</p><h2>Useful thinking for the next decision.</h2></div><div><p>We are building an insight library around digital presence, practical systems, and business change in Africa. The first release keeps this honest: no filler posts, just a clear place to add useful material.</p><a class="button button--outline-light" href="/insights.php">Explore resources <span aria-hidden="true">↗</span></a></div></div></section>

    <?php render_cta_band('07 / TAKE THE NEXT STEP', 'Bring us the business problem, not just the brief.'); ?>
    <?php
}

function render_standard_page(string $eyebrow, string $title, string $intro, array $sections, string $path): void
{
    render_page_intro($eyebrow, $title, $intro);
    echo '<div class="shell page-body">';
    render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => $title]]);
    foreach ($sections as $index => $section) {
        echo '<section class="content-block"><div class="content-block__index">' . e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) . '</div><div><h2>' . e($section['title']) . '</h2>';
        if (!empty($section['body'])) echo '<p class="lead-copy">' . e($section['body']) . '</p>';
        if (!empty($section['paragraphs'])) foreach ($section['paragraphs'] as $paragraph) echo '<p>' . e($paragraph) . '</p>';
        if (!empty($section['list'])) { echo '<ul class="check-list">'; foreach ($section['list'] as $item) echo '<li>' . e($item) . '</li>'; echo '</ul>'; }
        if (!empty($section['link'])) echo '<a class="text-link" href="' . e($section['link']['url']) . '">' . e($section['link']['label']) . ' <span aria-hidden="true">↗</span></a>';
        echo '</div></section>';
    }
    echo '</div>';
}

function render_services_overview(): void
{
    global $serviceItems;
    render_page_intro('Capabilities', 'Services that meet the moment you are in.', 'SNA brings strategy, design, technology, and communication together so organisations can make progress without losing the plot.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Services']]);
    echo '<div class="service-catalog">'; foreach ($serviceItems as $service) {
        echo '<article class="service-detail-card"><div class="service-detail-card__top"><span class="service-row__number">' . e($service['number']) . '</span><span class="eyebrow">' . e($service['title']) . '</span></div><h2>' . e($service['short']) . '</h2><p>' . e($service['problem']) . '</p><div class="service-detail-card__footer"><span>' . e($service['value']) . '</span><a class="text-link" href="' . e(service_url($service['slug'])) . '">Explore service <span aria-hidden="true">↗</span></a></div></article>';
    } echo '</div></div>'; render_cta_band('Need a starting point?', 'Tell us what needs to work better.');
}

function render_service_page(string $slug): void
{
    global $serviceItems;
    $service = $serviceItems[$slug] ?? null;
    if (!$service) { http_response_code(404); render_standard_page('404 / NOT FOUND', 'That service is not available.', 'The page you requested could not be found.', [], '/404.php'); return; }
    render_page_intro($service['number'] . ' / SERVICE', $service['title'], $service['short']);
    echo '<div class="shell page-body"><div class="service-detail-hero"><div><p class="eyebrow">The problem we help with</p><h2>' . e($service['problem']) . '</h2></div><div class="service-detail-hero__aside"><p class="eyebrow">The value we aim to create</p><p>' . e($service['value']) . '</p><a class="button button--primary" href="/rfp.php?service=' . e($service['slug']) . '">Discuss this service <span aria-hidden="true">↗</span></a></div></div><div class="service-detail-grid"><section><p class="eyebrow">What this can include</p><ul class="large-list">'; foreach ($service['services'] as $item) echo '<li><span>+</span>' . e($item) . '</li>'; echo '</ul></section><aside class="aside-note"><p class="eyebrow">A useful first conversation</p><p>We can start with a current website, workflow, campaign, or open business question. The scope can be shaped around what you know today and what needs to become clearer next.</p><a class="text-link" href="/contact.php">Start a conversation <span aria-hidden="true">↗</span></a></aside></div></div>'; render_cta_band('Next step', 'Let’s make the scope useful before we make it large.');
}

function render_about(): void
{
    render_standard_page('About SNA', 'Practical technology for organisations with somewhere to go.', 'Shop Now Africa was established in 2020 to help businesses, entrepreneurs, institutions, and organisations turn ideas into practical digital solutions.', [
        ['title' => 'A partner for the space between idea and implementation', 'body' => 'The work often begins before the technology is obvious. A business may need a clearer website, a more connected process, a stronger identity, or simply a better way to decide what to do next. SNA helps make that space more legible.', 'paragraphs' => ['Our role is to bring business context, user needs, design decisions, and implementation thinking into one conversation. The output might be a digital experience, a management system, a communications foundation, or a roadmap that gives a team confidence to move.']],
        ['title' => 'What we value in the work', 'body' => 'Clear communication, accountable delivery, useful documentation, and respect for the people who will live with the result.', 'list' => ['Tailor the solution to the real need, not a fashionable feature list.', 'Design for the people who use the service, system, or message.', 'Keep decisions visible so scope and trade-offs are understood.', 'Create foundations that can grow without forcing complexity too early.']],
        ['title' => 'A Ghanaian starting point, an African outlook', 'body' => 'SNA is initially focused on Ghana and the wider African market. Location is part of the context, not a limit on ambition.', 'paragraphs' => ['The site intentionally avoids unsupported claims about footprint, clients, awards, or partnerships. As verified information becomes available, it can be added through the same clear standard.'], 'link' => ['label' => 'See how we work', 'url' => '/how-we-work.php']],
    ], '/about.php');
    render_cta_band('Work with the context', 'Have an idea, a process, or a digital presence to improve?');
}

function render_solutions(): void
{
    global $industryItems;
    render_page_intro('Industry solutions', 'Start with how your organisation works.', 'SNA can help shape digital systems around the records, journeys, approvals, and decisions that matter in your sector.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Solutions']]);
    echo '<div class="solution-stack">'; foreach ($industryItems as $index => $industry) { echo '<article class="solution-row"><div class="solution-row__label"><span>' . e($industry['tag']) . '</span><strong>0' . ($index + 1) . '</strong></div><div><h2>' . e($industry['title']) . '</h2><p>' . e($industry['body']) . '</p><ul>'; foreach ($industry['modules'] as $module) echo '<li>' . e($module) . '</li>'; echo '</ul></div></article>'; } echo '</div></div>'; render_cta_band('Have a different context?', 'Tell us what you need to build.');
}

function render_portfolio(): void
{
    render_page_intro('Our work', 'A portfolio should show the thinking, not only the polish.', 'Real case studies will be added as SNA has authorised stories, images, and outcomes to share. This page is designed to hold them responsibly.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Our work']]);
    echo '<section class="portfolio-note"><div class="portfolio-note__mark">SNA<br><span>WORK</span></div><div><p class="eyebrow">Editorial standard</p><h2>No invented case studies. No borrowed proof.</h2><p>When a project is ready to publish, its story will explain the challenge, the solution, the services or technologies involved, and the outcomes that can be verified. Until then, the work section stays open about what is and is not available.</p><a class="text-link" href="/contact.php">Discuss a project for future inclusion <span aria-hidden="true">↗</span></a></div></section><section class="empty-state-grid"><div><span class="eyebrow">Case study slot / 01</span><h3>Project name</h3><p>Client or industry, where disclosure is authorised.</p></div><div><span class="eyebrow">Business challenge</span><p>A concise, evidence-led explanation of the need.</p></div><div><span class="eyebrow">Solution delivered</span><p>The work completed, without overclaiming.</p></div><div><span class="eyebrow">Verified outcome</span><p>Added only when SNA has permission to publish it.</p></div></section></div>'; render_cta_band('Build something worth documenting', 'Start with a clear problem and a useful next step.');
}

function render_how_we_work(): void
{
    global $processSteps;
    render_page_intro('How we work', 'A practical process for work that has consequences.', 'The method adapts to the scope of the engagement. The commitment stays consistent: understand first, communicate clearly, and hand over something people can use.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'How we work']]); echo '<div class="process-page">'; foreach ($processSteps as $step) echo '<article class="process-page__row"><span class="process-page__number">' . e($step['number']) . '</span><div><h2>' . e($step['title']) . '</h2><p>' . e($step['body']) . '</p></div><span class="process-page__signal" aria-hidden="true">↗</span></article>'; echo '</div><div class="process-callout"><p class="eyebrow">A note on scope</p><p>Not every engagement needs every stage at the same depth. A short advisory conversation and a multi-month application build should not feel like the same project. We will explain the route that fits the work.</p></div></div>'; render_cta_band('Ready when you are', 'Let’s make the first conversation useful.');
}

function render_insights(): void
{
    render_page_intro('Insights & resources', 'Useful thinking, without the filler.', 'A growing library for organisations making decisions about digital presence, practical systems, and technology-led change in Ghana and across Africa.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Insights']]); echo '<section class="resource-empty"><div class="resource-empty__mark">/ /</div><p class="eyebrow">Library in progress</p><h2>The first resource should earn its place.</h2><p>When SNA publishes an insight, it will be written to help a real decision: how to scope a website, evaluate a workflow, prepare an RFP, or make digital change more practical.</p><a class="button button--primary" href="/contact.php">Ask a question <span aria-hidden="true">↗</span></a></section></div>'; render_cta_band('Have a question worth unpacking?', 'Let’s turn it into a better brief.');
}

function render_faq(): void
{
    render_page_intro('Frequently asked questions', 'The useful answers before the first meeting.', 'A short set of honest starting points. If your question is not here, send it through the contact form or RFP process.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'FAQs']]); echo '<div class="faq-list">'; $faqs = [
        ['q' => 'Do you only work on websites?', 'a' => 'No. Websites are one part of the work. SNA also supports custom web applications, brand and communications design, social media, digital marketing, consultancy, automation, and transformation planning.'],
        ['q' => 'Can I submit an RFP if the scope is not fully defined?', 'a' => 'Yes. The RFP form is designed to capture what you know today, including where budget, timeline, or technology choices are still open.'],
        ['q' => 'Do you have fixed packages or prices?', 'a' => 'The right scope depends on the business problem, users, deliverables, and level of support. Use the RFP or contact form to provide context so a useful proposal can be shaped.'],
        ['q' => 'What happens after I submit a request?', 'a' => 'The website generates a reference number and will report whether delivery is configured. In production, SNA should configure its notification email and response process before launch.'],
        ['q' => 'Can you work with an existing website or system?', 'a' => 'Yes. An existing site, workflow, or application can be the starting point. The first step is understanding what is working, what is creating friction, and what should change.'],
        ['q' => 'Do you work outside Ghana?', 'a' => 'The business is initially focused on Ghana and the wider African market. The best way to confirm fit is to share the context and intended users.'],
    ]; foreach ($faqs as $faq) echo '<details class="faq-item"><summary>' . e($faq['q']) . '<span aria-hidden="true">+</span></summary><p>' . e($faq['a']) . '</p></details>'; echo '</div></div>'; render_cta_band('Still deciding?', 'A short conversation can make the next step clearer.');
}

function render_legal(string $type): void
{
    $pages = [
        'privacy' => [
            'Privacy policy',
            'How this first release handles information and what SNA must configure before launch.',
            [
                ['title' => 'Who controls the information?', 'body' => 'Shop Now Africa is the intended data controller for information submitted through this website. The official legal identity, contact email, address, and any local registration details must be inserted in the production configuration and reviewed by a qualified professional before publication.', 'list' => ['Contact form information is used to respond to an enquiry.', 'RFP/RFQ information is used to assess, scope, and respond to a request.', 'Privacy-request information is used to identify and handle a data protection request.', 'Server logs and essential cookies support security, availability, and abuse prevention.']],
                ['title' => 'What may be collected?', 'body' => 'Depending on the form used, this can include a name, organisation, work email, telephone number, country, website, project information, message content, uploaded supporting documents, consent choices, and technical request information.', 'paragraphs' => ['Do not submit unnecessary sensitive personal information. The first release does not request payment card details or create public user accounts.']],
                ['title' => 'Sharing, retention, and transfers', 'body' => 'Information may be accessed by authorised SNA personnel and cPanel hosting, mail, storage, or security providers that are configured by SNA. The retention period, deletion process, international transfer details, and processor list must be confirmed for the live setup rather than assumed here.', 'paragraphs' => ['The recommended production setup stores sensitive submissions and uploads outside the public web root where hosting permits.']],
                ['title' => 'Your rights and contact route', 'body' => 'Depending on the applicable law and circumstances, people may have rights to request access, correction, deletion, restriction, objection, or other review. The dedicated privacy request page provides a route, but a request may be subject to lawful exceptions and identity checks.', 'link' => ['label' => 'Make a data protection request', 'url' => '/privacy-requests.php']],
            ],
        ],
        'cookies' => [
            'Cookie policy',
            'A clear explanation of what the first release stores in the browser.',
            [
                ['title' => 'Essential cookies and preferences', 'body' => 'The first release uses only what is needed for session security, CSRF protection, and remembering the visitor’s cookie preference. These are not used to create an advertising profile.', 'list' => ['Essential security/session cookies may be set when forms or protected state are used.', 'The cookie preference choice is stored so the banner does not reappear unnecessarily.', 'Optional analytics and marketing scripts are not enabled by default.']],
                ['title' => 'Optional technologies', 'body' => 'If SNA later adds analytics, advertising, embedded media, chat, or other non-essential services, the configuration, notice, consent logic, vendor list, and retention explanation must be updated before activation.', 'paragraphs' => ['Visitors can reopen Cookie preferences from the footer.']],
                ['title' => 'Your choices', 'body' => 'Choose Accept all, Reject optional, or Customise. Rejecting optional cookies should not prevent access to the core website or contact/RFP forms.'],
            ],
        ],
        'terms' => [
            'Terms and conditions',
            'Baseline website terms for a first marketing release; review and adapt with qualified legal advice before publication.',
            [
                ['title' => 'Using this website', 'body' => 'The website is provided for general information about Shop Now Africa’s services and a route to make enquiries. Information on this site is not a binding proposal, scope, price, legal opinion, or guarantee of availability unless agreed separately in writing.', 'list' => ['Use the website lawfully and do not attempt to disrupt, probe, or misuse its forms or infrastructure.', 'Do not upload files that contain malware, unlawful material, or information you are not authorised to share.', 'SNA may update content, links, features, or availability as the website evolves.']],
                ['title' => 'Project discussions', 'body' => 'An enquiry, RFP, or RFQ submission is a request for consideration. A contract begins only when the relevant parties agree the scope, commercial terms, responsibilities, and other conditions in writing.', 'paragraphs' => ['Any examples of services, modules, industries, or future portfolio content describe possible work and are not claims that a particular product or outcome already exists.']],
                ['title' => 'Intellectual property and third-party links', 'body' => 'Unless stated otherwise, site content and original SNA brand assets belong to SNA or its licensors. Third-party links are provided for convenience; SNA is not responsible for their availability or content.'],
            ],
        ],
        'disclaimer' => [
            'Website disclaimer',
            'Important context for reading the information on this website.',
            [
                ['title' => 'Information without a guarantee', 'body' => 'The website is intended to help visitors understand SNA’s positioning, capabilities, and contact routes. It is not a substitute for project discovery, professional advice, legal advice, security review, or an agreed statement of work.', 'list' => ['Service descriptions are general and may be tailored or declined depending on fit.', 'Timelines, prices, outcomes, technologies, and availability are not promised by website copy alone.', 'Industry solution examples are illustrative and should not be read as evidence of deployed products or client results.']],
                ['title' => 'Placeholder information', 'body' => 'Official contact details, legal identity, social links, mail configuration, and any claims about clients or credentials must be completed and verified by SNA before launch.'],
            ],
        ],
    ];
    $page = $pages[$type] ?? $pages['disclaimer'];
    render_standard_page('Legal & privacy', $page[0], $page[1], $page[2], '/' . $type . '.php');
}

function render_page_content(string $page): void
{
    switch ($page) {
        case 'home': render_home(); break;
        case 'about': render_about(); break;
        case 'services': render_services_overview(); break;
        case 'solutions': render_solutions(); break;
        case 'portfolio': render_portfolio(); break;
        case 'how-we-work': render_how_we_work(); break;
        case 'insights': render_insights(); break;
        case 'faq': render_faq(); break;
        case 'privacy': render_legal('privacy'); break;
        case 'cookies': render_legal('cookies'); break;
        case 'terms': render_legal('terms'); break;
        case 'disclaimer': render_legal('disclaimer'); break;
        default: render_standard_page('Shop Now Africa', 'A clearer route from idea to impact.', 'Explore the site or start a conversation with SNA.', [], '/');
    }
}
