document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category');
    const user = document.getElementById('username');
    const emailContainer = document.getElementById('email');
    const phoneContainer = document.getElementById('phone');

    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;

        if (selectedCategory === 'guest') {
            user.style.display = 'none';
            emailContainer.style.display = 'none';
            phoneContainer.style.display = 'block';
        } else {
            user.style.display = 'block';
            emailContainer.style.display = 'block';
            phoneContainer.style.display = 'none';
        }
    });
});
