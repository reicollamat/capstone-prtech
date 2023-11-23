(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    // Wait for the DOM to be ready
    $(document).ready(function () {
        // Add an event listener to all checkboxes with the class 'custom-control-input'
        $('input.custom-control-input').on('change', function () {
            // Automatically submit the form when a checkbox is checked or unchecked
            $('.category').submit();
        });



        // if auth submits form when clicked Add To Cart
        $('#addToCartBtn').click(function () {
            $('#cartFormAuth').submit();
        });

        // if auth submits form when clicked Purchase Now
        $('#purchaseBtn').click(function () {
            // Update the value of #purchaseQuantityInput with the current value of #cartQuantityInput
            $('#purchaseQuantityInput').val($('#cartQuantityInput').val());
            // Submit the #purchaseFormAuth with the updated quantity value
            $('#purchaseFormAuth').submit();
        });

        // If not authenticated, submit the #formLogin
        $('#addToCartBtn, #purchaseBtn').click(function () {
            $('#formLogin').submit();
        });



        // Fade out the notification after 3 seconds
        setTimeout(function () {
            $('#notif-alert').fadeOut('slow', function () {
                $(this).remove();
            });
        }, 5000); // 5000 milliseconds = 5 seconds

        // [LI] Fade out the notification after 3 seconds
        // window.livewire.on('saved', () => {
        //     setTimeout(function () {
        //         $('#notif-alert').fadeOut('slow', function () {
        //             $(this).remove();
        //         });
        //     }, 5000); // 5000 milliseconds = 5 seconds
        // });
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });


    // Product Quantity
    $('.btn-plus, .btn-minus').click(function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Increment or decrement the quantity value based on the clicked button
        var inputField = $(this).parent().siblings('input[name="quantity"]');
        var oldValue = parseInt(inputField.val());
        var newValue = $(this).hasClass('btn-plus') ? oldValue + 1 : (oldValue > 1 ? oldValue - 1 : 1);
        inputField.val(newValue);
    });

})(jQuery);

