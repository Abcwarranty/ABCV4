/**
 * Main JavaScript for Policy Pilots Coming Soon theme
 *
 * @package PolicyPilots
 * @version 1.0.0
 */

// Declare policy_pilots_ajax if not defined
if (typeof policy_pilots_ajax === "undefined") {
  var policy_pilots_ajax = {
    ajax_url: "",
    nonce: "",
  }
}

document.addEventListener("DOMContentLoaded", () => {
  // Initialize subscription form
  initSubscriptionForm()

  console.log("Policy Pilots Coming Soon theme loaded successfully")
})

/**
 * Initialize email subscription form
 */
function initSubscriptionForm() {
  const form = document.getElementById("subscription-form")
  const emailInput = document.getElementById("subscriber-email")
  const submitButton = form?.querySelector(".submit-button")
  const buttonText = submitButton?.querySelector(".button-text")
  const loadingText = submitButton?.querySelector(".loading-text")
  const successMessage = document.getElementById("success-message")

  if (!form) return

  form.addEventListener("submit", async (e) => {
    e.preventDefault()

    const email = emailInput.value.trim()

    if (!email || !isValidEmail(email)) {
      showError("Please enter a valid email address")
      return
    }

    // Show loading state
    setLoadingState(true)

    try {
      const response = await fetch(policy_pilots_ajax.ajax_url, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          action: "policy_pilots_subscribe",
          email: email,
          nonce: policy_pilots_ajax.nonce,
        }),
      })

      const data = await response.json()

      if (data.success) {
        // Show success message
        form.style.display = "none"
        successMessage.style.display = "block"

        // Smooth scroll to success message
        successMessage.scrollIntoView({
          behavior: "smooth",
          block: "center",
        })

        // Reset form
        emailInput.value = ""
      } else {
        showError(data.data.message || "Something went wrong. Please try again.")
      }
    } catch (error) {
      console.error("Subscription error:", error)
      showError("Network error. Please check your connection and try again.")
    } finally {
      setLoadingState(false)
    }
  })

  /**
   * Set loading state for submit button
   */
  function setLoadingState(loading) {
    if (loading) {
      submitButton.disabled = true
      if (buttonText) buttonText.style.display = "none"
      if (loadingText) loadingText.style.display = "flex"
    } else {
      submitButton.disabled = false
      if (buttonText) buttonText.style.display = "inline"
      if (loadingText) loadingText.style.display = "none"
    }
  }

  /**
   * Show error message
   */
  function showError(message) {
    // Remove existing error messages
    const existingError = form.querySelector(".error-message")
    if (existingError) {
      existingError.remove()
    }

    // Create error message element
    const errorDiv = document.createElement("div")
    errorDiv.className = "error-message"
    errorDiv.style.cssText = `
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 0.75rem;
        border-radius: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.875rem;
    `
    errorDiv.textContent = message

    // Insert error message after form group
    const formGroup = form.querySelector(".form-group")
    formGroup.parentNode.insertBefore(errorDiv, formGroup.nextSibling)

    // Remove error message after 5 seconds
    setTimeout(() => {
      if (errorDiv.parentNode) {
        errorDiv.remove()
      }
    }, 5000)

    // Focus back to email input
    emailInput.focus()
  }

  /**
   * Validate email format
   */
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return emailRegex.test(email)
  }

  // Add real-time email validation
  emailInput.addEventListener("input", function () {
    const email = this.value.trim()

    if (email && !isValidEmail(email)) {
      this.style.borderColor = "#ef4444"
    } else {
      this.style.borderColor = "#cbd5e1"
    }
  })

  // Clear validation styling on focus
  emailInput.addEventListener("focus", function () {
    this.style.borderColor = "#60a5fa"

    // Remove any existing error messages
    const existingError = form.querySelector(".error-message")
    if (existingError) {
      existingError.remove()
    }
  })
}
