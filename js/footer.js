/*global _:true */
/*jshint browser:true */
(function ($) {
  'use strict';

  $(document).ready(function () {

    var $window = $(window);
    var getAppropriateSize = (function () {
      return function (index) {
        index = (index !== undefined ? index : 0);
        if (window.CaitlinCordtzData !== undefined) {
          var maxWindowLength = Math.max($window.height(), $window.width());
          var allSizes = window.CaitlinCordtzData.images[index].sizes;
          var sizesLargerThanMaxWindowLength = _.filter(allSizes, function (imageName, key) {
            if (key.indexOf('size') > -1) {
              var patt = new RegExp(/([0-9]*)x([0-9]*)([.A-z]*)$/gi);
              var _sizes = patt.exec(imageName);
              console.log('_sizes');
              console.log(_sizes);
              var size = Math.min(_sizes[1], _sizes[2]);
              if (size > maxWindowLength) {
                return true;
              }
            }
            return false;
          });
          return sizesLargerThanMaxWindowLength[0];
        }
      };
    }());

    var imageIndex = 0;
    var totalNumberOfImages = window.CaitlinCordtzData.images.length;

    var setAppropriateImageSize = (function () {
      var $body = $('body');
      return function () {
        $body.css('background-image', 'url(' + getAppropriateSize(imageIndex) + ')');
      };
    }());

    $(document).keydown(function(e) {
      if (e.which === 37 || e.which === 39) {
        if (e.which === 37) {
          imageIndex += 1;
          if (imageIndex >= totalNumberOfImages) imageIndex = 0;
        }
        if (e.which === 39) {
          imageIndex -= 1;
          if (imageIndex < 0) imageIndex = totalNumberOfImages - 1;
        }
        setAppropriateImageSize(imageIndex);
      }
      e.preventDefault(); // prevent the default action (scroll / move caret)
    });

    setAppropriateImageSize();
    $window.resize(setAppropriateImageSize);
  });
}(window.jQuery));