// INCOMPLETE - NOT TO BE USED

const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("confirmPassword");
const form = document.getElementById("myform");

form.addEventListener("submit", function() {
    if (passwordField.value !== confirmPasswordField.value) {
        confirmPasswordField.setCustomValidity("Passwords do not match");
    }
    else {
        confirmPasswordField.setCustomValidity("");
    }
});