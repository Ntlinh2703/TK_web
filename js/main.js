(function ($) {
    "use strict";
    
    // Dropdown navbar
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 768) { //nếu màn hình lớn hơn 768px sẽ hiển thị dropdown
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout'); // sẽ không hiển thị dropdown
            }
        }
        toggleNavbarMethod(); //khi trang load sẽ chạy hàm toggleNavbarMethod
        $(window).resize(toggleNavbarMethod);
    });
    
    // Header slider
    $('.header-slider').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    
    // Quantity
    $('.qty button').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    
})(jQuery);

