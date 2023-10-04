// Function for inserting tags when clicking on buttons.
function insertTag(tag) {
    var textarea = document.getElementById('content');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var text = textarea.value;
    var newText = text.substring(0, start) + tag + text.substring(end);
    textarea.value = newText;
}
