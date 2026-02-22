const imageInput = document.getElementById('imageInput');
const imgPreview = document.getElementById('imgPreview');

imageInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

         reader.addEventListener('load', function() {
            imgPreview.src = reader.result;
        });

        reader.readAsDataURL(file);
    } else {
        imgPreview.src = "{{ asset('no-image.jpg') }}";
    }
});

