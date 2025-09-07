// Wait for the page to load completely
window.onload = function() {
    // Show the popup when the page loads
    const popup = document.getElementById('popup');
    if (popup) {
        popup.style.display = 'flex';
    }

    // Close the popup when the close button is clicked
    const closeBtn = document.getElementById('closeBtn');
    if (closeBtn) {
        closeBtn.onclick = function() {
            popup.style.display = 'none';
        };
    }
};


