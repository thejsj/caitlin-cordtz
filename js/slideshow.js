/*global jQuery:true, _:true */
/*jshint browser:true */
'use strict';

window.SlideShow = function () {
  this.imageIndex = 0;
  this.totalNumberOfImages = window.CaitlinCordtzData.images.length;
  this.nextTimeout = null;
};

window.SlideShow.prototype.init = function () {
  this.$loadedImagesContainer = jQuery('#loaded-images-container');
  this.$body = jQuery('body');
  window.$loadedImagesContainer = this.$loadedImagesContainer;
  this.loadAllImages();
  this.$loadedImagesContainer.imagesLoaded(_.bind(function () {
    window.console.log('All Images Loaded: ', this.totalNumberOfImages);
    if (this.totalNumberOfImages > 1) {
      jQuery(document).keydown(_.bind(this.keyDownHandler, this));
      this.startTimeout();
    }
  }, this));
};

window.SlideShow.prototype.resize = function () {
  this.loadAllImages();
  this.setAppropriateImageSize();
};

window.SlideShow.prototype.startTimeout = function () {
  this.nextTimeout = setTimeout(_.bind(function () {
    this.goToNext();
    this.startTimeout();
  }, this), 4000);
};

window.SlideShow.prototype.goToNext = function () {
  this.imageIndex += 1;
  if (this.imageIndex >= this.totalNumberOfImages) this.imageIndex = 0;
  this.setAppropriateImageSize(this.imageIndex);
};

window.SlideShow.prototype.goToPrev = function () {
  this.imageIndex -= 1;
  if (this.imageIndex < 0) this.imageIndex = this.totalNumberOfImages - 1;
  this.setAppropriateImageSize(this.imageIndex);
};

window.SlideShow.prototype.loadAllImages = function () {
  var $container = this.$loadedImagesContainer;
  for (var i = 0; i < this.totalNumberOfImages; i += 1) {
    var source = window.getAppropriateSize(i);
    $container.append('<img src="' + source + '" />');
  }
};

window.SlideShow.prototype.keyDownHandler = function (e) {
  clearTimeout(this.nextTimeout);
  if (e.which === 37 || e.which === 39) {
    if (e.which === 37) {
      this.goToPrev();
    }
    if (e.which === 39) {
      this.goToNext();
    }
  }
  this.startTimeout();
  e.preventDefault(); // prevent the default action (scroll / move caret)
};

window.SlideShow.prototype.setAppropriateImageSize = function () {
  if (window.getAppropriateSize(this.imageIndex) === undefined) {
    console.log('Undefined Index:', this.imageIndex, window.getAppropriateSize(this.imageIndex));
  }
  this.$body.css('background-image', 'url(' + window.getAppropriateSize(this.imageIndex) + ')');
};
