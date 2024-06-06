document.addEventListener("DOMContentLoaded", function() {
    const messageForm = document.getElementById('messageForm');
    const userNameInput = document.getElementById('userName');
    const messageInput = document.getElementById('message');
    const chatMessages = document.getElementById('chatMessages');
    const POLLING_INTERVAL = 5000; // Polling interval in milliseconds (e.g., every 5 seconds)

    // Fetch and display conversation from conversation.json
    fetchConversation();

    messageForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const userName = userNameInput.value.trim();
        const message = messageInput.value.trim();
        if (message !== '' && userName !== '') {
            sendMessage(userName, message);
            messageInput.value = '';
        }
    });

    // Polling function to fetch new messages
    function pollForMessages() {
        fetch('getNewMessages.php', { method: 'GET' }) // Replace 'getNewMessages.php' with your server endpoint
            .then(response => response.json())
            .then(data => {
                data.forEach(entry => {
                    appendMessage(entry.userName, entry.message);
                    appendBotResponse(entry.response);
                });
                chatMessages.scrollTop = chatMessages.scrollHeight;
            })
            .catch(error => console.error('Error fetching new messages:', error))
            .finally(() => setTimeout(pollForMessages, POLLING_INTERVAL)); // Schedule the next poll
    }

    // Start polling for new messages
    pollForMessages();

    function sendMessage(userName, message) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'OctoCore.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                appendMessage(userName, message);
                appendBotResponse(xhr.responseText);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Save conversation to JSON file via PHP
                saveConversationToJSON(userName, message, xhr.responseText);
            }
        };
        xhr.send('userName=' + encodeURIComponent(userName) + '&message=' + encodeURIComponent(message));
    }

    function appendMessage(sender, message) {
        const messageDiv = document.createElement('p');
        messageDiv.textContent = sender + ': '  + message;
        chatMessages.appendChild(messageDiv);
    }

    function appendBotResponse(response) {
        const responseDiv = document.createElement('div');
        const botResponse = document.createElement('p');
        botResponse.innerHTML = '<b style="color:red">𝙾𝚌𝚝𝚘𝙱𝚘𝚝:</b> ' + '<br>' + response;
        responseDiv.appendChild(botResponse);
        chatMessages.appendChild(responseDiv);
    }

    function saveConversationToJSON(userName, message, response) {
        const xhrSave = new XMLHttpRequest();
        xhrSave.open('POST', 'saveConversation.php');
        xhrSave.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhrSave.send('userName=' + encodeURIComponent(userName) + '&message=' + encodeURIComponent(message) + '&response=' + encodeURIComponent(response));
    }

    function fetchConversation() {
        fetch('conversation.json')
            .then(response => response.json())
            .then(data => {
                data.forEach(entry => {
                    appendMessage(entry.userName, entry.message);
                    appendBotResponse(entry.response);
                });
                chatMessages.scrollTop = chatMessages.scrollHeight;
            })
            .catch(error => console.error('Error fetching conversation:', error));
    }
});