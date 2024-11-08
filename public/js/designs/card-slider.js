function initializeCarousel(carousel) {
    const slider = carousel.querySelector(".carousel-inner");
    const prev = carousel.querySelector(".carousel-control-prev");
    const next = carousel.querySelector(".carousel-control-next");
    const designAmount = carousel.getAttribute("data-design-amount");

    let scrollAmount = 0;
    let visibleCards = getVisibleCards();
    let cardWidth = getCardWidth();

    function getVisibleCards() {
        const screenWidth = window.innerWidth;

        if (screenWidth >= 1200) {
            // Extra Large (xl)
            return 4;
        } else if (screenWidth >= 992) {
            // Large (lg)
            return 3;
        } else if (screenWidth >= 768) {
            // Medium (md)
            return 2;
        } else if (screenWidth >= 576) {
            // Small (sm)
            return 2;
        } else {
            // Extra Small (xs)
            return 1;
        }
    }

    function getCardWidth() {
        // Calculate the width of a card dynamically to account for resizing
        const item = carousel.querySelector(".carousel-item");
        return item ? item.offsetWidth + 20 : 0; // 20px gap
    }

    function updateCarousel() {
        visibleCards = getVisibleCards();
        cardWidth = getCardWidth();
        scrollAmount = 0;
        slider.scroll({ left: scrollAmount, behavior: "smooth" });

        prev.style.display = scrollAmount === 0 ? "none" : "flex";
        next.style.display = designAmount > visibleCards ? "flex" : "none";
    }

    window.addEventListener("resize", updateCarousel);

    next.addEventListener("click", () => {
        const maxScroll = slider.scrollWidth - slider.clientWidth;
        if (scrollAmount < maxScroll) {
            scrollAmount += cardWidth;
            scrollAmount = Math.min(scrollAmount, maxScroll);
            slider.scroll({ left: scrollAmount, behavior: "smooth" });
            prev.style.display = "flex";
        }
        next.style.display = scrollAmount >= maxScroll ? "none" : "flex";
    });

    prev.addEventListener("click", () => {
        scrollAmount = Math.max(scrollAmount - cardWidth, 0);
        slider.scroll({ left: scrollAmount, behavior: "smooth" });
        next.style.display = scrollAmount >= maxScroll ? "none" : "flex";
        prev.style.display = scrollAmount === 0 ? "none" : "flex";
    });

    // Initialize button visibility on load
    prev.style.display = scrollAmount === 0 ? "none" : "flex";
    next.style.display = designAmount > visibleCards ? "flex" : "none";
}

// Initialize carousels on initial load
document.querySelectorAll(".carousel").forEach(initializeCarousel);

// Make the function globally accessible for seeMore.js
window.initializeCarousel = initializeCarousel;
