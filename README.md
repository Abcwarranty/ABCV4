# Architects Certificate WordPress Theme

A professional, responsive WordPress theme designed specifically for architect certification services and professional architectural businesses in the UK.

![Theme Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress Compatibility](https://img.shields.io/badge/wordpress-5.0%2B-blue.svg)
![PHP Compatibility](https://img.shields.io/badge/php-7.4%2B-blue.svg)
![License](https://img.shields.io/badge/license-GPL--2.0-green.svg)

## 🎯 Features

### ✨ Design & Layout
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Professional Aesthetics** - Clean, modern design suitable for professional services
- **Custom Logo Support** - Easy logo upload and customization
- **Hero Section** - Compelling hero area with customizable content
- **Service Showcase** - Dedicated sections for displaying certification services
- **Client Testimonials** - Built-in testimonial system with star ratings
- **Statistics Counter** - Animated counters for business metrics

### 🛠️ WordPress Features
- **Custom Post Types** - Testimonials and Services post types
- **Theme Customizer** - Easy customization through WordPress Customizer
- **Widget Areas** - Multiple footer widget areas
- **Navigation Menus** - Primary and footer menu support
- **SEO Optimized** - Clean, semantic HTML structure
- **Accessibility Ready** - WCAG compliant with proper ARIA labels
- **Translation Ready** - Full internationalization support

### 📱 Technical Features
- **Modern JavaScript** - ES6+ with smooth scrolling and animations
- **Performance Optimized** - Lightweight and fast-loading
- **Cross-browser Compatible** - Works on all modern browsers
- **Print Styles** - Optimized for printing

## 🚀 Installation

### Method 1: WordPress Admin (Recommended)
1. Download the theme ZIP file
2. Go to **Appearance > Themes** in your WordPress admin
3. Click **Add New > Upload Theme**
4. Choose the ZIP file and click **Install Now**
5. Click **Activate** to enable the theme

### Method 2: FTP Upload
1. Extract the theme ZIP file
2. Upload the `architects-certificate` folder to `/wp-content/themes/`
3. Go to **Appearance > Themes** and activate the theme

### Method 3: Git Clone (For Developers)
\`\`\`bash
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/yourusername/architects-certificate-wordpress-theme.git architects-certificate
\`\`\`

## ⚙️ Setup & Configuration

### 1. Initial Setup
After activation, go to **Appearance > Customize** to configure:

- **Site Identity** - Upload your logo and set site title
- **Hero Section** - Customize hero title and description
- **Contact Information** - Set phone, email, and address
- **Menus** - Create and assign navigation menus

### 2. Content Setup

#### Create Navigation Menus
1. Go to **Appearance > Menus**
2. Create a new menu for "Primary Menu"
3. Add pages/links and assign to "Primary Menu" location
4. Optionally create a "Footer Menu" for footer links

#### Add Testimonials
1. Go to **Testimonials > Add New**
2. Enter testimonial content in the editor
3. Fill in client details in the meta box:
   - Client Name
   - Client Title
   - Client Company
   - Star Rating (1-5)

#### Add Services
1. Go to **Services > Add New**
2. Enter service title and description
3. Add service features (one per line) in the meta box
4. Optionally add a service icon class

### 3. Customization Options

#### Theme Customizer Settings
- **Hero Title** - Main headline text
- **Hero Description** - Subtitle/description text
- **Phone Number** - Contact phone number
- **Email Address** - Contact email address
- **Business Address** - Physical address
- **Business Hours** - Operating hours

#### Widget Areas
The theme includes 4 footer widget areas:
- Footer Widget Area 1-4

Add widgets through **Appearance > Widgets**

## 🎨 Customization

### Custom CSS
Add custom styles through **Appearance > Customize > Additional CSS**

### Child Theme (Recommended for Modifications)
Create a child theme to preserve customizations during updates:

\`\`\`php
<?php
// child-theme/style.css
/*
Theme Name: Architects Certificate Child
Template: architects-certificate
Version: 1.0.0
*/

@import url("../architects-certificate/style.css");

/* Your custom styles here */
\`\`\`

### Development Setup
For developers wanting to modify the theme:

\`\`\`bash
# Install dependencies
npm install

# Start development mode
npm run dev

# Build for production
npm run build

# Create distribution ZIP
npm run zip
\`\`\`

## 📋 Requirements

- **WordPress**: 5.0 or higher
- **PHP**: 7.4 or higher
- **MySQL**: 5.6 or higher
- **Modern Browser**: Chrome, Firefox, Safari, Edge

## 🔧 File Structure

\`\`\`
architects-certificate/
├── assets/
│   ├── css/
│   │   └── admin.css
│   └── js/
│       └── main.js
├── languages/
│   └── architects-certificate.pot
├── functions.php
├── header.php
├── footer.php
├── index.php
├── style.css
├── screenshot.png
├── README.md
├── package.json
└── .gitignore
\`\`\`

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## 📞 Support

### Documentation
- [WordPress Codex](https://codex.wordpress.org/)
- [Theme Development Handbook](https://developer.wordpress.org/themes/)

### Issues & Bug Reports
If you encounter any issues, please report them on our [GitHub Issues](https://github.com/yourusername/architects-certificate-wordpress-theme/issues) page.

### Feature Requests
We welcome feature requests! Please submit them through GitHub Issues with the "enhancement" label.

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guidelines](CONTRIBUTING.md) for details.

### Development Workflow
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This theme is licensed under the [GPL v2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

\`\`\`
Copyright (C) 2024 ABC Warranty

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
\`\`\`

## 🙏 Credits

- **Tailwind CSS** - Utility-first CSS framework
- **WordPress** - Content management system
- **Heroicons** - Beautiful hand-crafted SVG icons

## 📈 Changelog

### Version 1.0.0 (2024-01-XX)
- Initial release
- Responsive design with Tailwind CSS
- Custom post types for testimonials and services
- Theme customizer integration
- Mobile-friendly navigation
- SEO optimization
- Accessibility improvements

---

**Made with ❤️ for the WordPress community**

For more information, visit our [GitHub repository](https://github.com/yourusername/architects-certificate-wordpress-theme).
