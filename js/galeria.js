  const carousel = document.getElementById("carousel");

  function scrollCarousel(direction) {
    const scrollAmount = 300; // px
    carousel.scrollBy({
      left: direction * scrollAmount,
      behavior: 'smooth'
    });
  }
