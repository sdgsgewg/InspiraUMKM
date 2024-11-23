function toggleContent() {
    const moreContent = document.querySelector(`.moreContent`);
    const button = document.querySelector(`.toggleBtn`);

    if (moreContent.style.display === "none") {
        moreContent.style.display = "block";
        button.textContent = "See Less >>>";
    } else {
        moreContent.style.display = "none";
        button.textContent = "See More >>>";
    }

    moreContent.querySelectorAll(".carousel").forEach(initializeCarousel);
}
