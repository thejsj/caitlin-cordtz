// var setNavigation = function () {
//   var path = window.location.pathname;
//   path = path.replace(/\/$/, '');
//   path = decodeURIComponent(path);
//   $('a.nav').each(function () {
//     var $this = $(this);
//     var href = $this.attr('href');
//     if (path.substring(0, href.length) === href || href === window.location.href) {
//       $this.addClass('active');
//     }
//   });
// };
// setNavigation();