const name = document.querySelector("#name");
const slug = document.querySelector("#slug");

name.addEventListener("change", function () {
    fetch("/dashboard/products/checkSlug?name=" + name.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

document.addEventListener("trix-file-accept", function (e) {
    e.preventDefault();
});

function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}
