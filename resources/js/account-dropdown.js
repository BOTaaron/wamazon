let dropdownTimeout;

document.addEventListener('DOMContentLoaded', () => {
    const dropdownContainer = document.querySelector('.user-account-dropdown');

    if (dropdownContainer) {
        dropdownContainer.addEventListener('mouseover', () => {
            clearTimeout(dropdownTimeout);
            toggleDropdown(true);
        });
        // event listener when hovering over the sign in drop-down, adds a delay for the menu, so it doesn't disappear when moving the mouse
        dropdownContainer.addEventListener('mouseout', () => {
            dropdownTimeout = setTimeout(() => {
                toggleDropdown(false);
            }, 300);
        });
    }
});

function toggleDropdown(show) {
    const dropdown = document.getElementById('account-dropdown');
    if (dropdown) {
        if (show) {
            dropdown.classList.remove('hidden');
        } else {
            dropdown.classList.add('hidden');
        }
    }
}
