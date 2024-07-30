
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Fetch form data
        const formData = new FormData(this);
        
        // Send form data to login.php using Fetch API
        fetch("user_login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Password is correct, redirect to home.php
                window.location.href = "emp_dashboard.php";
            } else {
                // Display error message
                alert(data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again later.");
        });
    });
});
