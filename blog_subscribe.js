document.querySelector('.newsletter_form').addEventListener('submit', function(event) {
event.preventDefault();

const emailInput = this.querySelector('input[name="email"]');
const feedbackDiv = document.getElementById('newsletter_feedback');

if (emailInput.value) {
// Simulate a successful subscription
feedbackDiv.textContent = 'Thank you for subscribing!';
feedbackDiv.style.color = '#28a745'; // Green for success
emailInput.value = ''; // Clear the input field
} else {
// Simulate an error
feedbackDiv.textContent = 'Please enter a valid email address.';
feedbackDiv.style.color = '#dc3545'; // Red for error
}
});