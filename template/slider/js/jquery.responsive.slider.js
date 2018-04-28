/*********************************************

Author : #
URL    : #
License: #/license.

*********************************************/
(function ($) {
    $.fn.extend({
        rslider: function () {

            return this.each(function () {

                var itemHeight;
                var itemWidth;
                var screenWidth = 0;
                var inteval;

                var currentItem = 0;
                var totalItems = 0;
                var previousItem = 0;
                var left = 0;
                var sliderWrapper = $(this);
                var currentCategory = '';

                var categories = new Array();
                setupRSlider();
                function setupRSlider() {
                    screenWidth = $(window).width();
                    sliderWrapper.css({ width: screenWidth });
                    //get the id of each category
                    itemHeight = $('.r-img-wrap:eq(0) img', sliderWrapper).height();
                    itemWidth = $('.r-img-wrap:eq(0) img', sliderWrapper).width();

                    var currentItem = 0;
                    var totalItems = 0;
                    var previousItem = 0;
                    var left = 0;

                    var currentCategory = '';
                    //hide all the images on load
                    $('.r-img-wrap img').css('display', 'none').load(function () {
                        $(this).css('display', '');
                    });
                    var categories = new Array();
                    $(window).resize(function () {
                        //alert(itemWidth = $("#r-slider-content-left").width());
                        clearTimeout(inteval);
                        inteval = setTimeout(function () {
                            screenWidth = $(this).width();
                            adjustSliderWidth();
                        }, 500);

                    });

                    function adjustSliderWidth() {
                        //itemWidth = $('.r-img-wrap:eq(0) img').width();
                        var previousItemWidth = itemWidth;

                        $('#r-slider-wrapper').stop(false, false).animate({ width: screenWidth }, {
                            duration: 'slow',
                            easing: 'swing'
                        });
                        //get single img width
                        itemWidth = $("#r-slider-content-left").width();
                        //adjust left position of each img wrap
                        $('.r-img-wrap').each(function () {
                            var factor = parseInt($(this).css('left')) / previousItemWidth;
                            var newWidth = itemWidth * factor;
                            $(this).css({ left: newWidth });
                        });
                    }
                    $('#r-slider-category-wrapper ul li a').click(function () {
                        $(this).parent().parent().find('li').removeClass('r-cat-active');
                        $(this).parent().addClass('r-cat-active');
                        currentCategory = $(this).attr('href').replace('#', '');
                        currentItem = 0;
                        previousItem = 0;
                        var slideContainer = $('#' + currentCategory);
                        totalItems = slideContainer.find('.r-img-wrap').length;
                        left = 0;
                        //initPositionForEachSlide(slideContainer);
                        //hide all containers 
                        $(categories).each(function () {
                            if (this != currentCategory)
                                $('#' + this).css({ 'opacity': '1', 'z-index': '99' }).stop(false, false).animate({ opacity: 0 }, 1000, function () { $(this).css('display', 'none'); });
                            else
                            //show the relavent conatiner only
                                slideContainer.show().css({ 'opacity': '0', 'z-index': 100 }).stop(false, false).animate({ opacity: 1 }, 2000);
                        });

                        return false;
                    });
                    //on select click
                    $('#r-slider-category-wrapper select').click(function () {
                        currentCategory = $(this).val();
                        currentItem = 0;
                        previousItem = 0;
                        var slideContainer = $('#' + currentCategory);
                        totalItems = slideContainer.find('.r-img-wrap').length;
                        left = 0;
                        initPositionForEachSlide(slideContainer);
                        //hide all containers 
                        $(categories).each(function () {
                            if (this != currentCategory)
                                $('#' + this).css({ 'opacity': '1', 'z-index': '99' }).stop(false, false).animate({ opacity: 0 }, 1000, function () { $(this).css('display', 'none'); });
                            else
                            //show the relavent conatiner only
                                slideContainer.show().css({ 'opacity': '0', 'z-index': 100 }).stop(false, false).animate({ opacity: 1 }, 2000);
                        });

                        return false;
                    });

                    $('#r-slider-category-wrapper ul li').each(function (index) {
                        var anchor = $(this).find('a');
                        var id = anchor.attr('href').replace('#', '');
                        categories.push(id);
                        //hide contents for each category except for the first one
                        if (index > 0) {
                            $(anchor.attr('href')).css('opacity', '0');
                        }
                        else {
                            $(anchor.attr('href')).css('opacity', '1');
                            currentItem = 0;
                            totalItems = $(anchor.attr('href')).find('img').length;
                            currentCategory = id;
                            $(this).addClass('r-cat-active');
                        }
                        //adjust dimenations of each category container
                        initPositionForEachSlide($(anchor.attr('href')));
                    });

                    function initPositionForEachSlide(slideContainer) {
                        left = 0;
                        slideContainer.css({ width: slideContainer.find('img').length * itemWidth,
                            height: slideContainer.find('img').length * itemHeight
                        });

                        slideContainer.find('div.r-img-wrap').each(function () {
                            $(this).css({ left: left });
                            left += itemWidth;
                        });
                    }

                    //next/prev navigation
                    $('#r-nav img').click(function () {
                        var currentPrevItem = getCurrentPrevItem($('#' + currentCategory));
                        currentItem = currentPrevItem.currentItem;
                        previousItem = currentItem;
                        if (isNext($(this))) {
                            if (currentItem < totalItems - 1) {
                                currentItem++;
                                setCurrentPrevItem($('#' + currentCategory));
                                animateSlide(getSlide(currentItem), getSlide(previousItem), true);
                            }
                        }
                        else {
                            if (currentItem > 0) {
                                currentItem--;
                                setCurrentPrevItem($('#' + currentCategory));
                                animateSlide(getSlide(currentItem), getSlide(previousItem), false);
                            }
                        }
                    });

                    function isNext(navElement) {
                        if (navElement.attr('id') == 'r-next')
                            return true;
                        else
                            return false;
                    }

                    function animateSlide(currentSlide, previousSlide, forward) {

                        var cleft = 0;
                        var pleft = 0;
                        var cafter = 0;
                        var pafter = 0;
                        //itemWidth = $('.r-img-wrap:eq(0) img').width();
                        if (currentItem > previousItem) {
                            cleft = itemWidth;
                            cafter = 0;
                            pafter = -itemWidth;
                        }
                        else {
                            pleft = 0;
                            pafter = itemWidth;
                            cleft = -itemWidth;
                            cafter: 0;
                        }

                        previousSlide.css({ left: pleft }).stop(false, false).animate({ left: pafter }, 1000, function () {
                            $(this).css({ display: 'none' });
                        });
                        //animate current slide
                        currentSlide.css({ display: 'block',
                            left: cleft
                        }).stop(false, false).animate({ left: cafter }, 1000);

                    }
                    function getSlide(slideIndex) {
                        return $('#' + currentCategory).find('.r-img-wrap').eq(slideIndex);
                    }

                    function setCurrentPrevItem(slidesContainer) {
                        slidesContainer.data('currentItem', currentItem);
                        slidesContainer.data('previousItem', previousItem);
                    }
                    function getCurrentPrevItem(slidesContainer) {

                        var currentPrevItem = { currentItem: 0, previousItem: 0 };
                        currentPrevItem.currentItem = parseInt(slidesContainer.data('currentItem'));
                        currentPrevItem.previousItem = parseInt(slidesContainer.data('previousItem'));

                        if (isNaN(currentPrevItem.currentItem)) currentPrevItem.currentItem = 0;
                        if (isNaN(currentPrevItem.previousItem)) currentPrevItem.previousItem = 0;

                        return currentPrevItem;
                    }
                }

            });
        }
    });

})(jQuery);
