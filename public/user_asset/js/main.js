(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".sticky-top").css("top", "0px");
        } else {
            $(".sticky-top").css("top", "-100px");
        }
    });

    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>',
        ],
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });

    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("mainNav");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        });

        // Highlight active links
        const navLinks = document.querySelectorAll(".nav-link");
        navLinks.forEach((link) => {
            link.addEventListener("mouseover", function () {
                this.querySelector(".nav-indicator").style.opacity = "0.5";
            });

            link.addEventListener("mouseout", function () {
                if (!this.classList.contains("active")) {
                    this.querySelector(".nav-indicator").style.opacity = "0";
                } else {
                    this.querySelector(".nav-indicator").style.opacity = "1";
                }
            });
        });

        $(document).ready(function () {
            // Initialize the carousel
            var headerCarousel = $(".header-carousel");

            // Update indicators when carousel changes
            headerCarousel.on("changed.owl.carousel", function (event) {
                var current = event.item.index;
                $(".custom-indicators button").removeClass("active");
                $(".custom-indicators button").eq(current).addClass("active");
            });

            // Click handler for custom indicators
            $(".custom-indicators button").click(function () {
                var index = $(this).index();
                headerCarousel.trigger("to.owl.carousel", [index, 300]);
            });

            // Add a subtle parallax effect on scroll
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                $(".owl-carousel-item img").css(
                    "transform",
                    "translateY(" + scrollTop * 0.2 + "px)"
                );
            });
        });
    });
})(jQuery);
