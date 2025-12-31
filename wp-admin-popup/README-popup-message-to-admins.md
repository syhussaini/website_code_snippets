# Admin Modal Popup Message

A WordPress PHP snippet that displays a customizable modal popup message to administrators in the WordPress admin area.

## Overview

This snippet creates a modal popup that appears in the WordPress admin dashboard with the following features:

- **Smart Display Logic**: Uses browser sessionStorage to control when the modal appears
- **Session-Based Dismissal**: Option to hide the modal for the current browser session
- **Time-Based Cooldown**: Automatically shows again after 15 minutes if not permanently dismissed
- **Keyboard Support**: Can be closed using the Escape key
- **Customizable Content**: Easy to modify the message, styling, and links
- **Responsive Design**: Modern, centered modal with professional styling

### How It Works

1. The modal is injected into the WordPress admin footer using the `admin_footer` action hook
2. JavaScript checks sessionStorage to determine if the modal should be displayed
3. If the user checks "Don't show this again during my current session", the modal won't appear again until the browser session ends
4. If dismissed without the checkbox, the modal will reappear after 15 minutes
5. The modal includes a link to a help/documentation page (currently configured for a specific plugin)

## Example

Here's what the modal popup looks like when displayed in the WordPress admin area:

### Admin Modal Popup Example
<img width="2385" height="1053" alt="image" src="https://github.com/user-attachments/assets/a3da973c-bcdd-4cfd-beba-9d71031f1845" />

*Screenshot showing the modal popup with header, content message, action buttons, and footer checkbox.*

## How to Use

### Installation via WPCode Lite Plugin

1. **Install WPCode Lite** (if not already installed)
   - Go to WordPress Admin → Plugins → Add New
   - Search for "WPCode" and install the free version

2. **Add the Snippet**
   - Navigate to **Code Snippets** → **Add Snippet** (or **WPCode** → **Add Snippet**)
   - Click **"Add Your Custom Code (New Snippet)"**

3. **Configure the Snippet**
   - **Title**: Give it a descriptive name (e.g., "Admin Welcome Modal")
   - **Code Type**: Select **PHP Snippet**
   - **Location**: Select **Run Everywhere** or **Admin Only** (recommended)
   - **Paste the Code**: Copy and paste the entire contents of `popup-message-to-admins.php`
   - **Activate**: Toggle the switch to activate the snippet

4. **Save and Test**
   - Click **Save Snippet**
   - Visit any WordPress admin page to see the modal in action

## How to Modify

### 1. Change the Modal Content

**Header Text** (Line 85):
```php
<div id="iaos-admin-modal-header">Welcome to IAOS Web Portal</div>
```

**Title** (Line 87):
```php
<h3>Very Important Note!</h3>
```

**Message Body** (Line 88):
```php
<p>It's important that you understand how to manage and publish content responsibly...</p>
```

### 2. Update the Help Link

**Current Configuration** (Line 91):
```php
<a href="/wp-admin/admin.php?page=wp-help-documents" class="iaos-modal-btn" id="iaos-access-help-btn">Access Publishing Help</a>
```

**To link to a different admin page:**
```php
<a href="/wp-admin/admin.php?page=your-plugin-page" class="iaos-modal-btn" id="iaos-access-help-btn">Access Help</a>
```

**To link to an external URL:**
```php
<a href="https://example.com/help" target="_blank" class="iaos-modal-btn" id="iaos-access-help-btn">Access Help</a>
```

**To link to a front-end page:**
```php
<a href="/your-page-slug" class="iaos-modal-btn" id="iaos-access-help-btn">Access Help</a>
```

### 3. Change Colors

**Header Background** (Line 26):
```php
background: #00463b; /* Change to your brand color */
```

**Button Background** (Line 51):
```php
background: #00463b; /* Change to match header */
```

**Button Hover** (Line 63):
```php
background: #006b57; /* Lighter shade for hover */
```

**Footer Background** (Line 67):
```php
background: #0E281D; /* Darker shade for footer */
```

### 4. Adjust Modal Size

**Max Width** (Line 17):
```php
max-width: 500px; /* Increase for wider modals */
```

### 5. Change the Cooldown Time

**15 Minutes** (Line 123):
```php
const nextTime = Date.now() + 15 * 60 * 1000; // 15 minutes
```

**Examples:**
- 30 minutes: `30 * 60 * 1000`
- 1 hour: `60 * 60 * 1000`
- 2 hours: `2 * 60 * 60 * 1000`

### 6. Change Button Text

**Help Button** (Line 91):
```php
<a href="..." class="iaos-modal-btn" id="iaos-access-help-btn">Access Publishing Help</a>
```

**Close Button** (Line 92):
```php
<button class="iaos-modal-btn" id="iaos-close-modal-btn">Close</button>
```

### 7. Modify Checkbox Label

**Footer Checkbox** (Line 96):
```php
<label for="iaos-hide-session-checkbox">Don't show this again during my current session</label>
```

### 8. Change CSS Class Prefixes

If you want to avoid conflicts with other plugins, replace all instances of `iaos-` with your own prefix (e.g., `myplugin-`):

- `iaos-admin-modal-overlay` → `myplugin-admin-modal-overlay`
- `iaos-admin-modal` → `myplugin-admin-modal`
- `iaos-modal-btn` → `myplugin-modal-btn`
- etc.

Also update the corresponding JavaScript selectors and sessionStorage keys.

### 9. Show Only to Specific User Roles

Add a capability check at the beginning of the function:

```php
add_action('admin_footer', function () {
    // Only show to administrators
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Or show to specific roles
    $user = wp_get_current_user();
    if (!in_array('editor', $user->roles) && !in_array('administrator', $user->roles)) {
        return;
    }
    
    ?>
    <!-- rest of the code -->
```

### 10. Show Only on Specific Admin Pages

Modify the action hook to check the current page:

```php
add_action('admin_footer', function () {
    $screen = get_current_screen();
    
    // Only show on dashboard
    if ($screen->id !== 'dashboard') {
        return;
    }
    
    // Or show on multiple pages
    $allowed_pages = ['dashboard', 'post', 'page'];
    if (!in_array($screen->id, $allowed_pages)) {
        return;
    }
    
    ?>
    <!-- rest of the code -->
```

## Current Configuration

**Note**: This snippet is currently configured to:
- Display a welcome message for "IAOS Web Portal"
- Link to a help page at `/wp-admin/admin.php?page=wp-help-documents` (a specific plugin's admin page)
- Use a green color scheme (#00463b, #006b57, #0E281D)

Before using this snippet, you'll need to customize:
- The header text, message content, and button labels
- The help link URL to match your specific plugin or documentation
- The color scheme to match your brand
- The CSS class prefixes if needed to avoid conflicts

## Technical Details

- **WordPress Hook**: `admin_footer`
- **Storage Method**: Browser sessionStorage
- **Dependencies**: None (pure PHP, CSS, and vanilla JavaScript)
- **Browser Support**: All modern browsers with sessionStorage support

## Troubleshooting

**Modal not appearing:**
- Check that the snippet is activated in WPCode
- Verify the snippet location is set to "Admin Only" or "Run Everywhere"
- Clear browser cache and sessionStorage
- Check browser console for JavaScript errors

**Modal appearing too frequently:**
- Increase the cooldown time (see modification #5)
- Check if sessionStorage is being cleared by browser settings

**Styling conflicts:**
- Change CSS class prefixes (see modification #8)
- Add `!important` flags to critical styles if needed
- Check z-index if modal appears behind other elements

