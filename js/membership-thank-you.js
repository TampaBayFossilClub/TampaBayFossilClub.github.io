// The thank-you page is a static return destination, not payment verification.
const returnNotice = document.getElementById('membership-return');
const cancelReturn = document.getElementById('cancel-membership-return');
const returnStatus = document.getElementById('membership-return-status');
const returnMessage = returnNotice.querySelector('p');

const homeRedirect = window.setTimeout(() => {
  window.location.replace('index.html');
}, 30000);

returnNotice.hidden = false;
cancelReturn.addEventListener('click', () => {
  window.clearTimeout(homeRedirect);
  returnMessage.hidden = true;
  cancelReturn.hidden = true;
  returnStatus.textContent = 'Automatic redirect canceled. You can stay here or use the home page link above.';
});
