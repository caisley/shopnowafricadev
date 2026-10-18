(() => {
  'use strict';

  document.body.classList.remove('no-js');

  const qs = (selector, scope = document) => scope.querySelector(selector);
  const qsa = (selector, scope = document) => [...scope.querySelectorAll(selector)];

  const menuToggle = qs('.menu-toggle');
  const primaryNav = qs('.primary-nav');
  if (menuToggle && primaryNav) {
    menuToggle.addEventListener('click', () => {
      const open = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!open));
      primaryNav.classList.toggle('is-open', !open);
      document.body.classList.toggle('nav-open', !open);
    });
    qsa('.primary-nav a').forEach((link) => link.addEventListener('click', () => {
      menuToggle.setAttribute('aria-expanded', 'false');
      primaryNav.classList.remove('is-open');
      document.body.classList.remove('nav-open');
    }));
  }

  const rfpForm = qs('[data-multistep-form]');
  if (rfpForm) {
    const steps = qsa('[data-form-step]', rfpForm);
    const progress = qsa('[data-progress-step]', rfpForm);
    const nextButtons = qsa('[data-next-step]', rfpForm);
    const previousButtons = qsa('[data-previous-step]', rfpForm);
    let currentStep = 0;

    const updateStep = (next) => {
      currentStep = Math.min(Math.max(next, 0), steps.length - 1);
      steps.forEach((step, index) => step.classList.toggle('is-active', index === currentStep));
      progress.forEach((item, index) => {
        item.classList.toggle('is-active', index === currentStep);
        item.classList.toggle('is-complete', index < currentStep);
      });
      const heading = qs('[data-step-heading]', steps[currentStep]);
      if (heading) heading.focus({ preventScroll: true });
      rfpForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    const validateStep = (step) => {
      let valid = true;
      qsa('input, select, textarea', step).forEach((field) => {
        if (!field.checkValidity()) {
          valid = false;
          field.classList.add('has-error');
        } else {
          field.classList.remove('has-error');
        }
      });
      if (!valid) {
        const firstInvalid = qs(':invalid', step);
        if (firstInvalid) firstInvalid.focus();
      }
      return valid;
    };

    nextButtons.forEach((button) => button.addEventListener('click', () => {
      if (validateStep(steps[currentStep])) updateStep(currentStep + 1);
    }));
    previousButtons.forEach((button) => button.addEventListener('click', () => updateStep(currentStep - 1)));
    rfpForm.addEventListener('submit', (event) => {
      if (!validateStep(steps[currentStep])) event.preventDefault();
    });
    updateStep(0);
  }

  const banner = qs('[data-cookie-banner]');
  const modal = qs('[data-cookie-modal]');
  const optional = qs('[data-cookie-optional]');
  const cookieKey = 'sna_cookie_preference';
  const readChoice = () => {
    try { return window.localStorage.getItem(cookieKey); } catch (error) { return null; }
  };
  const saveChoice = (choice) => {
    try { window.localStorage.setItem(cookieKey, choice); } catch (error) { /* local storage is optional */ }
    if (banner) banner.hidden = true;
    if (modal) { modal.hidden = true; modal.setAttribute('aria-hidden', 'true'); }
  };
  const openModal = () => {
    if (!modal) return;
    modal.hidden = false;
    modal.setAttribute('aria-hidden', 'false');
    const box = qs('.cookie-modal__panel', modal);
    const first = qs('button, input', box);
    if (first) first.focus();
  };
  const closeModal = () => {
    if (!modal) return;
    modal.hidden = true;
    modal.setAttribute('aria-hidden', 'true');
  };
  if (banner && !readChoice()) banner.hidden = false;
  qsa('[data-cookie-action]').forEach((button) => button.addEventListener('click', () => {
    const action = button.dataset.cookieAction;
    if (action === 'accept') saveChoice('all');
    if (action === 'reject') saveChoice('essential');
    if (action === 'customise' || action === 'open') openModal();
    if (action === 'close') closeModal();
    if (action === 'save') saveChoice(optional && optional.checked ? 'analytics' : 'essential');
  }));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal && !modal.hidden) closeModal();
  });

  qsa('input, textarea, select').forEach((field) => {
    field.addEventListener('input', () => field.classList.remove('has-error'));
  });
})();
