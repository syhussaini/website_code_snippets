document.addEventListener('DOMContentLoaded', function() {
    if (!window.location.pathname.includes('/contact')) return;

    // Create modal structure
    const modal = document.createElement('div');
    modal.id = 'ias-thankyou-modal';
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.left = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.6)';
    modal.style.display = 'none';
    modal.style.justifyContent = 'center';
    modal.style.alignItems = 'center';
    modal.style.zIndex = '9999';

    const modalContent = document.createElement('div');
    modalContent.style.backgroundColor = '#ffffff';
    modalContent.style.borderRadius = '8px';
    modalContent.style.maxWidth = '500px';
    modalContent.style.width = '90%';
    modalContent.style.boxShadow = '0 5px 15px rgba(0,0,0,0.3)';
    modalContent.style.overflow = 'hidden';
    modalContent.style.textAlign = 'center';
    modalContent.style.fontFamily = 'sans-serif';

    const modalHeader = document.createElement('div');
    modalHeader.style.backgroundColor = '#00463b';
    modalHeader.style.color = '#ffffff';
    modalHeader.style.padding = '15px 20px';
    modalHeader.style.fontSize = '22px';
    modalHeader.style.fontWeight = 'bold';
    modalHeader.innerText = 'Thank you for your message.';

    const modalBody = document.createElement('div');
    modalBody.style.padding = '20px';
    modalBody.style.fontSize = '18px';
    modalBody.style.lineHeight = '1.5';
    modalBody.innerText = 'We thank you for your time! Your message has been received. Someone from IAS Moosejaw Team will get in touch with you soon based on your message.';

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.margin = '15px';
    closeButton.style.padding = '10px 20px';
    closeButton.style.backgroundColor = '#00463b';
    closeButton.style.color = '#ffffff';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.fontSize = '16px';

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    modalContent.appendChild(modalHeader);
    modalContent.appendChild(modalBody);
    modalContent.appendChild(closeButton);
    modal.appendChild(modalContent);
    document.body.appendChild(modal);

    // Observe CF7 success
    document.addEventListener('wpcf7mailsent', function(event) {
        // Hide the default message if it appears
        const responseOutput = document.querySelector('.wpcf7-response-output');
        if (responseOutput) {
            responseOutput.style.display = 'none';
        }
        // Show modal
        modal.style.display = 'flex';
    }, false);
});
