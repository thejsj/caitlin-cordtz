/*global _:true, jQuery:true */
/*jshint browser:true */
'use strict';

(function ($) {
  var $window = $(window);
  window.getAppropriateSize = (function () {
    return function (index) {
      var patt = new RegExp(/([0-9]*)x([0-9]*)([.A-z]*)$/gi);
      index = (index !== undefined ? index : 0);
      if (window.CaitlinCordtzData !== undefined) {
        var maxWindowLength = Math.max($window.height(), $window.width());
        var image = window.CaitlinCordtzData.images[index];
        var allSizes = image.sizes;
        var sizesLargerThanMaxWindowLength = _.filter(allSizes, function (imageName, key) {
          if (key.indexOf('size') > -1) {
            var _sizes = patt.exec(imageName);
            if (_sizes !== null && _sizes.length >= 2) {
              var size = Math.min(_sizes[1], _sizes[2]);
              if (size > maxWindowLength) {
                return true;
              }
            }
          }
          return false;
        });
        return sizesLargerThanMaxWindowLength[0] || image.url;
      }
    };
  }());
}(jQuery));