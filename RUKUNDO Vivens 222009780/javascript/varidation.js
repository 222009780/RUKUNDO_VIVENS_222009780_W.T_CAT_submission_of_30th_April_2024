// Validation function
// Validation function
function validate() {
    // Your validation logic
}

function finalvalidate() {
    // Your final validation logic
}

// Function to display success message
function displaySuccessMessage() {
    alert("New record created successfully");
}

// Function to reset the form after successful submission
function resetForm() {
    document.getElementById("signup.html").reset();
}

// Function to handle form submission
function handleSubmit() {
    validate();
    finalvalidate();
    if (finalValidationPassed) { // Change this condition based on your final validation logic
        displaySuccessMessage();
        resetForm();
    }
}

