document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('imagePreview');
    if (imageInput && preview) {
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (preview) {
                        preview.style.backgroundImage = `url(${e.target.result})`;
                        preview.innerHTML = ''; // Remove the placeholder text
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
});