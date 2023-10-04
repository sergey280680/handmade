var form = document.getElementById('message-form');

form.addEventListener('submit', function (event) {
    // Preventing standard form submission behavior
    event.preventDefault();

    var isValid = validateForm();

    function validateForm() {
        var isValid = true;

//  Getting the values of form fields
        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');
        var contentInput = document.getElementById('content');
        var imageInput = document.getElementById('imageInput');
        var textFileInput = document.getElementById('textFileInput');

        var nameError = document.getElementById('name-error');
        var emailError = document.getElementById('email-error');
        var contentError = document.getElementById('content-error');
        var imageError = document.getElementById('text-image-error');
        var textFileError = document.getElementById('text-file-error');

//  Checking the 'name' field: required field
        if (nameInput.value.trim() === '') {
            isValid = false;
            nameError.textContent = 'Поле "Имя" обязательно для заполнения.';
        } else {
            nameError.textContent = '';
        }

//  Checking the 'email' field
        // Checking the 'email' field: correct email address
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        // Checking the 'email' field: required field
        if (emailInput.value.trim() === '') {
            isValid = false;
            emailError.textContent = 'Поле "Email" обязательно для заполнения.';
        } else if (!emailPattern.test(emailInput.value)) {
            isValid = false;
            emailError.textContent = 'Пожалуйста, введите корректный email-адрес .';
        } else {
            emailError.textContent = '';
        }

//  Checking for valid tags.
        // Saving the message value into a variable
        var contentValue = contentInput.value;
        contentError.textContent = '';

        // Regular expression for HTML tags
        function containsHTMLTags(text) {
            var htmlTagPattern = /<\/?[a-z][\s\S]*>/i;
            return htmlTagPattern.test(text);
        }

        // Checking whether the value contains tags
        var allowedTagsRegex = /^<a href="[^"]+" title="[^"]+">[^<]+<\/a>|<code>[^<]+<\/code>|<i>[^<]+<\/i>|<strong>[^<]+<\/strong>$/;

        if (contentValue && containsHTMLTags(contentValue)) {
            if (!allowedTagsRegex.test(contentValue)) {
                contentError.textContent = 'Текст не должен содержать пустые или недопустимые HTML-теги.';
                isValid = false;
            }
        } else if (!contentValue) {
            contentError.textContent = 'Поле не должно быть пустым.';
            isValid = false;
        }

//  Checking for valid image format.
        // Get the selected file
        var selectedImageFile = imageInput.files[0];

        if (selectedImageFile) {
            // Getting the file extension
            var fileExtension = selectedImageFile.name.split('.').pop().toLowerCase();
            // Allowed extensions
            var allowedExtensions = ['jpg', 'png', 'gif'];
            if (allowedExtensions.indexOf(fileExtension) === -1) {
                imageError.textContent = 'Пожалуйста, выберите изображение с расширением .jpg, .png или .gif';
                isValid = false;
            }
        }

//  Checking for valid file.txt.
        var selectedFile = textFileInput.files[0];

        // Check for TXT format
        if (selectedFile && !selectedFile.name.toLowerCase().endsWith('.txt')) {
            textFileError.textContent = 'Выберите текстовый файл формата TXT.';
            isValid = false;
        } else {
            textFileError.textContent = '';
        }

        // Check for file size (no more than 100 KB)
        var maxSizeBytes = 100 * 1024; // 100 КБ
        if (selectedFile && selectedFile.size > maxSizeBytes) {
            textFileError.textContent = 'Выбранный файл слишком большой. Максимальный размер: 100 КБ.';
            isValid = false;
        } else {
            textFileError.textContent = '';
        }

        return isValid;
    }

    if (isValid) {
        form.submit();
    }

});
