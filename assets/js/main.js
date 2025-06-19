/**
 * Main JavaScript file for Architects Certificate theme
 *
 * @package ArchitectsCertificate
 * @version 1.0.0
 */

document.addEventListener("DOMContentLoaded", () => {
  // Initialize theme functionality
  //initMobileMenu()
  //initSmoothScrolling()
  //initAnimations()
  //initFormHandling()
  //initMobileEnhancements() // Add this line
  /**
   * Main JavaScript for Policy Pilots Coming Soon theme
   *
   * @package PolicyPilots
   * @version 1.0.0
   */

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
    const submitButton = form.querySelector(".submit-button")
    const buttonText = submitButton.querySelector(".button-text")
    const loadingText = submitButton.querySelector(".loading-text")
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
        buttonText.style.display = "none"
        loadingText.style.display = "flex"
      } else {
        submitButton.disabled = false
        buttonText.style.display = "inline"
        loadingText.style.display = "none"
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

  console.log("Architects Certificate theme loaded successfully")
})

/**
 * Mobile menu functionality with improved touch handling
 */
function initMobileMenu() {
  const mobileMenuButton = document.querySelector(".mobile-menu-button")
  const mobileMenu = document.querySelector("#mobile-menu")

  if (mobileMenuButton && mobileMenu) {
    // Improve touch response by removing delay
    mobileMenuButton.style.touchAction = "manipulation"

    mobileMenuButton.addEventListener("click", function (e) {
      e.preventDefault() // Prevent double-tap issues on mobile
      const isExpanded = this.getAttribute("aria-expanded") === "true"

      // Toggle menu visibility with animation
      if (isExpanded) {
        mobileMenu.style.opacity = "0"
        mobileMenu.style.transform = "translateY(-10px)"

        setTimeout(() => {
          mobileMenu.classList.remove("active")
          this.setAttribute("aria-expanded", "false")
        }, 200)
      } else {
        mobileMenu.classList.add("active")
        this.setAttribute("aria-expanded", "true")

        // Small delay to allow DOM update before animation
        setTimeout(() => {
          mobileMenu.style.opacity = "1"
          mobileMenu.style.transform = "translateY(0)"
        }, 10)
      }

      // Update button icon
      const icon = this.querySelector("svg")
      if (icon) {
        if (isExpanded) {
          // Show hamburger icon
          icon.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>'
        } else {
          // Show close icon
          icon.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>'
        }
      }
    })

    // Close mobile menu when clicking outside
    document.addEventListener("click", (event) => {
      if (
        !mobileMenuButton.contains(event.target) &&
        !mobileMenu.contains(event.target) &&
        mobileMenu.classList.contains("active")
      ) {
        mobileMenu.style.opacity = "0"
        mobileMenu.style.transform = "translateY(-10px)"

        setTimeout(() => {
          mobileMenu.classList.remove("active")
          mobileMenuButton.setAttribute("aria-expanded", "false")
        }, 200)

        // Reset icon
        const icon = mobileMenuButton.querySelector("svg")
        if (icon) {
          icon.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>'
        }
      }
    })

    // Close mobile menu on window resize
    window.addEventListener("resize", () => {
      if (window.innerWidth >= 768 && mobileMenu.classList.contains("active")) {
        mobileMenu.classList.remove("active")
        mobileMenuButton.setAttribute("aria-expanded", "false")
        mobileMenu.style.opacity = "1"
        mobileMenu.style.transform = "translateY(0)"
      }
    })

    // Add touch-friendly navigation for mobile menu items
    const mobileMenuItems = mobileMenu.querySelectorAll("a")
    mobileMenuItems.forEach((item) => {
      item.style.touchAction = "manipulation"

      // Add active state for touch feedback
      item.addEventListener(
        "touchstart",
        function () {
          this.classList.add("bg-gray-50")
        },
        { passive: true },
      )

      item.addEventListener(
        "touchend",
        function () {
          setTimeout(() => {
            this.classList.remove("bg-gray-50")
          }, 200)
        },
        { passive: true },
      )
    })
  }
}

/**
 * Smooth scrolling for anchor links
 */
function initSmoothScrolling() {
  const anchorLinks = document.querySelectorAll('a[href^="#"]')

  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href")

      // Skip if it's just a hash
      if (href === "#") {
        return
      }

      const target = document.querySelector(href)

      if (target) {
        e.preventDefault()

        // Close mobile menu if open
        const mobileMenu = document.querySelector("#mobile-menu")
        if (mobileMenu && mobileMenu.classList.contains("active")) {
          mobileMenu.classList.remove("active")
          const mobileMenuButton = document.querySelector(".mobile-menu-button")
          if (mobileMenuButton) {
            mobileMenuButton.setAttribute("aria-expanded", "false")
          }
        }

        // Smooth scroll to target
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })

        // Update URL without triggering scroll
        if (history.pushState) {
          history.pushState(null, null, href)
        }
      }
    })
  })
}

/**
 * Scroll to section utility function
 */
function scrollToSection(sectionId) {
  const target = document.getElementById(sectionId)
  if (target) {
    target.scrollIntoView({
      behavior: "smooth",
      block: "start",
    })
  }
}

/**
 * Initialize scroll animations
 */
function initAnimations() {
  // Intersection Observer for fade-in animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-in")
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  // Observe elements for animation
  const animatedElements = document.querySelectorAll(".service-card, .testimonial-card, .stat-item")
  animatedElements.forEach((element) => {
    observer.observe(element)
  })

  // Counter animation for stats
  const statNumbers = document.querySelectorAll(".stat-item .text-4xl")
  const statsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target)
          statsObserver.unobserve(entry.target)
        }
      })
    },
    { threshold: 0.5 },
  )

  statNumbers.forEach((stat) => {
    statsObserver.observe(stat)
  })
}

/**
 * Animate counter numbers
 */
function animateCounter(element) {
  const text = element.textContent
  const number = Number.parseInt(text.replace(/\D/g, ""))
  const suffix = text.replace(/[\d\s]/g, "")

  if (isNaN(number)) return

  const duration = 2000
  const steps = 60
  const increment = number / steps
  let current = 0

  const timer = setInterval(() => {
    current += increment
    if (current >= number) {
      current = number
      clearInterval(timer)
    }
    element.textContent = Math.floor(current) + suffix
  }, duration / steps)
}

/**
 * Form handling
 */
function initFormHandling() {
  // Handle contact forms
  const contactForms = document.querySelectorAll(".contact-form")
  contactForms.forEach((form) => {
    form.addEventListener("submit", handleFormSubmit)
  })
}

/**
 * Handle form submissions
 */
function handleFormSubmit(e) {
  e.preventDefault()

  const form = e.target
  const formData = new FormData(form)
  const submitButton = form.querySelector('button[type="submit"]')

  let originalText // Declare originalText here

  // Show loading state
  if (submitButton) {
    originalText = submitButton.textContent
    submitButton.textContent = "Sending..."
    submitButton.disabled = true
  }

  // Add WordPress nonce if available
  if (typeof architects_certificate_ajax !== "undefined") {
    // Check if architects_certificate_ajax is defined before using it
    if (
      typeof architects_certificate_ajax !== "undefined" &&
      architects_certificate_ajax &&
      architects_certificate_ajax.nonce &&
      architects_certificate_ajax.ajax_url
    ) {
      formData.append("nonce", architects_certificate_ajax.nonce)
      formData.append("action", "submit_contact_form")

      // Send AJAX request
      fetch(architects_certificate_ajax.ajax_url, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            showNotification("Message sent successfully!", "success")
            form.reset()
          } else {
            showNotification("Error sending message. Please try again.", "error")
          }
        })
        .catch((error) => {
          console.error("Form submission error:", error)
          showNotification("Error sending message. Please try again.", "error")
        })
        .finally(() => {
          // Reset button state
          if (submitButton) {
            submitButton.textContent = originalText
            submitButton.disabled = false
          }
        })
    } else {
      console.error("architects_certificate_ajax is missing required properties (nonce or ajax_url).")
      showNotification("Error sending message. Please try again.", "error")
      if (submitButton) {
        submitButton.textContent = originalText
        submitButton.disabled = false
      }
    }
  } else {
    // Fallback for non-AJAX form submission
    setTimeout(() => {
      showNotification("Form submitted! We will contact you soon.", "success")
      form.reset()

      if (submitButton) {
        submitButton.textContent = originalText
        submitButton.disabled = false
      }
    }, 1000)
  }
}

/**
 * Mobile-specific enhancements
 */
function initMobileEnhancements() {
  // Detect if device is mobile
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)

  if (isMobile) {
    // Add mobile class to body
    document.body.classList.add("is-mobile")

    // Fix 100vh issue on mobile browsers
    const appHeight = () => {
      const doc = document.documentElement
      doc.style.setProperty("--app-height", `${window.innerHeight}px`)
    }
    window.addEventListener("resize", appHeight)
    appHeight()

    // Improve button touch response
    const allButtons = document.querySelectorAll("button, .btn-primary, .btn-outline-white")
    allButtons.forEach((button) => {
      button.style.touchAction = "manipulation"

      // Add touch feedback
      button.addEventListener(
        "touchstart",
        function () {
          this.style.transform = "translateY(1px)"
        },
        { passive: true },
      )

      button.addEventListener(
        "touchend",
        function () {
          setTimeout(() => {
            this.style.transform = "translateY(0)"
          }, 200)
        },
        { passive: true },
      )
    })

    // Fix iOS input focus issues
    const formInputs = document.querySelectorAll("input, textarea, select")
    formInputs.forEach((input) => {
      // Prevent zoom on iOS
      input.style.fontSize = "16px"

      // Improve scrolling to input on focus
      input.addEventListener("focus", function () {
        // Small delay to ensure keyboard is open
        setTimeout(() => {
          // Scroll to keep input in view
          const scrollPos = this.getBoundingClientRect().top + window.pageYOffset - 20
          window.scrollTo({ top: scrollPos, behavior: "smooth" })
        }, 300)
      })
    })
  }
}

/**
 * Show notification messages
 */
function showNotification(message, type = "info") {
  // Remove existing notifications
  const existingNotifications = document.querySelectorAll(".notification")
  existingNotifications.forEach((notification) => notification.remove())

  // Create notification element
  const notification = document.createElement("div")
  notification.className = `notification fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm ${
    type === "success"
      ? "bg-green-500 text-white"
      : type === "error"
        ? "bg-red-500 text-white"
        : "bg-blue-500 text-white"
  }`
  notification.textContent = message

  // Add close button
  const closeButton = document.createElement("button")
  closeButton.innerHTML = "&times;"
  closeButton.className = "ml-2 text-xl leading-none"
  closeButton.onclick = () => notification.remove()
  notification.appendChild(closeButton)

  // Add to page
  document.body.appendChild(notification)

  // Auto-remove after 5 seconds
  setTimeout(() => {
    if (notification.parentNode) {
      notification.remove()
    }
  }, 5000)
}

/**
 * Open application form (placeholder function)
 */
function openApplicationForm() {
  // This would typically open a modal or redirect to an application page
  showNotification("Application form will be available soon!", "info")

  // For now, scroll to contact section
  scrollToSection("cta")
}

/**
 * Utility functions
 */

// Debounce function for performance
function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

// Throttle function for scroll events
function throttle(func, limit) {
  let inThrottle
  return function () {
    const args = arguments

    if (!inThrottle) {
      func.apply(this, args)
      inThrottle = true
      setTimeout(() => (inThrottle = false), limit)
    }
  }
}

// Handle scroll events with throttling
window.addEventListener(
  "scroll",
  throttle(() => {
    // Add scroll-based functionality here if needed
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop

    // Example: Add class to header when scrolled
    const header = document.getElementById("masthead")
    if (header) {
      if (scrollTop > 100) {
        header.classList.add("scrolled")
      } else {
        header.classList.remove("scrolled")
      }
    }
  }, 100),
)

// Expose functions globally for inline event handlers
window.scrollToSection = scrollToSection
window.openApplicationForm = openApplicationForm

/**
 * Utility functions
 */

// Smooth scroll polyfill for older browsers
if (!("scrollBehavior" in document.documentElement.style)) {
  const script = document.createElement("script")
  script.src = "https://cdn.jsdelivr.net/gh/iamdustan/smoothscroll@master/src/smoothscroll.js"
  document.head.appendChild(script)
}

// Declare policy_pilots_ajax
if (typeof policy_pilots_ajax === "undefined") {
  var policy_pilots_ajax = {}
}

// Declare architects_certificate_ajax
if (typeof architects_certificate_ajax === "undefined") {
  var architects_certificate_ajax = {}
}
