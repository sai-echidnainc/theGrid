var grids = [];
grids.app = angular.module("theGrid", ['ngResource','ngAnimate','minicolors']);

grids.app.value('site_url','http://localhost/theGrid/index.php/');
grids.app.value('site_path','http://localhost/theGrid/');

grids.app.config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'bottom left'
  });
});