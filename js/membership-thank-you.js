// The thank-you page is a static return destination, not payment verification.
const returnNotice = document.getElementById('membership-return');
const cancelReturn = document.getElementById('cancel-membership-return');
const returnStatus = document.getElementById('membership-return-status');
const returnMessage = returnNotice.querySelector('p');
const returnCountdown = document.getElementById('membership-return-countdown');
const redirectAt = Date.now() + 30000;

const countdownTimer = window.setInterval(() => {
  const secondsRemaining = Math.max(0, Math.ceil((redirectAt - Date.now()) / 1000));
  returnCountdown.textContent = `${secondsRemaining} ${secondsRemaining === 1 ? 'second' : 'seconds'} remaining.`;
}, 1000);

const homeRedirect = window.setTimeout(() => {
  window.clearInterval(countdownTimer);
  window.location.replace('index.html');
}, 30000);

cancelReturn.addEventListener('click', () => {
  window.clearTimeout(homeRedirect);
  window.clearInterval(countdownTimer);
  returnMessage.hidden = true;
  cancelReturn.hidden = true;
  returnStatus.textContent = 'Automatic redirect canceled. You can stay here or use the home page link above.';
});
