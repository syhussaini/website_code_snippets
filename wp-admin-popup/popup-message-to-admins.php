add_action('admin_footer', function () {
    ?>
    <style>
        #iaos-admin-modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #iaos-admin-modal {
            background: #fff;
            border-radius: 8px;
            max-width: 500px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
        }
        #iaos-admin-modal-header {
            background: #00463b;
            color: #fff;
            padding: 16px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        #iaos-admin-modal-content {
            padding: 20px;
            text-align: center;
            font-size: 18px !important;
        }
        #iaos-admin-modal-content h3 {
            margin-top: 0;
            color: #00463b;
            font-size: 20px;
        }
        #iaos-admin-modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 20px;
            flex-wrap: wrap;
        }
        .iaos-modal-btn {
            background: #00463b;
            color: #fff !important;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }
        .iaos-modal-btn:hover {
            background: #006b57;
            color: #fff !important;
        }
        #iaos-admin-modal-footer {
            background: #0E281D;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #iaos-admin-modal-footer input {
            margin-right: 8px;
        }
        #iaos-admin-modal-footer label {
            font-weight: bold;
            font-size: 16px;
        }
    </style>

    <div id="iaos-admin-modal-overlay" style="display:none;">
        <div id="iaos-admin-modal">
            <div id="iaos-admin-modal-header">Welcome to IAOS Web Portal</div>
            <div id="iaos-admin-modal-content">
                <h3>Very Important Note!</h3>
                <p>It’s important that you understand how to manage and publish content responsibly on this site. If you are confident in your publishing workflow, you can close this message and continue editing. If you need help or clarity on managing and publishing content correctly, please use the button below to access our Publishing Help resources.</p>
            </div>
            <div id="iaos-admin-modal-buttons">
                <a href="/wp-admin/admin.php?page=wp-help-documents" class="iaos-modal-btn" id="iaos-access-help-btn">Access Publishing Help</a>
                <button class="iaos-modal-btn" id="iaos-close-modal-btn">Close</button>
            </div>
            <div id="iaos-admin-modal-footer">
                <input type="checkbox" id="iaos-hide-session-checkbox">
                <label for="iaos-hide-session-checkbox">Don't show this again during my current session</label>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalOverlay = document.getElementById('iaos-admin-modal-overlay');
            const checkbox = document.getElementById('iaos-hide-session-checkbox');

            function shouldShowModal() {
                const dismissed = sessionStorage.getItem('iaos_admin_modal_dismissed');
                const nextShowTime = sessionStorage.getItem('iaos_admin_modal_next_show_time');
                const now = Date.now();

                if (dismissed === 'true') {
                    return false;
                }

                if (!nextShowTime || now >= parseInt(nextShowTime)) {
                    return true;
                }

                return false;
            }

            function setNextShowTime() {
                const nextTime = Date.now() + 15 * 60 * 1000; // 15 minutes
                sessionStorage.setItem('iaos_admin_modal_next_show_time', nextTime.toString());
            }

            if (shouldShowModal()) {
                modalOverlay.style.display = 'flex';
            }

            function closeModal() {
                if (checkbox.checked) {
                    sessionStorage.setItem('iaos_admin_modal_dismissed', 'true');
                } else {
                    setNextShowTime();
                }
                modalOverlay.style.display = 'none';
            }

            document.getElementById('iaos-close-modal-btn').addEventListener('click', closeModal);
            document.getElementById('iaos-access-help-btn').addEventListener('click', closeModal);
            document.addEventListener('keydown', function (e) {
                if (e.key === "Escape") {
                    closeModal();
                }
            });
        });
    </script>
    <?php
});
