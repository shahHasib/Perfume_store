document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category');
    const user = document.getElementById('user');
    const emailContainer = document.getElementById('em');
    const phoneContainer = document.getElementById('ph');
    phoneContainer.style.display = 'none';
    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;

        if (selectedCategory === 'guest') {
            user.style.display = 'none';
            emailContainer.style.display = 'none';
            phoneContainer.style.display = 'flex';
        } else {
            user.style.display = 'flex';
            emailContainer.style.display = 'flex';
            phoneContainer.style.display = 'none';
        }
    });
});
