// frontend.js

// Function to handle login request
function loginUser(email, password) {
    fetch("http://localhost:5000/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ email: email, password: password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === "Login successful") {
            localStorage.setItem("user_id", data.user_id);  // Store user ID for later use
            window.location.href = "index.html";            // Redirect to homepage
        } else {
            alert("Login failed: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}

// Function to fetch recommendations for a logged-in user
function fetchRecommendations() {
    const user_id = localStorage.getItem("user_id");
    if (!user_id) {
        console.error("User ID not found. Please log in.");
        return;
    }

    fetch(`http://localhost:5000/recommendations/${user_id}`)
    .then(response => response.json())
    .then(data => {
        const recommendations = data.recommended_skills;

        // Log recommendations to console
        console.log("Recommended skills:", recommendations);

        // Code to display recommendations on the page
        const recommendationsContainer = document.getElementById("recommendations-container");
        recommendationsContainer.innerHTML = "";  // Clear existing recommendations

        recommendations.forEach(skill => {
            const skillItem = document.createElement("div");
            skillItem.classList.add("recommendation-item");
            skillItem.textContent = skill;
            recommendationsContainer.appendChild(skillItem);
        });
    })
    .catch(error => console.error("Error:", error));
}

// Event listener for login form submission
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    loginUser(email, password);
});

// Fetch recommendations on page load if user is logged in
document.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("user_id")) {
        fetchRecommendations();
    }
});
