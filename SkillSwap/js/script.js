document.getElementById('chatbot-toggle').addEventListener('click', function() {
    const chatbotContainer = document.getElementById('chatbot-container');
    chatbotContainer.style.display = chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '' ? 'flex' : 'none';
});

document.getElementById('send-message').addEventListener('click', sendMessage);
document.getElementById('chatbot-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') sendMessage();
});

function sendMessage() {
    const inputField = document.getElementById('chatbot-input');
    const userMessage = inputField.value.trim();
    if (userMessage) {
        displayMessage(userMessage, 'user');
        inputField.value = '';
        // Fetch response from server
        fetch('/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: userMessage })
        })
        .then(response => response.json())
        .then(data => displayMessage(data.response, 'ai'))
        .catch(error => console.error('Error:', error));
    }
}

function displayMessage(message, sender) {
    const messageContainer = document.getElementById('chatbot-messages');
    const newMessage = document.createElement('div');
    newMessage.className = sender;
    newMessage.textContent = message;
    messageContainer.appendChild(newMessage);
    messageContainer.scrollTop = messageContainer.scrollHeight;
}
