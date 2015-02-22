/*global _:true */
/*jshint browser:true */
(function ($) {
  'use strict';

  $(document).ready(function () {
    var slideshow = new window.SlideShow();
    slideshow.init();
    slideshow.setAppropriateImageSize();
    $(window).resize(_.bind(slideshow.resize, slideshow));
  });
}(window.jQuery));