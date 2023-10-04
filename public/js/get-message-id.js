//  Receive the message id and write it in a hidden field.
$(document).ready(function() {
    // Event handler for the "Comment" button
    $('button[data-bs-toggle="modal"]').on('click', function() {
        // Get data-message-id value from button
        var messageId = $(this).data('message-id');

        // Set value to hidden field messageIdInput
        $('#messageIdInput').val(messageId);
    });
});
