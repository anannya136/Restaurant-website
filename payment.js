document.getElementById('payment-form').addEventListener('submit', async (event) => {
    event.preventDefault();

    // Hash the PIN number
    const pinInput = document.getElementById('pin-number');
    const hashedPin = await sha256(pinInput.value);

    // Replace the PIN number with its hash
    pinInput.value = hashedPin;

    // Display alert message
    alert("Your Order is Placed Successfully :)");

    // Redirect to home.html
    window.location.href = "home.html";
});

// SHA-256 hashing function (asynchronous)
async function sha256(message) {
    // encode as UTF-8
    const msgBuffer = new TextEncoder().encode(message);

    // hash the message
    const hashBuffer = await crypto.subtle.digest('SHA-256', msgBuffer);

    // convert ArrayBuffer to Array
    const hashArray = Array.from(new Uint8Array(hashBuffer));

    // convert bytes to hex string
    const hashHex = hashArray.map(b => ('00' + b.toString(16)).slice(-2)).join('');
    
    return hashHex;
}