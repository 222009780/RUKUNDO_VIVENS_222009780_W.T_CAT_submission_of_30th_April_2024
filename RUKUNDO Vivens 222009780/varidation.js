// Validation function
function validate() {
    // Your validation logic
}

function finalvalidate() {
    // Your final validation logic
}

// Function to display success message
function displaySuccessMessage() {
    document.getElementById("New record created successfully").style.display = "block";
}

// Function to reset the form after successful submission
function resetForm() {
    document.getElementById("customerform.php").reset();
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
