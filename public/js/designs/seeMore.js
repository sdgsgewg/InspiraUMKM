function toggleContent(id) {
    const moreContent = document.querySelector(`.moreContent[data-id="${id}"]`);
    const button = document.querySelector(`.toggleBtn[data-id="${id}"]`);

    if (moreContent.style.display === "none") {
        moreContent.style.display = "block";
        button.textContent = "See Less >>>";
    } else {
        moreContent.style.display = "none";
        button.textContent = "See More >>>";
    }

    moreContent.querySelectorAll(".carousel").forEach(initializeCarousel);
}
