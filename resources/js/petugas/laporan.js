document.addEventListener("DOMContentLoaded", function () {
    const previewModal = document.getElementById("previewImageModal");

    previewModal.addEventListener("show.bs.modal", function (event) {
        const button = event.relatedTarget;
        console.log("bootom yg di dapat :", button);
        const imageSrc = button.getAttribute("data-img");

        const modalImage = previewModal.querySelector("#previewImage");
        modalImage.src = imageSrc;
    });
});
