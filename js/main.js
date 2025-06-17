// Main JavaScript file for Architects Certificate theme

document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const mobileMenuButton = document.querySelector(".mobile-menu-button")
  const mobileMenu = document.querySelector(".mobile-menu")

  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden")
    })
  }

  // Smooth scrolling for anchor links
  const anchorLinks = document.querySelectorAll('a[href^="#"]')
  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Form handling for Apply Now button
  const applyButtons = document.querySelectorAll('button:contains("Apply Now")')
  applyButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Add your form handling logic here
      alert("Application form will be implemented here")
    })
  })
})
