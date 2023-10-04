// Preview of the entered message in the textarea field.
$(document).ready(function() {
    $('#content').on('input', function() {
        var content = $(this).val();
        $('#preview').html(content);
    });
});
