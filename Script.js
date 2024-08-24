document.getElementById('subscriptionForm').addEventListener('submit', function(event) {
	event.preventDefault();

	const formData = new FormData(this);

	fetch('Submit_Subscription.php', {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.then(data => {
		const responseMessage = document.getElementById('responseMessage');
		if (data.success) {
			responseMessage.innerHTML = 'Subscription successful!';
		} else {
			responseMessage.innerHTML = 'Subscription failed: ' + data.message;
		}
	})
.catch(error => {
		const responseMessage = document.getElementById('responseMessage');
		responseMessage.innerHTML = 'An error occurred:' + error.message;
	});
});