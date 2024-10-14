let currentStep = 1;

function showStep(stepNumber) {
    // Add validation logic here if needed
    if (!validateStep(currentStep)) {
        return;
    }

    // Hide all steps
    const steps = document.querySelectorAll(".page");
    steps.forEach((step) => {
        step.style.display = "none";
    });

    // Show the selected step
    const selectedStep = document.getElementById(`step-${stepNumber}`);
    if (selectedStep) {
        selectedStep.style.display = "block";
        currentStep = stepNumber;

        // Update the active class in the sidebar
        updateSidebarActiveClass();

        // Show or hide the check mark based on completion
        if (isStepCompleted(currentStep)) {
            showCheckmark();
        } else {
            hideCheckmark();
        }

        // Disable or enable the next button based on completion
        if (isStepCompleted(currentStep) && validateStep(currentStep + 1)) {
            enableNextButton();
        } else {
            disableNextButton();
        }
    }
}

function validateStep(stepNumber) {
    // Add your validation logic here for each step
    // Return true if the step is valid, false otherwise
    return true;
}

function isStepCompleted(stepNumber) {
    // Add your logic to determine if a step is completed
    // For example, check if required fields are filled
    const step = document.getElementById(`step-${stepNumber}`);
    if (step) {
        const requiredInputs = step.querySelectorAll("[data-required]");
        return Array.from(requiredInputs).every(
            (input) => input.value.trim() !== ""
        );
    }
    return false;
}

function showCheckmark() {
    const checkmark = document.querySelector(
        `.step:nth-child(${currentStep}) .check`
    );
    if (checkmark) {
        checkmark.style.display = "block";
    }
}

function hideCheckmark() {
    const checkmark = document.querySelector(
        `.step:nth-child(${currentStep}) .check`
    );
    if (checkmark) {
        checkmark.style.display = "none";
    }
}

function enableNextButton() {
    const nextButton = document.querySelector(
        `.step:nth-child(${currentStep}) .next`
    );
    if (nextButton) {
        nextButton.classList.remove("disabled");
        nextButton.removeAttribute("disabled");
    }
}

function disableNextButton() {
    const nextButton = document.querySelector(
        `.step:nth-child(${currentStep}) .next`
    );
    if (nextButton) {
        nextButton.classList.add("disabled");
        nextButton.setAttribute("disabled", "disabled");
    }
}

function nextStep() {
    const nextStep = currentStep + 1;
    showStep(nextStep);
}

function prevStep() {
    const prevStep = currentStep - 1;
    showStep(prevStep);
}

function updateSidebarActiveClass() {
    // Update the active class in the sidebar
    const sidebarSteps = document.querySelectorAll(".step");
    sidebarSteps.forEach((sidebarStep) => {
        sidebarStep.classList.remove("active");
    });

    const selectedSidebarStep = document.querySelector(
        `.step:nth-child(${currentStep})`
    );
    if (selectedSidebarStep) {
        selectedSidebarStep.classList.add("active");
    }
}

// Initial show of the first step
showStep(1);
