// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("closeBtn");

// Function to open the modal
function openModal() {
    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
}

// Event listener for the button click
btn.addEventListener("click", openModal);

// Event listener for the span click
span.addEventListener("click", closeModal);

// Event listener for clicking outside the modal
window.addEventListener("click", function(event) {
    if (event.target == modal) {
        closeModal();
    }
});