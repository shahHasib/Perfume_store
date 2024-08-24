document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    const category = document.getElementById('category').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Example of simple validation (can be enhanced)
    if (username && password) {
        switch (category) {
            case 'admin':
                window.location.href = '../admin/dashboard.html'; // Redirect to admin dashboard
                break;
            case 'user':
                window.location.href = '../user/home.html'; // Redirect to user home
                break;
            case 'guest':
                window.location.href = '../guest/welcome.html'; // Redirect to guest welcome page
                break;
            default:
                alert('Please select a category.');
        }
    } else {
        alert('Please fill in all fields.');
    }
});
