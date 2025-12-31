# CF7 Form Submission Message in Popup

## Overview

This JavaScript snippet creates a custom modal popup that displays a thank you message when a Contact Form 7 (CF7) form is successfully submitted. Instead of showing the default CF7 success message, it displays a beautifully styled modal with a custom header, message, and close button.

**Key Features:**
- Custom modal popup with professional styling
- Automatically hides the default CF7 success message
- Only activates on pages containing `/contact` in the URL
- Listens for the `wpcf7mailsent` event to trigger the popup
- Fully customizable colors, text, and styling

## How to Use

### Option 1: Using WPCode Lite Plugin

1. Install and activate the [WPCode Lite](https://wordpress.org/plugins/insert-headers-and-footers/) plugin
2. Navigate to **Code Snippets** → **Add Snippet** in your WordPress admin
3. Select **Add Your Custom Code (New Snippet)**
4. Give your snippet a title (e.g., "CF7 Custom Thank You Popup")
5. Paste the entire JavaScript code from `CF7 Form Submission Message in Popup.js`
6. Set the **Code Type** to **JavaScript Snippet**
7. Set the **Location** to **Frontend** (or **Everywhere** if needed)
8. Click **Save Snippet** and then **Activate**

### Option 2: Using Insert Headers and Footers Plugin

1. Install and activate the [Insert Headers and Footers](https://wordpress.org/plugins/insert-headers-and-footers/) plugin
2. Navigate to **Settings** → **Insert Headers and Footers** in your WordPress admin
3. Paste the entire JavaScript code from `CF7 Form Submission Message in Popup.js` into the **Scripts in Footer** section
4. Click **Save**

## How to Modify

### Change the Page URL Check

Currently, the popup only appears on pages with `/contact` in the URL. To change this:

```javascript
// Line 2: Change the path check
if (!window.location.pathname.includes('/contact')) return;

// Example: Make it work on any page
// if (!window.location.pathname.includes('/your-page')) return;

// Example: Remove the check entirely (works on all pages)
// Remove or comment out line 2
```

### Customize the Modal Header Text

```javascript
// Line 34: Change the header text
modalHeader.innerText = 'Thank you for your message.';
```

### Customize the Modal Body Message

```javascript
// Line 40: Change the message text
modalBody.innerText = 'We thank you for your time! Your message has been received. Someone from IAS Moosejaw Team will get in touch with you soon based on your message.';
```

### Change Colors

**Header Background Color:**
```javascript
// Line 29: Change the header background color
modalHeader.style.backgroundColor = '#00463b'; // Change to your brand color
```

**Button Color:**
```javascript
// Line 46: Change the button background color
closeButton.style.backgroundColor = '#00463b'; // Match with header or use different color
```

**Modal Background Overlay:**
```javascript
// Line 12: Change the overlay darkness
modal.style.backgroundColor = 'rgba(0, 0, 0, 0.6)'; // Adjust opacity (0.0 to 1.0)
```

### Adjust Modal Size

```javascript
// Line 21: Change maximum width
modalContent.style.maxWidth = '500px'; // Increase or decrease as needed

// Line 22: Change responsive width
modalContent.style.width = '90%'; // Adjust percentage for mobile
```

### Change Font Sizes

```javascript
// Line 32: Header font size
modalHeader.style.fontSize = '22px';

// Line 38: Body font size
modalBody.style.fontSize = '18px';

// Line 51: Button font size
closeButton.style.fontSize = '16px';
```

### Modify Button Text

```javascript
// Line 43: Change button text
closeButton.innerText = 'Close'; // Change to "OK", "Got it", etc.
```

### Change Modal ID (if needed for multiple modals)

```javascript
// Line 6: Change the modal ID
modal.id = 'ias-thankyou-modal'; // Use a unique ID if you have multiple modals
```

## Example Output
<img width="2385" height="963" alt="image" src="https://github.com/user-attachments/assets/a938d73c-9704-479c-b1fe-ddcba3d8679a" />


<!-- Upload your screenshot below this line -->

