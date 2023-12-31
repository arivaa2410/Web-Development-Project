// Get modal element
const modal = document.getElementById('newsModal');
// Get close button
const closeBtn = document.getElementsByClassName('close')[0];
// Get add news button
const addNewsBtn = document.getElementById('addNewsBtn');

// Function to open modal
function openModal() {
    modal.style.display = 'block';
}

// Function to close modal
function closeModal() {
    modal.style.display = 'none';
}

// Event listeners
addNewsBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});
