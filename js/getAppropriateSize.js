/*global _:true, jQuery:true */
/*jshint browser:true */
'use strict';

(function ($) {
  var $window = $(window);
  window.getAppropriateSize = (function () {
    return function (index) {
      index = (index !== undefined ? index : 0);
      if (window.CaitlinCordtzData !== undefined) {
        var maxWindowLength = Math.max($window.height(), $window.width());
        var allSizes = window.CaitlinCordtzData.images[index].sizes;
        var sizesLargerThanMaxWindowLength = _.filter(allSizes, function (imageName, key) {
          if (key.indexOf('size') > -1) {
            var patt = new RegExp(/([0-9]*)x([0-9]*)([.A-z]*)$/gi);
            var _sizes = patt.exec(imageName);
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
}(jQuery));