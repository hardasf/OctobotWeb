var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var sendButton = document.getElementById("sendButton");
var claimButton = document.getElementById("claimButton");
var coinsDisplay = document.getElementById("coins");

var coins;

// Initialize coins from localStorage or set to 0 if not present
coins = parseInt(localStorage.getItem("coins")) || 0;
updateCoinsDisplay(coins);

// Function to periodically update coin balance and claim button state
function pollForUpdates() {
    // Fetch coin balance from the server
    var xhrCoins = new XMLHttpRequest();
    xhrCoins.onreadystatechange = function() {
        if (xhrCoins.readyState === XMLHttpRequest.DONE) {
            if (xhrCoins.status === 200) {
                coins = JSON.parse(xhrCoins.responseText).coins;
                updateCoinsDisplay(coins);
                // Update localStorage with the latest coin balance
                localStorage.setItem("coins", coins);
            } else {
                console.error("Error loading coins");
            }
        }
    };
    xhrCoins.open("GET", "get_coin_balance.php", true); // Change to your server-side script
    xhrCoins.send();

    // Check for last claim timestamp in local storage
    var lastClaimTimestamp = localStorage.getItem("lastClaimTimestamp");
    var currentTime = new Date().getTime();

    if (lastClaimTimestamp && (currentTime - lastClaimTimestamp < 20 * 60 * 1000)) {
        disableClaimButton((20 * 60 * 1000) - (currentTime - lastClaimTimestamp));
    } else {
        enableClaimButton();
    }

    setTimeout(pollForUpdates, 300); // Poll every
}

// Start polling for updates
pollForUpdates();

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

sendButton.onclick = function() {
    if (coins > 0) {
        coins -= 1;
        updateCoinsDisplay(coins);
        sendCoinsToServer(coins);
        // Add logic to send the message
    } else {
        // Disable send button if coins are 0
        sendButton.disabled = true;
    }
}

claimButton.onclick = function() {
    var currentTime = new Date().getTime();
    localStorage.setItem("lastClaimTimestamp", currentTime);
    disableClaimButton(20 * 60 * 1000);
    coins += 5;
    updateCoinsDisplay(coins);
    sendCoinsToServer(coins);
}

// Function to update coins display
function updateCoinsDisplay(coins) {
    coinsDisplay.textContent = coins;
}

// Function to handle sending coins to PHP script
function sendCoinsToServer(coins) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_coins.php", true); // Change to your server-side script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Coins updated successfully");
                // Update localStorage with the latest coin balance after successful synchronization
                localStorage.setItem("coins", coins);
            } else {
                console.error("Error updating coins");
            }
        }
    };
    xhr.send("coins=" + coins);
}

// Function to disable claim button and enable it after cooldown period
function disableClaimButton(cooldownTime) {
    claimButton.disabled = true;
    setTimeout(function() {
        claimButton.disabled = false;
    }, cooldownTime);
}

// Function to enable claim button
function enableClaimButton() {
    claimButton.disabled = false;
}
