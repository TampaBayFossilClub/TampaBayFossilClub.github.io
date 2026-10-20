// Keep the copyright year current on every page; HTML provides a fallback.
const copyrightYear = new Date().getFullYear();
document.querySelectorAll('[data-copyright-year]').forEach((element) => {
  element.textContent = copyrightYear;
});
