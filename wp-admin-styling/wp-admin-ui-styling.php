function custom_admin_final_styling() {
  echo '
  <style>
    /* 🌙 Always dark background for left menu */
    .wp-admin #adminmenu {
      background-color: #244739 !important;
    }

    /* 🌙 Always dark background for top admin bar */
    #wpadminbar {
      background-color: #244739 !important;
    }

    /* 🟩 Hover + Active menu item */
    .wp-admin #adminmenu li.menu-top > a:hover,
    .wp-admin #adminmenu li.menu-top:hover > a,
    .wp-admin #adminmenu li.menu-top.focused > a,
    .wp-admin #adminmenu .wp-has-current-submenu > a.menu-top,
    .wp-admin #adminmenu .current.menu-top > a,
    .wp-admin #adminmenu .wp-submenu .current,
    .wp-admin #adminmenu .wp-submenu a:hover {
      background-color: #00bb86 !important;
      color: #ffffff !important;
    }

    /* ✍️ Menu text size and color */
    .wp-admin #adminmenu .wp-menu-name,
    .wp-admin #adminmenu .wp-submenu a {
      font-size: 15px !important;
      color: #ffffff !important;
    }

    /* 🎩 Top bar text size and color */
    #wpadminbar .ab-item,
    #wpadminbar .ab-label {
      font-size: 14px !important;
      color: #ffffff !important;
    }

    #wpadminbar .ab-item:hover {
      color: #dddddd !important;
    }
  </style>
  ';
}
add_action('admin_head', 'custom_admin_final_styling');
