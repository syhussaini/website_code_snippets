# WordPress Admin Custom Styling

A WordPress PHP snippet that customizes the appearance of the WordPress admin area with a custom color scheme and typography.

## Overview

This snippet applies custom styling to the WordPress admin interface, specifically:

- **Dark Green Theme**: Applies a consistent dark green color scheme (#244739) to the admin menu and admin bar
- **Hover & Active States**: Highlights menu items with a bright green color (#00bb86) on hover and when active
- **Typography Customization**: Sets custom font sizes and colors for menu items and admin bar text
- **Consistent Branding**: Ensures the admin area matches your brand colors

### How It Works

1. The snippet hooks into WordPress's `admin_head` action, which runs in the `<head>` section of all admin pages
2. Custom CSS is injected directly into the admin area using inline styles
3. All styles use `!important` flags to ensure they override default WordPress admin styles
4. The styling targets:
   - Left admin menu (`#adminmenu`)
   - Top admin bar (`#wpadminbar`)
   - Menu items, submenu items, and their hover/active states

## How to Use

### Installation via WPCode Lite Plugin

1. **Install WPCode Lite** (if not already installed)
   - Go to WordPress Admin → Plugins → Add New
   - Search for "WPCode Lite" and install the free version
   - Or download directly from: [WPCode Lite on WordPress.org](https://wordpress.org/plugins/insert-headers-and-footers/)

2. **Add the Snippet**
   - Navigate to **Code Snippets** → **Add Snippet** (or **WPCode** → **Add Snippet**)
   - Click **"Add Your Custom Code (New Snippet)"**

3. **Configure the Snippet**
   - **Title**: Give it a descriptive name (e.g., "Custom Admin Styling")
   - **Code Type**: Select **PHP Snippet**
   - **Location**: Select **Admin Only** (recommended, as this only affects the admin area)
   - **Paste the Code**: Copy and paste the entire contents of `wp-admin-styling.php`
   - **Activate**: Toggle the switch to activate the snippet

4. **Save and Test**
   - Click **Save Snippet**
   - Visit any WordPress admin page to see the custom styling applied

## How to Modify

### 1. Change the Main Background Color

**Admin Menu Background** (Line 6):
```php
background-color: #244739 !important; /* Change to your brand color */
```

**Admin Bar Background** (Line 11):
```php
background-color: #244739 !important; /* Should match menu background */
```

**Color Examples:**
- Blue: `#1e3a5f`
- Purple: `#4a2c4a`
- Dark Gray: `#23282d`
- Custom: Use any hex color code

### 2. Change Hover & Active State Color

**Hover/Active Background** (Line 22):
```php
background-color: #00bb86 !important; /* Change to your accent color */
```

**Color Examples:**
- Blue accent: `#0073aa`
- Purple accent: `#826eb4`
- Orange accent: `#ff6b35`
- Custom: Use any hex color code that contrasts well with your background

### 3. Adjust Font Sizes

**Menu Text Size** (Line 29):
```php
font-size: 15px !important; /* Increase or decrease as needed */
```

**Admin Bar Text Size** (Line 36):
```php
font-size: 14px !important; /* Increase or decrease as needed */
```

**Size Examples:**
- Small: `12px`
- Medium: `14px` (default WordPress)
- Large: `16px`
- Extra Large: `18px`

### 4. Change Text Colors

**Menu Text Color** (Line 30):
```php
color: #ffffff !important; /* White text - change if needed */
```

**Admin Bar Text Color** (Line 37):
```php
color: #ffffff !important; /* White text - change if needed */
```

**Hover Text Color** (Line 41):
```php
color: #dddddd !important; /* Light gray on hover */
```

**Color Examples:**
- White: `#ffffff`
- Light Gray: `#e0e0e0`
- Cream: `#f5f5f5`
- Custom: Use any hex color code

### 5. Add Additional Styling

You can add more CSS rules within the `<style>` tag. For example:

**Add padding to menu items:**
```php
.wp-admin #adminmenu li.menu-top > a {
  padding: 12px 20px !important;
}
```

**Style submenu items differently:**
```php
.wp-admin #adminmenu .wp-submenu {
  background-color: #1a3a2d !important;
}
```

**Add border to active menu item:**
```php
.wp-admin #adminmenu .current.menu-top > a {
  border-left: 3px solid #00bb86 !important;
}
```

### 6. Change Function Name

If you need to avoid conflicts with other code, rename the function (Line 1):

```php
function your_custom_admin_styling() {
  // ... rest of code
}
add_action('admin_head', 'your_custom_admin_styling');
```

### 7. Apply Styling Only to Specific Admin Pages

Modify the function to check the current page:

```php
function custom_admin_final_styling() {
  $screen = get_current_screen();
  
  // Only apply on dashboard
  if ($screen->id !== 'dashboard') {
    return;
  }
  
  // Or apply on multiple pages
  $allowed_pages = ['dashboard', 'post', 'page'];
  if (!in_array($screen->id, $allowed_pages)) {
    return;
  }
  
  echo '
  <style>
    /* ... your styles ... */
  </style>
  ';
}
```

### 8. Show Styling Only to Specific User Roles

Add a capability check at the beginning:

```php
function custom_admin_final_styling() {
  // Only apply to administrators
  if (!current_user_can('manage_options')) {
    return;
  }
  
  // Or apply to specific roles
  $user = wp_get_current_user();
  if (!in_array('editor', $user->roles) && !in_array('administrator', $user->roles)) {
    return;
  }
  
  echo '
  <style>
    /* ... your styles ... */
  </style>
  ';
}
```

## Current Configuration

**Note**: This snippet is currently configured with:
- **Background Color**: Dark green (#244739) for both admin menu and admin bar
- **Accent Color**: Bright green (#00bb86) for hover and active states
- **Menu Font Size**: 15px
- **Admin Bar Font Size**: 14px
- **Text Color**: White (#ffffff) for menu items and admin bar

Before using this snippet, you may want to customize:
- The color scheme to match your brand
- Font sizes to match your preferences
- Additional styling for specific elements

## Technical Details

- **WordPress Hook**: `admin_head`
- **CSS Method**: Inline styles with `!important` flags
- **Dependencies**: None (pure PHP and CSS)
- **Browser Support**: All modern browsers
- **WordPress Version**: Compatible with WordPress 5.0+

## Troubleshooting

**Styles not applying:**
- Check that the snippet is activated in WPCode
- Verify the snippet location is set to "Admin Only" or "Run Everywhere"
- Clear browser cache
- Check if other plugins or themes are overriding styles with higher specificity
- Inspect element in browser to see if styles are being applied

**Colors look different than expected:**
- Verify hex color codes are correct (include the `#` symbol)
- Check if your browser has color correction or accessibility settings enabled
- Test in different browsers to ensure consistency

**Styling conflicts with other plugins:**
- Increase CSS specificity by adding more selectors
- Add additional `!important` flags if needed
- Consider using more specific selectors to target only the elements you want

**Performance concerns:**
- Inline styles are loaded on every admin page load, but the impact is minimal
- For better performance, consider moving styles to a separate CSS file and enqueuing it properly

