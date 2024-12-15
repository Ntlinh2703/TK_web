/* global window, document, define, jQuery, setInterval, clearInterval */
(function($) {
    'use strict';

    Slick = (function() {
        var instanceUid = 0;

        function Slick(element, settings) {
            var _ = this, dataSettings;

            // thiết lập mặc định
            _.defaults = {
                accessibility: true, // hỗ trợ người dùng khi không nhìn thấy
                appendDots: $(element), // thêm các điểm điều hướng
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                centerPadding: '50px', // khoảng cách giữa các slide
                customPaging: function(slider, i) { // tạo các điểm điều hướng
                    return $('<button type="button" />').text(i + 1);
                },
                dots: false, // thêm các điểm điều hướng
                dotsClass: 'slick-dots', // class của các điểm điều hướng
                draggable: true, // cho phép người dùng kéo slide
                infinite: true, // cho phép slide lặp lại
                initialSlide: 0, // slide hiện tại
                rows: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                zIndex: 1000 
            };

            //biến
            _.initials = {
                animating: false, // đang di chuyển
                currentSlide: 0, // slide hiện tại
                $dots: null, // các điểm điều hướng
                $nextArrow: null, // nút điều hướng tiếp theo
                $prevArrow: null,
                slideCount: null, // số slide
                $slides: null,
                $list: null,
            };

            // kết hợp các biến và option
            $.extend(_, _.initials);

            _.$slider = $(element);
            dataSettings = $(element).data('slick') || {}; // lấy dữ liệu từ thẻ
            _.options = $.extend({}, _.defaults, settings, dataSettings); // kết hợp các biến và option
            _.currentSlide = _.options.initialSlide;
            _.instanceUid = instanceUid++;

            // Khởi tạo các slide
            this.$slides = _.$slider.children(); // Giả sử các slide là các phần tử con của $slider
            this.slideCount = this.$slides.length; // Số lượng slide

            // Cập nhật slide lần đầu
            this.updateSlide();
        }

        Slick.prototype.updateSlide = function() {
            // Logic để cập nhật slide hiển thị
            this.$slides.hide().eq(this.currentSlide).show();
        };

        Slick.prototype.nextSlide = function() {
            if (this.animating) return;
            this.animating = true;
            this.currentSlide = (this.currentSlide + 1) % this.slideCount;
            this.updateSlide();
        };

        Slick.prototype.prevSlide = function() {
            if (this.animating) return;
            this.animating = true;
            this.currentSlide = (this.currentSlide - 1 + this.slideCount) % this.slideCount;
            this.updateSlide();
        };

        Slick.prototype.initNavigation = function() {
            var _ = this;

            // Thêm sự kiện cho nút trước
            _.$slider.on('click', '.slick-prev', function() {
                _.prevSlide();
            });

            // Thêm sự kiện cho nút tiếp theo
            _.$slider.on('click', '.slick-next', function() {
                _.nextSlide();
            });
        }
        return Slick;
    }());
})(jQuery);