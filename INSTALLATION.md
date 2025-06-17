# Installation Guide

## Quick Start

### Option 1: Download from v0
1. Click the "Download Code" button in the v0 interface
2. Extract the ZIP file
3. Upload to WordPress via Appearance → Themes → Add New → Upload Theme

### Option 2: Manual File Creation
If you're having issues with the download, you can manually create the files:

1. Create a new folder called `architects-certificate`
2. Copy each file from the code blocks into the appropriate location
3. Make sure the folder structure matches:
   \`\`\`
   architects-certificate/
   ├── style.css
   ├── functions.php
   ├── header.php
   ├── footer.php
   ├── index.php
   ├── assets/
   │   └── js/
   │       └── main.js
   └── README.md
   \`\`\`

### Option 3: GitHub Clone
\`\`\`bash
git clone https://github.com/yourusername/architects-certificate-wordpress-theme.git
\`\`\`

## Troubleshooting

### Image Upload Issues
- The theme doesn't require any pre-loaded images
- All icons are SVG-based and included in the code
- You can add your own logo through WordPress Customizer after installation

### File Permission Issues
- Ensure folders have 755 permissions
- Ensure files have 644 permissions

### Theme Not Appearing
- Check that style.css is in the root theme directory
- Verify the theme header comment is present in style.css

## After Installation

1. Go to Appearance → Customize
2. Upload your logo in Site Identity
3. Configure hero section text
4. Add your contact information
5. Create navigation menus
6. Add testimonials and services content

## Support

If you encounter issues:
1. Check WordPress error logs
2. Ensure PHP 7.4+ compatibility
3. Verify all files were uploaded correctly
4. Test with a default WordPress installation first
