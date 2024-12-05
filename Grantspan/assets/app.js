// SearchForm Section code
let searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
};
window.onscroll = () => {
    searchForm.classList.remove('active');
};

$(document).ready(function () {
    $(window).scroll(function () {
        // Navbar-bottom scrolling
        if (this.scrollY > 5) {
            $('.navbar-bottom').addClass("sticky");
        } else {
            $('.navbar-bottom').removeClass("sticky");
        }

        // Scrolling Button Btn
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // Slide up script
    $('.scroll-up-btn').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
    });

    // Owl Carousel configuration
    $('.owl-carousel').owlCarousel({
        margin: 5,
        navigation: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
    });
});
