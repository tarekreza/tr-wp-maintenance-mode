
# WP Maintenance Mode

[![WordPress Version](https://img.shields.io/badge/WordPress-6.7%2B-blue)](https://wordpress.org/)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple)](https://php.net/)
[![License](https://img.shields.io/badge/License-GPL%20v2-green)](https://www.gnu.org/licenses/gpl-2.0.html)

A simple, professional, and SEO-friendly maintenance mode plugin for WordPress.

## 1. Project Overview

**WP Maintenance Mode** is a lightweight WordPress plugin that allows you to easily put your site into maintenance mode with a customizable message. Built with WordPress standards in mind, it ensures your SEO rankings are protected with proper 503 status codes while giving administrators full access to the site during maintenance.

**Key Use Cases:**
- Performing site updates or upgrades
- Making design changes
- Launching a new site
- Fixing critical issues
- Scheduled maintenance windows

## 2. Feature List

### Core Features:
✅ **One-Click Maintenance Mode Toggle** - Enable/disable maintenance mode instantly  
✅ **Customizable Maintenance Page** - Change headline and message  
✅ **SEO-Friendly 503 Status Code** - Protect search engine rankings  
✅ **Admin Bypass** - Administrators can still access the site  
✅ **Professional React Admin Interface** - Built with WordPress components  
✅ **Retry-After Header** - Tells crawlers when to come back  
✅ **Clean Uninstallation** - Removes all data when deleted  

## 3. Technical Requirements

- **WordPress Version**: 6.4 or later (tested up to 7.0)
- **PHP Version**: 7.4 or later (recommended 8.1+)
- **Browser**: Modern browser (Chrome, Firefox, Safari, Edge)
- **No special server requirements** - Works on standard WordPress hosting

## 4. Step-by-Step Installation Guide

### Option 1: Manual Installation (FTP/SFTP)

1. **Download the plugin** from GitHub
2. **Unzip** the downloaded file
3. **Upload** the `tr-wp-maintenance-mode` folder to `/wp-content/plugins/` using FTP/SFTP
4. **Activate** the plugin through the 'Plugins' menu in WordPress

### Option 2: WordPress Dashboard Upload

1. **Download** the plugin as a ZIP file
2. Go to **Plugins → Add New** in your WordPress admin
3. Click **Upload Plugin**
4. Choose the ZIP file and click **Install Now**
5. After installation, click **Activate**

### Option 3: Development Installation (for developers)

If you're working on the plugin locally:

```bash
# 1. Navigate to plugin directory
cd /path/to/wordpress/wp-content/plugins/tr-wp-maintenance-mode

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Build assets
npm run build

# Or watch for changes during development
npm run start
```

## 5. Configuration & Usage Instructions

### Getting Started:

1. After activating the plugin, look for the **Maintenance Mode** menu in your WordPress admin sidebar
2. Click on it to open the settings page
3. Toggle the **Enable Maintenance Mode** switch
4. Customize your headline and message
5. Click **Save Settings**

### Settings Explained:

| Setting | Description |
|---------|-------------|
| **Maintenance Mode** | Master toggle to enable/disable maintenance |
| **Headline** | Main title shown on the maintenance page |
| **Message** | Detailed message explaining the downtime |

### Accessing the Admin During Maintenance:
- Logged-in administrators can still access `/wp-admin/` normally
- All other visitors see the maintenance page

## 6. Customization Guide

### Customizing the Maintenance Template:

1. Copy the file `/public/view/maintenance.php` to your theme folder
2. Rename it to `maintenance.php` (optional: use `tr-maintenance.php`)
3. Customize the HTML and CSS as needed

### Adding Custom CSS:

Add custom CSS to your theme's `style.css` file or use the **Customizer → Additional CSS** section.

### Template Structure:
- The maintenance page uses a clean, modern design
- Fully responsive
- Works on all screen sizes

### Overriding via Theme:
WordPress will first look for a maintenance template in your active theme directory before using the plugin's default.

## 7. FAQ Section

### Q: How do I access the admin area while maintenance mode is active?
**A:** Simply log in as an administrator at `/wp-admin/` – you'll have full access while regular visitors see the maintenance page.

### Q: Will this plugin impact my site's search engine rankings?
**A:** No! The plugin sends proper 503 "Service Unavailable" headers that tell search engines your site is temporarily down, preserving your SEO rankings.

### Q: Do I need coding skills to use this plugin?
**A:** No! The plugin provides a user-friendly admin interface that requires no coding.

## 8. Troubleshooting

### White Screen Error
- Ensure PHP version is 7.4+
- Check for conflicting plugins
- Enable WordPress debug mode in `wp-config.php`:
  ```php
  define( 'WP_DEBUG', true );
  ```

### Maintenance Mode Not Working
- Clear your browser cache
- Check if you're logged in as admin (admins bypass maintenance)
- Verify plugin is activated

### 503 Header Not Sending
- Make sure your theme or another plugin isn't sending output before the template redirect
- Check for whitespace in your theme's `functions.php`

### Conflicting Plugins
- Temporarily disable other plugins to identify conflicts
- Common conflicts: caching plugins, other maintenance mode plugins

## 9. Contribution Guidelines

Contributions are welcome! Here's how you can help:

### Bug Reports
- Use GitHub Issues to report bugs
- Include WordPress version, PHP version, and steps to reproduce

### Feature Requests
- Open an issue with the "feature request" label
- Describe your idea clearly

### Pull Requests
1. Fork the repository
2. Create a feature branch: `git checkout -b feature/my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin feature/my-new-feature`
5. Submit a Pull Request

## 10. Changelog

### Version 1.0.0
- Initial release
- Basic maintenance mode functionality
- Customizable headline and message
- 503 status code support
- Admin bypass capability
- React-based admin interface

## 11. License & Support Information

### License
This plugin is licensed under the **GNU General Public License v2 or later**.

See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html) for more information.

### Author
**Muhammad Tarek Reza**  
Website: [https://www.muhammadtarekreza.com](https://www.muhammadtarekreza.com)

### Support
For support, please use the GitHub Issues page.

---

**Enjoy maintaining your WordPress site with ease! 🔧**
