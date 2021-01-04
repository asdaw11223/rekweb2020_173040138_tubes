function previewImg() {
    const image = document.querySelector('#image');
    const imageLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    imageLabel.textContent = image.files[0].name;

    const fileImage = new FileReader();
    fileImage.readAsDataURL(image.files[0]);

    fileImage.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}