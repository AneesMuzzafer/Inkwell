console.log("Inkwell!");

function displayImage(input) {
    const preview = document.getElementById('profilePicturePreview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
    }
}
